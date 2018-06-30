<div class="control container">
    @include('components.form.text', ['field' => 'name', 'icon' => 'user', 'label' => 'general.name'])
    @include('components.form.text', ['field' => 'email', 'icon' => 'envelope', 'label' => 'general.email'])

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            {!! Form::label('password', 'Password', ['class' => 'label']) !!}
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left">
                    {!! Form::password('password', ['class' => 'input', 'placeholder' => 'Password', 'required' => '']) !!}
                    <span class="icon is-small is-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>
                @includeWhen($errors->has('password'), 'components.form.help', ['msg' => $errors->first('password')])
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            {!! Form::label('password_confirmation', __('general.password_confirm'), ['class' => 'label']) !!}
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control has-icons-left">
                    {!! Form::password('password_confirmation', ['class' => 'input', 'placeholder' => __('general.password_confirm'), 'required' => '']) !!}
                    <span class="icon is-small is-left"><i class="fa fa-lock" aria-hidden="true"></i></span>
                </div>
                @includeWhen($errors->has('password_confirmation'), 'components.form.help', ['msg' => $errors->first('password_confirmation')])
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            {!! Form::label('role_id', trans_choice('general.role', 1), ['class' => 'label']) !!}
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <div class="select">
                        {!! Form::select('role_id', $roles, $selectedRole, ['required' => ''] ) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label for="avatar" class="label">Avatar</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <figure class="image is-128x128 is-rounded has-text-centered">
                        <img src="{{ is_null($user->avatar) ? asset(env('DEFAULT_AVATAR', '-')) : asset(env('AVATAR_FOLDER') . '/' . $user->avatar) }}">
                    </figure>
                    <div class="file is-info has-name">
                        <label class="file-label" for="avatar">
                            <input class="file-input" type="file" name="avatar" id="avatar" data-multiple-caption="{count} file uploaded">
                            <span class="file-cta">
                                <span class="file-icon"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                <span class="file-label">{{ __('general.upload_image') }}</span>
                            </span>
                        </label>
                    </div>
                </div>
                @includeWhen($errors->has('avatar'), 'components.form.help', ['msg' => $errors->first('avatar')])
            </div>
        </div>
    </div>
</div>
