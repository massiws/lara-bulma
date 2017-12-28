<?php
/*
 * Register breadcrumbs for roles pages.
 */

// Home > Roles
Breadcrumbs::register('roles.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push(trans_choice('general.role', 2), route('roles.index'));
});
// Home > Roles > Role profile
Breadcrumbs::register('roles.show', function ($breadcrumbs, $role) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push($role->name, route('roles.show', $role));
});
// Home > Roles > Edit role
Breadcrumbs::register('roles.edit', function ($breadcrumbs, $role) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push($role->name, route('roles.edit', $role));
});
// Home > Roles > Create Role
Breadcrumbs::register('roles.create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles.index');
    $breadcrumbs->push(__('general.new'), route('roles.create'));
});
