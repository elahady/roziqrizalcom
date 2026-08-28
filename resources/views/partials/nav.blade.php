@php
    $isActive = fn (string $path) => request()->is($path) ? 'active' : '';
@endphp
<div class="main-nav-wrap">
    <div class="site-wrap">
        <ul class="main-nav">
            <li class="{{ $isActive('/') }}"><a href="{{ url('/') }}">Home</a></li>

            <li class="{{ $isActive('journal') }}"><a href="{{ url('/journal') }}">Journal</a></li>

            <li class="has-children {{ $isActive('im-project-manager') }}">
                <a href="{{ url('/im-project-manager') }}">I'm Project Manager</a>
                <ul class="dropdown">
                    <li><a href="{{ url('/my-management-playbook') }}">My Management Playbook</a></li>
                </ul>
            </li>

            <li class="has-children {{ $isActive('it-enthusiast') }}">
                <a href="{{ url('/it-enthusiast') }}">I'm Tech Entusiast</a>
                <ul class="dropdown">
                    <li>
                        <a href="{{ url('/category/daily-jurnal-trading') }}">Daily Jurnal Trading</a>
                        <ul class="flyout">
                            <li><a href="{{ url('/category/daily-jurnal-trading/btcusd') }}">The Disciplined Ledger: Bitcoin Series</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="{{ $isActive('market-observer') }}">
                <a href="{{ url('/market-observer') }}">I'm Market Observer</a>
            </li>

            <li class="{{ $isActive('haji-2026') }}"><a href="{{ url('/haji-2026') }}">Hajj 2026</a></li>

            <li class="{{ $isActive('about-me') }}"><a href="{{ url('/about-me') }}">Hello, I'm Elahady!</a></li>
        </ul>
    </div>
</div>
