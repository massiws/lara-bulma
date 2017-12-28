<aside id="sidebar-menu" class="menu">
    <ul class="menu-list">
        @include('partials.menu-avatar')
        <li>
            <a href="{{ route('dashboard') }}" class="{{ $menu === 'dashboard' ? 'is-active' : '' }}" title="@lang('general.dashboard')">
                <span class="icon"><i class="fa fa-dashboard" aria-hidden="true"></i></span>
                <span class="text-label is-hidden"> @lang('general.dashboard')</span>
            </a>
        </li>
    </ul>

    @include('partials.sidebar-team')

    <p class="menu-label">Others</p>
    <ul class="menu-list">
        <li>
            <a href="#" class="item" title="Others">
                <span class="icon"><i class="fa fa-database"></i></span>
                <span class="text-label is-hidden"> Others</span>
            </a>
        </li>
    </ul>
</aside>
