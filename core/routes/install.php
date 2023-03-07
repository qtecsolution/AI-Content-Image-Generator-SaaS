<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\InstallerController::class, 'welcome'])->name('install');
Route::get('permission', [\App\Http\Controllers\InstallerController::class, 'permission'])->name('permission');
Route::get('set/database', [\App\Http\Controllers\InstallerController::class, 'create'])->name('create');
Route::post('setup/database', [\App\Http\Controllers\InstallerController::class, 'dbStore'])->name('db.setup');
Route::get('check/database', [\App\Http\Controllers\InstallerController::class, 'checkDbConnection'])->name('check.db');
Route::get('setup/import/sql', [\App\Http\Controllers\InstallerController::class, 'importSql'])->name('sql.setup');
Route::get('setup/create', [\App\Http\Controllers\InstallerController::class, 'sqlUpload'])->name('org.create');
Route::get('setup/create/two', [\App\Http\Controllers\InstallerController::class, 'sqlUpload2'])->name('org.create2');
Route::get('setup/empty/create', [\App\Http\Controllers\InstallerController::class, 'sqlUploadEmpty'])->name('sql.empty');

Route::post('setup/store', [\App\Http\Controllers\InstallerController::class, 'orgSetup'])->name('org.setup');
Route::get('setup/admin', [\App\Http\Controllers\InstallerController::class, 'adminCreate'])->name('admin.create');
Route::get('setup/done', [\App\Http\Controllers\InstallerController::class, 'done'])->name('done');
Route::post('setup/admin/store', [\App\Http\Controllers\InstallerController::class, 'adminStore'])->name('admin.store');
