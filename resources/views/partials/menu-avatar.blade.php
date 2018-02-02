<div class="menu-label sidebar-avatar is-flex">
    <div class="media">
        <figure class="media-left image is-rounded is-32x32">
            <img src="{{ is_null(Auth::user()->avatar) ? asset(env('DEFAULT_AVATAR', '-')) : asset(env('AVATAR_FOLDER') . '/' . Auth::user()->avatar) }}">
        </figure>
        <div class="media-content">
            <div class="content">
                <span class="text-label is-hidden">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</div>
