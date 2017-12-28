{{--
    HTML to display 'Save' button in a form (always with a 'Back' button).

    Usage example:
    @include('components.buttons.save', ['back' => 'users.index'])
--}}
<div class="field is-grouped">
    @include('components.buttons.back', ['back' => $back])

    <div class="control has-text-right">
        <button type="submit" class="button is-success" title="Save">
            <span class="icon is-small"><i class="fa fa-check" aria-hidden="true"></i></span>
            <span>@lang('general.save')</span>
        </button>
    </div>
</div>
