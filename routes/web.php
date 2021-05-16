<?php

use App\Http\Controllers\Admin\SubstancesController;
use App\Http\Livewire\Admin\DashboardControl;
use App\Http\Livewire\Admin\DrugsControl;
use App\Http\Livewire\Admin\SubscriptionsControl;
use App\Http\Livewire\Admin\UsersControl;
use App\Http\Livewire\Archive;
use App\Http\Livewire\MainPage;
use App\Http\Livewire\Admin\SubstancesControl;
use App\Http\Livewire\Profile;
use App\Http\Livewire\SearchPage;
use App\Http\Livewire\Subscriptions;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware' => ['auth', 'shareUser']], function () {
    Route::get('/', MainPage::class)->name('main-page');
    Route::get('profile', Profile::class)->name('profile');
    Route::get('subscriptions', Subscriptions::class)->name('subscriptions');
    Route::get('archive', Archive::class)->name('archive');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('dashboard', DashboardControl::class)->name('admin.dashboard');
        Route::get('users', UsersControl::class)->name('admin.users');
        Route::get('subscriptions', SubscriptionsControl::class)->name('admin.subscriptions');
    });
});

