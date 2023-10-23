<?php

Breadcrumbs::for('admin.supports.index', function ($trail) {
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.index'));
});

Breadcrumbs::for('admin.supports.create', function ($trail) {
    $trail->parent('admin.supports.index');
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.create'));
});

Breadcrumbs::for('admin.supports.edit', function ($trail, $id) {
    $trail->parent('admin.supports.index');
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.edit', $id));
});
