<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// 🏠 الصفحة الرئيسية
Route::get('/', fn () => view('welcome'))->name('home');

// 🔐 لوحة التحكم (تتطلب تحقق البريد)
Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// 📚 المقالات المتاحة للجميع
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// 🛡️ المقالات المحمية (إنشاء، تعديل، حذف)
Route::middleware(['auth'])->group(function () {
    // عرض نموذج الإنشاء
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    
    // حفظ article جديد
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    
    // عرض نموذج التعديل
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    
    // تحديث article
    Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    
    // حذف article
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    // التعليقات - إضافة comment جديد
    Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
    
    // حذف comment
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // 👤 إعدادات البروفايل
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 👑 Admin Routes
    Route::post('/admin/users/{user}/toggle-role', [AdminController::class, 'updateUserRole'])->name('admin.users.toggle-role');
});

// ✨ نظام auth من Breeze
require __DIR__.'/auth.php';
