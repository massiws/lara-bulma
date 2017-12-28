<?php

// Home
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('general.dashboard'), route('dashboard'));
});
