<?php

Breadcrumbs::for('admin.contacts.index', function ($trail) {
    $trail->push(__('Connect'), route('admin.contacts.index'));
});

Breadcrumbs::for('admin.contacts.create', function ($trail) {
    $trail->parent('admin.contacts.index');
    // $trail->push(__('Connect'), route('admin.contacts.create'));
});

Breadcrumbs::for('admin.contacts.edit', function ($trail, $id) {
    $trail->parent('admin.contacts.index');
    // $trail->push(__('Connect'), route('admin.contacts.edit', $id));
});
