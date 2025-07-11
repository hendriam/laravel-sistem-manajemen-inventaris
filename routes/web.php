<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\User\Index as UserIndex;
use App\Livewire\User\Create as UserCreate;
use App\Livewire\User\Edit as UserEdit;
use App\Livewire\Role\Index as RoleIndex;
use App\Livewire\Role\Create as RoleCreate;
use App\Livewire\Role\Edit as RoleEdit;
use App\Livewire\Role\AssignPermission;
use App\Livewire\Permission\Index as PermissionIndex;
use App\Livewire\Permission\Create as PermissionCreate;
use App\Livewire\Permission\Edit as PermissionEdit;
use App\Livewire\Profile\Show as ProfileShow;
use App\Livewire\Profile\Edit as ProfileEdit;
use App\Livewire\Category\Index as CategoryIndex;
use App\Livewire\Category\Create as CategoryCreate;
use App\Livewire\Category\Edit as CategoryEdit;
use App\Livewire\Location\Index as LocationIndex;
use App\Livewire\Location\Create as LocationCreate;
use App\Livewire\Location\Edit as LocationEdit;
use App\Livewire\Inventory\Index as InventoryIndex;
use App\Livewire\Inventory\Create as InventoryCreate;
use App\Livewire\Inventory\Edit as InventoryEdit;
use App\Livewire\TransactionIn\Index as TransactionInIndex;
use App\Livewire\TransactionIn\Create as TransactionInCreate;
use App\Livewire\TransactionIn\Show as TransactionInShow;
use App\Livewire\TransactionOut\Index as TransactionOutIndex;
use App\Livewire\TransactionOut\Create as TransactionOutCreate;
use App\Livewire\TransactionOut\Show as TransactionOutShow;

Route::get('/', Login::class)->name('login');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');    

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/show', ProfileShow::class)->name('show')->middleware('permission:profile-show');
        Route::get('/edit', ProfileEdit::class)->name('edit')->middleware('permission:profile-edit');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', UserIndex::class)->name('index')->middleware('permission:read-user');
        Route::get('/create', UserCreate::class)->name('create')->middleware('permission:create-user');
        Route::get('/{user}/edit', UserEdit::class)->name('edit')->middleware('permission:update-user');
    });

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

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', CategoryIndex::class)->name('index')->middleware('permission:read-category');
        Route::get('/create', CategoryCreate::class)->name('create')->middleware('permission:create-category');
        Route::get('/{category}/edit', CategoryEdit::class)->name('edit')->middleware('permission:update-category');
    });

    Route::prefix('locations')->name('locations.')->group(function () {
        Route::get('/', LocationIndex::class)->name('index')->middleware('permission:read-location');
        Route::get('/create', LocationCreate::class)->name('create')->middleware('permission:create-location');
        Route::get('/{location}/edit', LocationEdit::class)->name('edit')->middleware('permission:update-location');
    });

    Route::prefix('inventories')->name('inventories.')->group(function () {
        Route::get('/', InventoryIndex::class)->name('index')->middleware('permission:read-inventory');
        Route::get('/create', InventoryCreate::class)->name('create')->middleware('permission:create-inventory');
        Route::get('/{inventory}/edit', InventoryEdit::class)->name('edit')->middleware('permission:update-inventory');
    });

    Route::prefix('transaction-in')->name('transaction-in.')->group(function () {
        Route::get('/', TransactionInIndex::class)->name('index')->middleware('permission:read-transaction-in');
        Route::get('/create', TransactionInCreate::class)->name('create')->middleware('permission:create-transaction-in');
        Route::get('/{id}/show', TransactionInShow::class)->name('show')->middleware('permission:show-transaction-in');
    });

    Route::prefix('transaction-out')->name('transaction-out.')->group(function () {
        Route::get('/', TransactionOutIndex::class)->name('index')->middleware('permission:read-transaction-out');
        Route::get('/create', TransactionOutCreate::class)->name('create')->middleware('permission:create-transaction-out');
        Route::get('/{id}/show', TransactionOutShow::class)->name('show')->middleware('permission:show-transaction-out');
    });
});