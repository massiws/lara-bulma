<?php
/*
 * Register breadcrumbs for users pages.
 */

// Home > Users
Breadcrumbs::register('users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(trans_choice('general.user', 2), route('users.index'));
});
// Home > Users > User profile
Breadcrumbs::register('users.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push($user->name, route('users.show', $user));
});
// Home > Users > Edit user profile
Breadcrumbs::register('users.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push($user->name, route('users.edit', $user));
});
// Home > Users > Create user
Breadcrumbs::register('users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('users.index');
    $breadcrumbs->push(__('general.new'), route('users.create'));
});
