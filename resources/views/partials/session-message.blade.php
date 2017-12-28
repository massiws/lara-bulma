{{--
    HTML to display any session messages.
    Usage examples:
     1) from view:
        @include('partials.session-message')
     2) from controller:
        return redirect()->route('dashboard')->with(['status' => __('file.message'), 'style' => 'danger']);
--}}
@if (session('status'))
    <div class="notification column is-4 is-offset-4 has-text-centered is-{{ session('style') ? session('style') : 'info' }}">
        {{ session('status') }}
    </div>
@endif
