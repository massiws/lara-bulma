<?php
/*
 * Register breadcrumbs for permissions pages.
 */

// Home > Permissions
Breadcrumbs::register('permissions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(trans_choice('general.permission', 2), route('permissions.index'));
});
// Home > Permissions > Permission show
Breadcrumbs::register('permissions.show', function ($breadcrumbs, $permission) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push($permission->name, route('permissions.show', $permission));
});
// Home > Permissions > Edit permission
Breadcrumbs::register('permissions.edit', function ($breadcrumbs, $permission) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push($permission->name, route('permissions.edit', $permission));
});
// Home > Permissions > Create Permission
Breadcrumbs::register('permissions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('permissions.index');
    $breadcrumbs->push(__('general.new'), route('permissions.create'));
});
