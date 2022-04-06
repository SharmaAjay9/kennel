<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControllerAdmin;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AizUploadController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PackagePaymentController;
use App\Http\Controllers\PackageController;
/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register admin routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */



Route::post('/aiz-uploader', [AizUploadController::class,'show_uploader']);
Route::post('/aiz-uploader/upload', [AizUploadController::class,'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [AizUploadController::class,'get_uploaded_files']);
Route::delete('/aiz-uploader/destroy/{id}', [AizUploadController::class,'destroy']);
Route::post('/aiz-uploader/get_file_by_ids', [AizUploadController::class,'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [AizUploadController::class,'attachment_download'])->name('download_attachment');
Route::get('/migrate/database', [AizUploadController::class,'migrate_database']);


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@admin_login')->name('admin');
});

Route::get('/admin/login', [HomeControllerAdmin::class,'admin_login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|super-admin']], function () {
    Route::get('/dashboard', [HomeControllerAdmin::class,'admin_dashboard'])->name('admin.dashboard');

    Route::resource('profile','\App\Http\Controllers\ProfileControllerAdmin');

    // member's package manage
   
    Route::get('/package-payment-invoice/{id}', [PackagePaymentController::class,'package_payment_invoice_admin'])->name('package_payment.invoice_admin');
   

    // Premium Packages
    Route::resource('/packages','App\Http\Controllers\PackageController');
    Route::post('/packages/update_package_activation_status', [PackageController::class,'update_package_activation_status'])->name('packages.update_package_activation_status');
    Route::get('/packages/destroy/{id}',[PackageController::class,'destroy'])->name('packages.destroy');

    // package Payments
    Route::resource('package-payments','App\Http\Controllers\PackagePaymentController');
    Route::get('/manual-payment-accept/{id}',[PackagePaymentController::class,'manual_payment_accept'])->name('manual_payment_accept');

    // Email Templates
    Route::resource('/email-templates','App\Http\Controllers\EmailTemplateController');
    Route::post('/email-templates/update', [EmailTemplateController::class,'update'])->name('email-templates.update');

    // Marketing
    Route::get('/newsletter', [NewsletterController::class,'index'])->name('newsletters.index');
    Route::post('/newsletter/send', [NewsletterController::class,'send'])->name('newsletters.send');
    Route::post('/newsletter/test/smtp', [NewsletterController::class,'testEmail'])->name('test.smtp');

    // Setting
    Route::resource('/settings','App\Http\Controllers\SettingController');
    Route::post('/settings/update', [SettingController::class,'update'])->name('settings.update');
    Route::post('/settings/activation/update', [SettingController::class,'updateActivationSettings'])->name('settings.activation.update');


    Route::get('/general-settings', [SettingController::class,'general_settings'])->name('general_settings');
    Route::get('/smtp-settings', [SettingController::class,'smtp_settings'])->name('smtp_settings');

    Route::get('/payment-methods-settings',[SettingController::class,'payment_method_settings'])->name('payment_method_settings');
    Route::post('/payment_method_update', [SettingController::class,'payment_method_update'])->name('payment_method.update');

    Route::get('/third-party-settings',[SettingController::class,'third_party_settings'])->name('third_party_settings');
    Route::post('/third-party-settings/update', [SettingController::class,'third_party_settings_update'])->name('third_party_settings.update');

    Route::get('/social-media-login-settings',[SettingController::class,'social_media_login_settings'])->name('social_media_login');

    Route::get('//member-profile-sections',[SettingController::class,'member_profile_sections_configuration'])->name('member_profile_sections_configuration');

    // env Update
    Route::post('/env_key_update', [SettingController::class,'env_key_update'])->name('env_key_update.update');

    // website setting
	Route::group(['prefix' => 'website'], function(){
    Route::get('/header_settings', [SettingController::class,'website_header_settings'])->name('website.header_settings');
    Route::get('/footer_settings', [SettingController::class,'website_footer_settings'])->name('website.footer_settings');
		Route::get('/appearances', [SettingController::class,'website_appearances'])->name('website.appearances');
		Route::resource('custom-pages', 'App\Http\Controllers\PageController');
		Route::get('/custom-pages/edit/{id}', [PageController::class,'edit'])->name('custom-pages.edit');
		Route::get('/custom-pages/destroy/{id}', [PageController::class,'destroy'])->name('custom-pages.destroy');
	});

    Route::resource('staffs','App\Http\Controllers\StaffController');
    Route::get('/staffs/destroy/{id}', [StaffController::class,'destroy'])->name('staffs.destroy');

    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::get('/roles/destroy/{id}', [RoleController::class,'destroy'])->name('roles.destroy');

    Route::get('/system/update', [SettingController::class,'system_update'])->name('system_update');
    Route::get('/system/server-status', [SettingController::class,'system_server'])->name('system_server');

    // uploaded files
    Route::any('/uploaded-files/file-info', [AizUploadController::class,'file_info'])->name('uploaded-files.info');
    Route::resource('/uploaded-files', 'App\Http\Controllers\AizUploadController');
    Route::get('/uploaded-files/destroy/{id}', [AizUploadController::class,'destroy'])->name('uploaded-files.destroy');

});

//Custom page
Route::get('/{slug}', [PageController::class,'show_custom_page'])->name('custom-pages.show_custom_page');

?>
