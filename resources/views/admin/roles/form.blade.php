<div class="control container">
    @include('components.form.text', ['field' => 'name', 'icon' => 'users', 'label' => 'general.name'])

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            {!! Form::label('permissions', trans_choice('general.permission', 2), ['class' => 'label']) !!}
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select is-multiple">
                        {!! Form::select('permissions[]', $permissions, old('permissions'), ['multiple' => 'multiple']) !!}
                    </div>
                </div>
                @includeWhen($errors->has('permissions'), 'components.form.help', ['msg' => $errors->first('permissions')])
            </div>
        </div>
    </div>
</div>
