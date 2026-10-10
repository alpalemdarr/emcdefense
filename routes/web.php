<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController as FrontendPageController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\RedirectIfAdminAuthenticated;
use Illuminate\Support\Facades\Route;

// ── FRONTEND ──────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/certificates', [HomeController::class, 'certificates'])->name('certificates');
Route::get('/product/{id}', [FrontendProductController::class, 'show'])->name('product.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::get('/deney-talep-formu', [ContactController::class, 'showTestRequest'])->name('test-request');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::post('/deney-talep-formu', [ContactController::class, 'sendTestRequest'])->name('test-request.send');
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['tr', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }

    return redirect()->back();
})->name('lang.switch');

// ── ADMIN ─────────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest-only routes
    Route::middleware(RedirectIfAdminAuthenticated::class)->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Authenticated admin routes
    Route::middleware(AdminAuthenticate::class)->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('pages', AdminPageController::class)->except(['show']);
        Route::resource('references', ReferenceController::class)->except(['show']);
        Route::resource('certificates', CertificateController::class)->except(['show']);
        Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

// Dynamic custom pages route (must be last to allow fallback)
Route::get('/{slug}', [FrontendPageController::class, 'show'])->name('page.show');
