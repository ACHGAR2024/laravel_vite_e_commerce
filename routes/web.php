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
use App\Http\Controllers\PromoController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/achat', [ProduitController::class, 'achat'])->name('achat');



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

Route::resource('promos', PromoController::class);


Route::resource('commandes', CommandeController::class);

Route::get('panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('panier/ajouter', [PanierController::class, 'add'])->name('panier.add');
Route::patch('panier/mettre-a-jour', [PanierController::class, 'update'])->name('panier.update');
Route::delete('panier/supprimer', [PanierController::class, 'remove'])->name('panier.remove');

Route::post('/panier/ajouter/{produit}', [PanierController::class, 'ajouter'])->name('panier.ajouter');




Route::get('checkout/adresse', [CheckoutController::class, 'showAddressForm'])->name('checkout.address');
Route::post('checkout/adresse', [CheckoutController::class, 'storeAddress'])->name('checkout.address.store');
Route::get('checkout/livraison', [CheckoutController::class, 'showShippingForm'])->name('checkout.shipping');
Route::post('checkout/livraison', [CheckoutController::class, 'storeShipping'])->name('checkout.shipping.store');
Route::get('checkout/paiement', [CheckoutController::class, 'showPaymentForm'])->name('checkout.payment');
Route::post('checkout/paiement', [CheckoutController::class, 'storePayment'])->name('checkout.payment.store');

// Exemple de routes pour les différentes pages
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

// imprimer une commande
Route::get('/commandes/{id}/facture', [CommandeController::class, 'facture'])->name('commandes.facture');






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
