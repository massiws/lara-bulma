{{--
    HTML to display a general error message.
    Usage example:
    @component('components.notification', [
            'style' => 'prymary|link|info|success|warning|danger',
            'class' => 'add extra classes here'
            'delete' => 'y'
        ])
        This is a notification message
    @endcomponent
--}}
<div class="notification {{ !empty($style) ? "is-$style" : '' }} {{ !empty($class) ? $class : '' }}">
    @if (!empty($delete))
        <button class="delete"></button>
    @endif

    {{ $slot }}
</div>
