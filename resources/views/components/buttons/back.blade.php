{{--
    HTML to display the Back button.

    Usage example:
    @include('components.buttons.back', 'back' => 'users.index')
--}}

<div class="control">
    <a class="button is-outlined" href="{{ route($back) }}" title="@lang('general.back')">
        <span class="icon"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
        <span>&nbsp;@lang('general.back')</span>
    </a>
</div>
