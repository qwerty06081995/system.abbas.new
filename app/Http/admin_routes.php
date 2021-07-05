<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

	/* ================== Orders ================== */
	Route::resource(config('laraadmin.adminRoute') . '/orders', 'LA\OrdersController');
	Route::get(config('laraadmin.adminRoute') . '/order_dt_ajax', 'LA\OrdersController@dtajax');

	/* ================== Overheads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/overheads', 'LA\OverheadsController');
	Route::get(config('laraadmin.adminRoute') . '/overhead_dt_ajax', 'LA\OverheadsController@dtajax');

	/* ================== Roads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roads', 'LA\RoadsController');
	Route::get(config('laraadmin.adminRoute') . '/road_dt_ajax', 'LA\RoadsController@dtajax');

    /* ================== Couriers ================== */
    Route::get(config('laraadmin.adminRoute') . '/courier', 'LA\CourierController@index')->name('la.courier');
    Route::post(config('laraadmin.adminRoute') . '/courier/appoint', 'LA\CourierController@courier_appoint')->name('la.courier_appoint');

    /* ================== Store ================== */
    Route::get(config('laraadmin.adminRoute') . '/store', 'LA\StoreController@index')->name('la.store');
    Route::get(config('laraadmin.adminRoute') . '/store/show/{id}', 'LA\StoreController@show')->name('la.store.show');
    Route::get(config('laraadmin.adminRoute') . '/store/check', 'LA\StoreController@check')->name('la.store.check');
    Route::get(config('laraadmin.adminRoute') . '/store/edit/{id}', 'LA\StoreController@editer')->name('la.store.edit');

    Route::get(config('laraadmin.adminRoute') . '/store/send', 'LA\StoreController@sendEvaluate')->name('la.store.send');
    /* ================== Contracts ================== */
    Route::get(config('laraadmin.adminRoute') . '/contract', 'LA\ContractController@index')->name('la.contract');
    Route::post(config('laraadmin.adminRoute') . '/contract/add/', 'LA\ContractController@add')->name('la.contract.add');
    Route::get(config('laraadmin.adminRoute') . '/contract/change/', 'LA\ContractController@change')->name('la.contract.change');

    /* ================== EVALUATE ================== */
    Route::get(config('laraadmin.adminRoute') . '/evaluate', 'LA\EvaluateController@index')->name('la.evaluate');

});
