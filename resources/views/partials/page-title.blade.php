{{--
    HTML to display a the page title.

    Usage example:
    @include('partials.page-title', ['title' => 'Your page title'])
--}}
@if (!empty($title))
    <div class="column is-12">
        <h1 class="title is-3">{{ $title }}</h1>
    </div>
@endif
