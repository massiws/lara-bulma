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

        @component('components.notification', ['style' => $style])
            {{ $slot }}
        @endcomponent
    </div>
@endif
