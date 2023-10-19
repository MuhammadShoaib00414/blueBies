<?php

Breadcrumbs::for('admin.contacts.index', function ($trail) {
    $trail->push(__('labels.backend.access.contacts.management'), route('admin.contacts.index'));
});

Breadcrumbs::for('admin.contacts.create', function ($trail) {
    $trail->parent('admin.contacts.index');
    $trail->push(__('labels.backend.access.contacts.management'), route('admin.contacts.create'));
});

Breadcrumbs::for('admin.contacts.edit', function ($trail, $id) {
    $trail->parent('admin.contacts.index');
    $trail->push(__('labels.backend.access.contacts.management'), route('admin.contacts.edit', $id));
});
