{{--
    HTML to display action buttons on tables.

    Usage example:
    @include('partials.action-buttons', ['entity' => $user])
--}}
@if (!empty($entity) && !empty($entity->id))
    <div class="action-buttons field is-grouped">

        @if (Auth::user()->hasPermission('view-' . $entity->getTable()))
            <p class="control">
                <a href="{{ route($entity->getTable() . '.show', [$entity]) }}" class="button is-small is-info" title="@lang('general.view')">
                    <span class="icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                    {{-- <span>&nbsp;@lang('general.view')</span> --}}
                </a>
            </p>
        @endif

        @if (Auth::user()->hasPermission('edit-' . $entity->getTable()))
            <p class="control">
                <a href="{{ route($entity->getTable() . '.edit', [$entity]) }}" class="button is-small is-warning" title="@lang('general.edit')">
                    <span class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    {{-- <span>&nbsp;@lang('general.edit')</span> --}}
                </a>
            </p>
        @endif

        @if (Auth::user()->hasPermission('delete-' . $entity->getTable()))
            <div class="control">
                {!! Form::open([
                        'route' => [$entity->getTable() . '.destroy', $entity->id],
                        'method' => 'DELETE',
                        'class' => 'is-inline-flex',
                        'onsubmit' => "return confirm('" . __('general.confirm_delete', ['id' => $entity->id]) . "');",
                ]) !!}
                <button class="button is-small is-danger" type="submit" title="@lang('general.delete')">
                    <span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></span>
                    {{-- <span>&nbsp;@lang('general.delete')</span> --}}
                </button>
            </div>
            {!! Form::close() !!}
        @endif
    </div>
@endif
