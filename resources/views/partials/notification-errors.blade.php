{{--
    HTML to display all error messages on a form.
    Usage example:
    @includeWhen($errors->any(), 'partials.notification-errors', ['errors' => $errors])
--}}
@foreach ($errors->all() as $error)
    @component('components.notification', ['style' => 'danger'])
        {{ $error }}
    @endcomponent
@endforeach
