<?php

use App\Http\Controllers\LabelAudioController;
use App\Http\Livewire\Admin\AudioFilesController;
use App\Http\Livewire\Admin\DashboardControl;
use App\Http\Livewire\Admin\SubscriptionsControl;
use App\Http\Livewire\Admin\TransactionsControl;
use App\Http\Livewire\Admin\UsersControl;
use App\Http\Livewire\Admin\UserSubscriptionsControl;
use App\Http\Livewire\LabeledAuthorsController;
use App\Http\Livewire\LabeledSoundsController;
use App\Http\Livewire\LabeledTextsController;
use App\Http\Livewire\MainPage;
use App\Http\Livewire\Profile;
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

    Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('dashboard', DashboardControl::class)->name('admin.dashboard');
        Route::get('users', UsersControl::class)->name('admin.users');
        Route::get('subscriptions', SubscriptionsControl::class)->name('admin.subscriptions');
        Route::get('audio-files', AudioFilesController::class)->name('admin.audio.files');
        Route::get('labeled-sounds', LabeledSoundsController::class)->name('admin.labeled.sounds');
        Route::get('labeled-authors', LabeledAuthorsController::class)->name('admin.labeled.authors');
        Route::get('labeled-texts', LabeledTextsController::class)->name('admin.labeled.texts');
        Route::get('transactions', TransactionsControl::class)->name('admin.transactions');
        Route::get('users-subscriptions', UserSubscriptionsControl::class)->name('admin.users.subscriptions');
    });

    Route::group(['middleware' => 'subscribed'], function () {
        Route::post('save-sounds', [LabelAudioController::class, 'saveSounds'])->name('save-sounds');
        Route::post('save-authors', [LabelAudioController::class, 'saveAuthors'])->name('save-authors');
        Route::post('save-texts', [LabelAudioController::class, 'saveTexts'])->name('save-texts');
    });
});

