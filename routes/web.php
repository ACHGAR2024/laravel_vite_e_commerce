<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdresseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/dashboard_client', function () {
        return view('dashboard_client');
    })->middleware(['auth', 'verified'])->name('dashboard_client');
    

Route::get('/dashboard_admin', function () {
    return view('dashboard_client');
})->middleware(['auth', 'verified'])->name('dashboard_admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



// Routes des adresses (utilisation de Route::resource pour générer les routes CRUD)
Route::resource('adresses', AdresseController::class);

Route::resource('categories', CategorieController::class);

Route::resource('produits', ProduitController::class);

Route::get('produits/{produit}/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::post('produits/{produit}/photos', [PhotoController::class, 'store'])->name('photos.store');
Route::delete('produits/{produit}/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/updateInfo', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::patch('/profile/imageUpdate', [ProfileController::class, 'imageUpdate'])->name('profile.imageUpdate');
    Route::get('/profile/listeUsers', [ProfileController::class, 'listeUsers'])->name('profile.listeUsers');
    Route::delete('/profile/supprimer/{id}', [ProfileController::class, 'supprimer'])->name('profile.supprimer');
 // le middleware 'admin' est appliqué ici si nécessaire


   

   //Route::get('/adresses', [AdresseController::class, 'index'])->name('adresses.index');
    //Route::get('/adresses/create', [AdresseController::class, 'create'])->name('adresses.create');
   // Route::get('/adresses/{id}/edit', [AdresseController::class, 'edit'])->name('adresses.edit');
    //Route::patch('/adresses/{id}', [AdresseController::class, 'update'])->name('adresses.update');
    //Route::delete('/adresses/{id}', [AdresseController::class, 'destroy'])->name('adresses.destroy');
    //Route::post('/adresses', [AdresseController::class, 'store'])->name('adresses.store');

    


});

    


require __DIR__.'/auth.php';
