<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Role\Index as RoleIndex;
use App\Livewire\Role\Create as RoleCreate;
use App\Livewire\Role\Edit as RoleEdit;

Route::get('/', Login::class)->name('login');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); 

Route::get('/roles', RoleIndex::class)->name('roles.index');
Route::get('/roles/create', RoleCreate::class)->name('roles.create');
Route::get('/roles/{role}/edit', RoleEdit::class)->name('roles.edit');