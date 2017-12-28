{{--
    HTML to display a form field.

    Usage example:
    @include('components.form.text', [
        'field' => 'last_name' | 'object.name',
        'label' => __(file.key) (default: __("general.$field"))
        'required' => 'required' (default: '')
        'icon' => 'envelop' (default: no icon displayed),
        'readonly' (default: none)
    ])
--}}
@if (strpos($field, ".") !== false)
    {{ $field = explode('.', $field)[1] }}
@endif

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label for="{{ $field }}" class="label">{{ !empty($label) ? __($label) : __("general.$field") }}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control {{ !empty($icon) ? 'has-icons-left' : '' }}">
                <input type="text" name="{{ $field }}" class="input"
                    placeholder="{{ !empty($label) ? __($label) : __("general.$field") }}"
                    value="{{ old($field) }}"
                    {{ !empty($required) ? ' required=""' : '' }}
                    {{ !empty($readonly) ? ' readonly' : '' }}
                >
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
