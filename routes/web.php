<?php

use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
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

Route::get('/', [HomeController::class, "index"])->name("guest.index");


// Route Admin
Route::prefix("/admin")->middleware(["auth"])->name("admin.")->group(function () {

    Route::get("/projects/trash", [ProjectController::class, "trash"])->name("projects.trash");
    Route::patch("/projects/{project}/restore", [ProjectController::class, "restore"])->name("projects.restore");
    Route::delete("/projects/drop-all", [ProjectController::class, "dropAll"])->name("projects.dropAll");
    Route::delete("/projects/{project}/drop", [ProjectController::class, "drop"])->name("projects.drop");
    Route::resource("projects", ProjectController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
