<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('post.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Posts', route('post.create'));
});

Breadcrumbs::for('regulasi.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Regulasi', route('regulasi.index'));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('User', route('user.create'));
});

Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('activity-log.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Log Aktifitas', route('activity-log.index'));
});

Breadcrumbs::for('permission.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Permissions', route('permission.create'));
});

Breadcrumbs::for('jenis-kasus.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Jenis Kasus', route('jenis-kasus.index'));
});

Breadcrumbs::for('pengaduan-masuk.index', function($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Pengaduan', route('pengaduan-masuk.index'));
});

Breadcrumbs::for('non-pengaduan.index', function($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Pengaduan', route('pengaduans.index'));
    $trail->push('Non-pengaduan', route('non-pengaduan.index'));
});

Breadcrumbs::for('backupdata.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Cadangkan', route('backupdata.index'));
});

Breadcrumbs::for('kegiatan.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Jadwal Kegiatan', route('kegiatan.index'));
});

Breadcrumbs::for('profil', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Profil', route('profil'));
});

Breadcrumbs::for('hubungi-kami.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Hubungi Kami', route('hubungi-kami.index'));
});
