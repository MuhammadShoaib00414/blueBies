<?php

Breadcrumbs::for('admin.packages.index', function ($trail) {
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.index'));
});

Breadcrumbs::for('admin.packages.create', function ($trail) {
    $trail->parent('admin.packages.index');
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.create'));
});

Breadcrumbs::for('admin.packages.edit', function ($trail, $id) {
    $trail->parent('admin.packages.index');
    // $trail->push(__('labels.backend.access.supports.management'), route('admin.supports.edit', $id));
});


