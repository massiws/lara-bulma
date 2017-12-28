<div class="menu-label sidebar-avatar is-flex">
    <div class="media">
        <figure class="media-left image is-rounded is-32x32">
            <img src="/storage/avatars/{{ optional(Auth::user())->avatar ? Auth::user()->avatar : env('DEFAULT_AVATAR', '') }}">
        </figure>
        <div class="media-content">
            <div class="content">
                <span class="text-label is-hidden">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</div>
