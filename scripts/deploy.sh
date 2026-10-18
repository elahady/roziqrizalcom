#!/usr/bin/env bash
# Deploy roziqrizal.com ke VPS Jakarta (IDCloudHost). Dijalankan dari root repo lewat Git Bash:
#
#   scripts/deploy.sh             deploy HEAD ke VPS
#   scripts/deploy.sh --dry-run   hanya cek & bangun arsip, tidak menyentuh VPS
#
# Env opsional:
#   DEPLOY_HOST   tujuan SSH (default: elahady@103.54.170.198)
#   DEPLOY_KEY    identity file SSH (default: ~/.ssh/id_ed25519_vps_jakarta)
#   DEPLOY_DIR    folder project di VPS (default: ~/apps/roziqrizalcom)
#   DEPLOY_URL    URL untuk verifikasi akhir (default: https://roziqrizal.com/)
#
# Detail proses dan alasan tiap langkah ada di DEPLOY.md.

set -euo pipefail

HOST="${DEPLOY_HOST:-elahady@103.54.170.198}"
KEY="${DEPLOY_KEY:-$HOME/.ssh/id_ed25519_vps_jakarta}"
REMOTE_DIR="${DEPLOY_DIR:-apps/roziqrizalcom}"
URL="${DEPLOY_URL:-https://roziqrizal.com/}"
CONTAINER="roziqrizalcom"
HEALTH_TIMEOUT=90

DRY_RUN=0
case "${1:-}" in
    "") ;;
    --dry-run) DRY_RUN=1 ;;
    -h|--help) sed -n '2,13p' "$0" | sed 's/^# \{0,1\}//'; exit 0 ;;
    *) echo "Argumen tidak dikenal: $1 (pakai --dry-run atau --help)" >&2; exit 2 ;;
esac

step() { printf '\n==> %s\n' "$*"; }
die()  { printf 'GAGAL: %s\n' "$*" >&2; exit 1; }

SSH_OPTS=(-i "$KEY" -o ConnectTimeout=10 -o BatchMode=yes)
remote() { ssh "${SSH_OPTS[@]}" "$HOST" "$@"; }

cd "$(git rev-parse --show-toplevel)"

step "Cek repo"
[ -z "$(git status --porcelain)" ] \
    || die "Ada perubahan yang belum di-commit. Yang dikirim adalah HEAD, jadi commit dulu."
BRANCH="$(git rev-parse --abbrev-ref HEAD)"
[ "$BRANCH" = "main" ] || die "Branch saat ini '$BRANCH', bukan main."
git fetch --quiet origin main || echo "Peringatan: tidak bisa fetch origin, lanjut tanpa cek push."
if [ "$(git rev-parse HEAD)" != "$(git rev-parse origin/main)" ]; then
    echo "Peringatan: HEAD berbeda dari origin/main (belum di-push atau tertinggal)."
fi
echo "Mengirim $(git log -1 --format='%h %s')"

ARCHIVE="$(mktemp -t rr-deploy.XXXXXX.tar.gz)"
trap 'rm -f "$ARCHIVE"' EXIT

step "Bangun arsip dari HEAD"
git archive --format=tar.gz HEAD -o "$ARCHIVE"
echo "Ukuran arsip: $(du -h "$ARCHIVE" | cut -f1)"

if [ "$DRY_RUN" -eq 1 ]; then
    echo
    echo "Dry run selesai. Tidak ada yang dikirim ke $HOST."
    exit 0
fi

step "Cek koneksi SSH ke $HOST"
remote "test -d ~/$REMOTE_DIR" \
    || die "Tidak bisa SSH ke $HOST atau ~/$REMOTE_DIR tidak ada. Pastikan DEPLOY_KEY menunjuk ke identity file yang benar (default: ~/.ssh/id_ed25519_vps_jakarta) — VPS ini password login-nya dimatikan."

step "Kirim arsip ke VPS"
scp "${SSH_OPTS[@]}" -q "$ARCHIVE" "$HOST:~/apps/rr-deploy.tar.gz"

step "Extract dan build image (bisa beberapa menit)"
remote "cd ~/$REMOTE_DIR && tar -xzf ../rr-deploy.tar.gz && rm ../rr-deploy.tar.gz && docker compose build"

# down + up, bukan up -d saja: port 8080 gagal ter-publish karena race dengan
# container lama. Jangan pernah tambah -v (menghapus volume storage & sqlite).
step "Recreate container"
remote "cd ~/$REMOTE_DIR && docker compose down && docker compose up -d"

step "Tunggu container healthy (maks ${HEALTH_TIMEOUT} dtk)"
STATUS=""
for ((i = 0; i < HEALTH_TIMEOUT; i += 3)); do
    STATUS="$(remote "docker inspect -f '{{.State.Health.Status}}' $CONTAINER" 2>/dev/null || true)"
    [ "$STATUS" = "healthy" ] && break
    sleep 3
done
[ "$STATUS" = "healthy" ] || die "Container tidak healthy (status terakhir: '${STATUS:-tidak diketahui}'). Cek: ssh $HOST 'docker logs --tail 50 $CONTAINER'"

step "Verifikasi $URL"
CODE="$(curl -s -o /dev/null -m 20 -w '%{http_code}' "$URL" || true)"
[ "$CODE" = "200" ] || die "$URL membalas HTTP '${CODE:-tidak ada}', bukan 200. Container sehat, jadi cek nginx + proxy Cloudflare di VPS (lihat DEPLOY.md repo server)."

printf '\nDeploy selesai: %s -> HTTP %s\n' "$URL" "$CODE"
