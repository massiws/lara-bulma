@if (Auth::user()->hasPermission('browse-users'))
    <p class="menu-label">Team</p>
    <ul class="menu-list">
        <li>
            <a href="{{ route('users.index') }}" class="item {{ $menu === 'users' ? 'is-active' : '' }}" title="{{ trans_choice('general.user', 2) }}">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text-label is-hidden"> {{ trans_choice('general.user', 2) }}</span>
            </a>
        </li>

        @if (Auth::user()->hasPermission('browse-roles'))
            <li>
                <a href="{{ route('roles.index') }}" class="item {{ $menu === 'roles' ? 'is-active' : '' }}" title="{{ trans_choice('general.role', 2) }}">
                    <span class="icon"><i class="fa fa-users"></i></span>
                    <span class="text-label is-hidden">{{ trans_choice('general.role', 2) }}</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->hasPermission('browse-permissions'))
            <li>
                <a href="{{ route('permissions.index') }}" class="item {{ $menu === 'permissions' ? 'is-active' : '' }}" title="{{ trans_choice('general.permission', 2) }}">
                    <span class="icon"><i class="fa fa-lock"></i></span>
                    <span class="text-label is-hidden">{{ trans_choice('general.permission', 2) }}</span>
                </a>
            </li>
        @endif
    </ul>
@endif
