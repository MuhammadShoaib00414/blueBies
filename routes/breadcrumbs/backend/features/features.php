<?php

Breadcrumbs::for('admin.features.index', function ($trail) {
    $trail->push(__('labels.backend.access.faqs.management'), route('admin.faqs.index'));
});

Breadcrumbs::for('admin.features.create', function ($trail) {
    $trail->parent('admin.faqs.index');
    $trail->push(__('labels.backend.access.faqs.management'), route('admin.faqs.create'));
});

Breadcrumbs::for('admin.features.edit', function ($trail, $id) {
    $trail->parent('admin.features.index');
    $trail->push(__('labels.backend.access.faqs.management'), route('admin.faqs.edit', $id));
});
