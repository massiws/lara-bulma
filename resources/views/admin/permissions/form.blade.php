<div class="control container">
    @include('components.form.text', ['field' => 'name', 'icon' => 'lock', 'label' => 'general.name'])

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            {!! Form::label('roles', trans_choice('general.role', 2), ['class' => 'label']) !!}
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-multiple">
                        {!! Form::select('roles[]', $roles, old('roles'), ['multiple' => 'multiple']) !!}
                    </div>
                </div>
                @includeWhen($errors->has('roles'), 'components.form.help', ['msg' => $errors->first('roles')])
            </div>
        </div>
    </div>
</div>
