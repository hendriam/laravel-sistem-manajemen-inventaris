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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 

Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', RoleIndex::class)->name('index');
    Route::get('/create', RoleCreate::class)->name('create');
    Route::get('/{role}/edit', RoleEdit::class)->name('edit');
    Route::get('/{role}/assign-permission', AssignPermission::class)->name('assign-permission');
});

Route::prefix('permissions')->name('permissions.')->group(function () {
    Route::get('/', PermissionIndex::class)->name('index');
    Route::get('/create', PermissionCreate::class)->name('create');
    Route::get('/{permission}/edit', PermissionEdit::class)->name('edit');
});