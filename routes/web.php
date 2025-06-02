<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Role\Index as RoleIndex;
use App\Livewire\Role\Create as RoleCreate;
use App\Livewire\Role\Edit as RoleEdit;
use App\Livewire\Role\AssignPermission;
use App\Livewire\Permission\Index as PermissionIndex;
use App\Livewire\Permission\Create as PermissionCreate;
use App\Livewire\Permission\Edit as PermissionEdit;

Route::get('/', Login::class)->name('login');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', RoleIndex::class)->name('index')->middleware('permission:read-role');
        Route::get('/create', RoleCreate::class)->name('create')->middleware('permission:create-role');
        Route::get('/{role}/edit', RoleEdit::class)->name('edit')->middleware('permission:update-role');
        Route::get('/{role}/assign-permission', AssignPermission::class)->name('assign-permission')->middleware('permission:assign-permission');
    });

    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', PermissionIndex::class)->name('index')->middleware('permission:read-permission');
        Route::get('/create', PermissionCreate::class)->name('create')->middleware('permission:create-permission');
        Route::get('/{permission}/edit', PermissionEdit::class)->name('edit')->middleware('permission:update-permission');
    });
});