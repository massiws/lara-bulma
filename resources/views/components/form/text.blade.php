{{--
    HTML to display a form field.

    Usage example:
    @include('components.form.text', [
        'field' => 'last_name'
        'label' => __(file.key) (default: __("general.$field"))
        'required' => 'required' (default: '')
        'icon' => 'envelop' (default: no icon displayed),
        'readonly' (default: none)
    ])
--}}
<div class="field is-horizontal">
    <div class="field-label is-normal">
        {!! Form::label($field, !empty($label) ? __($label) : __("general.$field"), ['class' => 'label']) !!}
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control {{ !empty($icon) ? 'has-icons-left' : '' }}">
                {{ Form::text($field, old($field), [
                    'class' => 'input',
                    'placeholder' => !empty($label) ? __($label) : __("general.$field")
                ]) }}

                @if (!empty($icon))
                    <span class="icon is-small is-left">
                        <i class="fa fa-{{ $icon }}" aria-hidden="true"></i>
                    </span>
                @endif
            </div>
            @includeWhen($errors->has($field), 'components.form.help', ['msg' => $errors->first($field)])
        </div>
    </div>
</div>
