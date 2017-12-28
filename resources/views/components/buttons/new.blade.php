{{--
    HTML to display the Add new button.

    Usage example:
    @include('components.buttons.new', ['route' => 'example.route'])
--}}
<span class="pull-right">
    <a class="button is-success is-small" href="{{ route($route) }}" title="@lang('general.new')">
        <span class="icon"><i class="fa fa-plus" aria-hidden="true"></i></span>
        <span>&nbsp;@lang('general.new')</span>
    </a>
</span>
