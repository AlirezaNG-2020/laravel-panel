<?php

use App\Http\Controllers\Admin\Content\CategoryController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('admin.index');
// });


// Admin Routes
Route::prefix('/admin')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');

    // Content Routes
    Route::prefix('/content')->group(function() {
    // Category Routes
        Route::prefix('/category')->group(function() {{
            Route::get('/', [CategoryController::class, 'index'])->name('admin.content.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.content.category.create');
            Route::post('/create/store', [CategoryController::class, 'store'])->name('admin.content.category.store');
            Route::get('/edit', [CategoryController::class, 'edit'])->name('admin.content.category.edit');
            Route::put('/edit/update', [CategoryController::class, 'update'])->name('admin.content.category.update');
            Route::delete('/delete', [CategoryController::class, 'destroy'])->name('admin.content.category.delete');

            // Route::resource('dd', CategoryController::class);

            
            Route::get('/change-status/{category}', [CategoryController::class, 'changeStatus'])->name('admin.content.category.change-status');

        }});


// روش اول:
        Route::prefix('/post')->group(function() {{
            Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');

        }});


// روش دوم:
        // Route::resource('post', PostController::class);
    });


    // Post Routes
    Route::prefix('/content')->group(function() {
        //
    });

});



// Auth Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
