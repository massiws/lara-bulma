{{--
    HTML to display a help message on a form field.

    Usage example:
    @includeWhen($errors->has('email'), 'components.form.help', ['msg' => $errors->first('email')])
--}}
<p class="help is-danger">{{ $msg }}</p>
