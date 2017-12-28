{{--
    HTML to display a status message.
    Usage example:
    @component('components.message-status', ['title' => 'My title', 'style' => 'success'])
        {{ session('status') }}
    @endcomponent
--}}
@if (session('status'))
    <div class="message">
        @if (!empty($title))
            <div class="message-header">{{ $title }}</div>
        @endif
        <div class="notification {{ empty($style) ?: 'is-' . $style }}">
            {{ $slot }}
        </div>
    </div>
@endif
