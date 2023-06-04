<?php

use App\Http\Controllers\Admin\AdministrationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\Password\ForgotController;
use App\Http\Controllers\Admin\Auth\Password\ResetController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\Blog\Draft\CreateController as DraftCreateController;
use App\Http\Controllers\Admin\Blog\Draft\EditController as DraftEditController;
use App\Http\Controllers\Admin\Blog\Post\CreateController;
use App\Http\Controllers\Admin\Blog\Post\EditController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\MainController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Main\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::prefix('/blog')->group(function () {
    Route::get('/', [MainController::class, 'index'])
        ->name('blog');
    Route::get('/post/{post}', [PostController::class, 'index'])
        ->name('blog.post');
    Route::get('category/{category}', [CategoryController::class, 'index'])
        ->name('blog.category');
});
Route::prefix(config('binkap.name'))->group(function () {
    Route::prefix('admin')->group(function () {
        Route::middleware('guest:admin')->group(function () {
            Route::get('login', [LoginController::class, 'index'])
                ->name('admin.login');
            Route::prefix('/password')->group(function () {
                Route::get('forgot', [ForgotController::class, 'index'])
                    ->name('admin.password.forgot');
                Route::get('reset/{token}', [ResetController::class, 'index'])
                    ->name('admin.password.reset');
            });
        });
        Route::middleware('auth:admin')->group(function () {
            Route::get('home', [DashboardController::class, 'index'])
                ->name('admin.dash');
            Route::get('statistic', [StatisticController::class, 'index'])
                ->name('admin.stat');
            Route::get('profile', [ProfileController::class, 'index'])
                ->name('admin.profile');
            Route::get('administration', [AdministrationController::class, 'index'])
                ->name('admin.administration');
            Route::get('blog', [BlogController::class, 'index'])
                ->name('admin.blog');
            Route::get('settings', [SettingController::class, 'index'])
                ->name('admin.settings');
            Route::get('newsletter', [NewsletterController::class, 'index'])
                ->name('admin.newsletter');
            Route::get('media', [MediaController::class, 'index'])
                ->name('admin.media');
            Route::get('trash', [TrashController::class, 'index'])
                ->name('admin.trash');
            Route::prefix('post')->group(function () {
                Route::get('create', [CreateController::class, 'index'])
                    ->name('admin.post.create');
                Route::get('edit/{post}', [EditController::class, 'index'])
                    ->name('admin.post.edit');
            });
            Route::prefix('draft')->group(function () {
                Route::get('create', [DraftCreateController::class, 'index'])
                    ->name('admin.draft.create');
                Route::get('edit/{draft}', [DraftEditController::class, 'index'])
                    ->name('admin.draft.edit');
            });
        });
    });
});

// Ignore the below routes (I use them for testing only)

// Route::any('/binkap', [App\Ignore\MailController::class, 'index']);
