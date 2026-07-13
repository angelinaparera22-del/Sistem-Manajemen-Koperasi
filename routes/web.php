<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::post('/switch-user', [LoginController::class, 'switchUser'])->name('login.switch_user');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/show', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');

    Route::get('/report', [\App\Http\Controllers\ReportController::class, 'index'])->name('report.index')->middleware('role:Superadmin,Admin');
    Route::get('/report/export-pdf', [\App\Http\Controllers\ReportController::class, 'exportPdf'])->name('report.export_pdf')->middleware('role:Superadmin,Admin');

    Route::get('/shu', [\App\Http\Controllers\ShuController::class, 'index'])->name('shu.index')->middleware('role:Superadmin,Admin');
    Route::post('/shu/calculate', [\App\Http\Controllers\ShuController::class, 'calculate'])->name('shu.calculate')->middleware('role:Superadmin,Admin');

    Route::resource('/cash-journal', \App\Http\Controllers\CashJournalController::class)->middleware('role:Superadmin,Admin');
    Route::resource('/installment', \App\Http\Controllers\InstallmentController::class)->middleware('role:Superadmin,Admin');

    Route::get('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
    
    Route::resource('/loan', \App\Http\Controllers\LoanController::class)->middleware('role:Superadmin,Admin');
    Route::resource('/saving', \App\Http\Controllers\SavingController::class)->middleware('role:Superadmin,Admin');
    Route::resource('/member', MemberController::class)->middleware('role:Superadmin,Admin');
    Route::resource('/user', UserController::class)->middleware('role:Superadmin');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/setting/{setting}/update', [SettingController::class, 'update'])->name('setting.update');
});
