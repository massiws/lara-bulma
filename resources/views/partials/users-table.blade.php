<table class="table is-striped is-narrow is-hoverable is-fullwidth">
    <thead class="thead">
        <tr>
            <th class="is-narrow has-text-right is-hidden-mobile">ID</th>
            <th class="is-narrow has-text-centered is-hidden-touch"></th>
            <th>@lang('general.name')</th>
            <th class="is-hidden-mobile">@lang('general.email')</th>
            <th class="is-hidden-touch">{{ trans_choice('general.role', 1) }}</th>
            <th class="is-narrow"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr data-uid="{{ $user->id }}">
                <td class="has-text-right is-hidden-mobile">{{ $user->id }}</td>
                <td class="has-text-centered is-hidden-touch">
                    <figure class="image is-rounded is-24x24 container">
                        <img src="{{ is_null($user->avatar) ? asset(env('DEFAULT_AVATAR', '-')) : asset(env('AVATAR_FOLDER') . '/' . $user->avatar) }}">
                    </figure>
                </td>
                <td>{{ $user->name }}</td>
                <td class="is-hidden-mobile">{{ $user->email }}</td>
                <td class="is-hidden-touch">{{ $user->role->name }}</td>
                <td class="has-text-right">
                    @include('partials.action-buttons', ['entity' => $user])
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
