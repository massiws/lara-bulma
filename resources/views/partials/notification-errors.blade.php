{{--
    HTML to display all error messages on a form.
    Usage example:
    @includeWhen($errors->any(), 'partials.notification-errors', ['errors' => $errors])
--}}
@foreach ($errors->all() as $error)
    <div class="notification is-danger">{{ $error }}</div>
@endforeach
