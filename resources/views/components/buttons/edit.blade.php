{{--
    HTML to display the Edit button (always with a 'Back' button).

    Usage example (`back` parameter is optional):
    @include('components.buttons.edit', ['entity' => $user, 'back' => 'users.index'])

--}}
<div class="field is-grouped">
    @include('components.buttons.back', ['back' => empty($back) ? $entity->getTable() . '.index' : $back])

    @if (Auth::user()->hasPermission('edit-' . $entity->getTable()))
        <div class="control">
            <a href="{{ route($entity->getTable() . '.edit', $entity) }}" class="button is-warning" title="@lang('general.edit')">
                <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                <span>&nbsp;@lang('general.edit')</span>
            </a>
        </div>
    @endif
</div>
