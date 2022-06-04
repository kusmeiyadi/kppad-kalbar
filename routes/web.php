<?php

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Admin'], function(){
  Route::post('notification/pengaduan/notification', 'PengaduanController@notification');
  Route::post('markAsRead', 'PengaduanController@markAsRead')->name('markAsRead');
  Route::get('readPengaduan/{pengaduan_id?}', 'PengaduanController@readPengaduan')->name('readPengaduan');
  Route::post('allMarkAsread', 'PengaduanController@allMarkAsread')->name('allMarkAsread');
  Route::get('readAllPengaduan', 'PengaduanController@readAllPengaduan')->name('readAllPengaduan');

  Route::group(['middleware' => ['role:Ketua Komisioner|Wakil Ketua Komisioner|Komisioner|Staf'], 'prefix' => 'admin'], function () {
       Route::group(['middleware' => ['permission:lihat pengguna|sunting pengguna']], function() {
          Route::resource('user', 'UserController')->except([
              'show'
          ]);
       });
       Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
       Route::resource('roles', 'RoleController')->except([
           'create', 'show', 'edit', 'update'
       ]);
       Route::get('user/roles/{id}', 'UserController@roles')->name('user.roles');
       Route::put('user/roles/{id}', 'UserController@setRole')->name('user.set_role');
       Route::post('user/permission', 'UserController@addPermission')->name('user.add_permission');
       Route::get('user/role-permission', 'UserController@rolePermission')->name('user.roles_permission');
       Route::put('user/permission/{role}', 'UserController@setRolePermission')->name('user.setRolePermission');
       Route::get('profil', 'UserController@profile')->name('profil');
       Route::post('change-password', 'UserController@updatePassword')->name('change.password');
       Route::post('change-profile', 'UserController@updateProfile')->name('change.profile');

       Route::resource('pengaduan-masuk', 'PengaduanController');
       Route::patch('pengaduan/detail/{id}/perbaharui-pelapor', 'PengaduanController@sunting_pelapor')->name('sunting.pelapor');
       Route::patch('pengaduan/detail/{id}/perbaharui-korban', 'PengaduanController@sunting_korban')->name('sunting.korban');
       Route::patch('pengaduan/detail/{id}/perbaharui-terlapor', 'PengaduanController@sunting_terlapor')->name('sunting.terlapor');
       Route::get('pengaduan/konfirmasi', 'PengaduanController@accepted')->name('pengaduan.accepted');
       Route::get('pengaduan/tolak', 'PengaduanController@rejected')->name('pengaduan.rejected');
       Route::get('pengaduan/selesai', 'PengaduanController@finish')->name('pengaduan.finish');
       Route::put('pengaduan/{id}/serahkan', 'PengaduanController@serahkan')->name('pengaduan.serahkan');
       Route::put('pengaduan/{id}/pasal', 'PengaduanController@pasal')->name('pengaduan.pasal');
       Route::put('pengaduan/{id}/approve', 'PengaduanController@approval')->name('pengaduan.approve');
       Route::put('pengaduan/{id}/tolak', 'PengaduanController@tolak')->name('pengaduan.tolak');
       Route::get('pengaduan/{id}/email','PengaduanController@email')->name('pengaduan.email');
       Route::post('pengaduan/sms','PengaduanController@sms')->name('pengaduan.sms');
       Route::get('sms','PengaduanController@sms_view');

       Route::get('non-pengaduan', 'NonpengaduanController@index')->name('non-pengaduan.index');
       Route::get('non-pengaduan/tambah', 'NonpengaduanController@create')->name('non-pengaduan.tambah');
       Route::post('non-pengaduan/upload', 'NonpengaduanController@store')->name('non-pengaduan.upload');

       Route::get('backup-data', 'DataController@index')->name('backupdata.index');

       Route::resource('jenis-kasus', 'JenisKasusController');

       Route::resource('regulasi', 'RegulasiController');
       Route::resource('hubungi-kami', 'HubungiKamiController');

       Route::get('kegiatan', 'KegiatanController@index')->name('kegiatan.index');
       Route::get('load-events', 'EventController@loadEvents')->name('routeLoadEvents');
       Route::put('event-update', 'EventController@update')->name('routeEventUpdate');
       Route::post('event-store', 'EventController@store')->name('routeEventStore');
       Route::delete('event-destroy', 'EventController@destroy')->name('routeEventDelete');

       Route::delete('fast-event-destroy', 'FastKegiatanController@destroy')->name('routeFastEventDelete');
       Route::put('fast-event-update', 'FastKegiatanController@update')->name('routeFastEventUpdate');
       Route::post('fast-event-store', 'FastKegiatanController@store')->name('routeFastEventStore');

       
       Route::resource('activity-log', 'ActivityLogController')->except([
           'show'
       ]);
       Route::get('orderStatusUpdate','PengaduanController@orderStatusUpdate');     
   });
  Route::group(['namespace' => 'Auth'], function(){
      Route::get('admin-log-in', 'LoginController@showLoginForm')->name('admin.login')->middleware('pagespeed');
      Route::post('admin-log-in', 'LoginController@login');
  });
});

Route::group(['namespace' => 'User'], function(){
  Route::get('/', 'HomeController@index')->name('user.beranda');

  Route::get('pengaduan-online', 'PengaduanController@index')->name('user.pengaduan-online');
  Route::post('pengaduan/kirim', 'PengaduanController@store')->name('user.pengaduan-online-kirim');

  Route::get('tracking-pengaduan', 'TrackingController@index')->name('user.tracking-pengaduan');
  Route::get('/search', 'TrackingController@search');
  Route::post('upload-bukti','PengaduanController@upload')->name('user.upload-bukti');

  Route::get('regulasi-anak', 'RegulasiController@index')->name('regulasi-anak')->middleware('pagespeed');
  Route::get('regulasi-anak/undang-undang', 'RegulasiController@undang')->name('regulasi-anak/undang-undang');
  Route::get('regulasi-anak/pemerintah', 'RegulasiController@pemerintah')->name('regulasi-anak/pemerintah');
  Route::get('regulasi-anak/presiden', 'RegulasiController@presiden')->name('regulasi-anak/presiden');
  Route::get('regulasi-anak/menteri', 'RegulasiController@menteri')->name('regulasi-anak/menteri');
  Route::get('regulasi-anak/daerah', 'RegulasiController@daerah')->name('regulasi-anak/daerah');
  Route::get('regulasi-anak/bupati', 'RegulasiController@bupati')->name('regulasi-anak/bupati');
  Route::get('regulasi-anak/{slug}', 'RegulasiController@show')->name('regulasi.show');
  Route::get('regulasi-anak/{slug}/download', 'RegulasiController@download')->name('regulasi.download');

  Route::get('tabulasi-data', 'TabulasiController@index')->name('tabulasi-data');

  Route::get('hubungi-kami', 'HubungiKamiController@index')->name('user.hubungi-kami');
  Route::post('hubungi-kami/kirim', 'HubungiKamiController@store')->name('user.hubungi-kami/kirim');
});
