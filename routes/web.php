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
use App\Http\Controllers\StatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\ProductJaimeController;
use App\Http\Controllers\Home_col_compController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('home');
});



Route::get('/en_savoir_plus', function () {
    return view('en_savoir_plus');
});

Route::get('/home_col_comp', [Home_col_compController::class, 'index'])->name('home_col_comp');

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/achat', [ProduitController::class, 'achat'])->name('achat');


Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


// ROUTES PANIER
Route::get('panier', [PanierController::class, 'index'])->name('panier.index');
Route::post('panier/ajouter', [PanierController::class, 'add'])->name('panier.add');
Route::patch('panier/mettre-a-jour', [PanierController::class, 'update'])->name('panier.update');
Route::delete('panier/supprimer', [PanierController::class, 'remove'])->name('panier.remove');
Route::post('/panier/ajouter/{produit}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');

Route::post('/panier/promo', [PanierController::class, 'applyPromo'])->name('panier.applyPromo');


// routes pour les jaime
Route::post('/produit/{produit}/jaime', [ProductJaimeController::class, 'jaime'])->name('produit.jaime');
Route::post('/produit/{produit}/dislike', [ProductJaimeController::class, 'dislike'])->name('produit.dislike');
Route::get('/mes_favoris', [ProductJaimeController::class, 'likedProducts'])->name('produits.aimés');


// Routes pour l'avis
Route::get('avis/create/{produitId}', [AvisController::class, 'create'])->name('avis.create.form');
Route::post('avis/store/{produitId}', [AvisController::class, 'store'])->name('avis.store.product');
Route::resource('avis', AvisController::class)->except(['store']);



Route::resource('produits', ProduitController::class);


// AUTORISATION (utilisation de Route   Après connexion ////

Route::middleware('auth')->group(function () {

            
    Route::post('/utilisateur/{id}/bannir', [UserController::class, 'bannir'])->name('utilisateur.bannir');


            

            // routes pour les campagnes
            Route::resource('campaigns', CampaignController::class);
            // routes pour les collections
            Route::resource('collections', CollectionController::class);

      
            // les statistiques 
            Route::get('/stats', [StatController::class, 'index'])->name('stats.index');

            Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');

            
             

            
            Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');

            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

            Route::get('checkout/adresse', [CheckoutController::class, 'showAddressForm'])->name('checkout.address');
            Route::post('checkout/adresse', [CheckoutController::class, 'storeAddress'])->name('checkout.address.store');
            Route::get('checkout/livraison', [CheckoutController::class, 'showShippingForm'])->name('checkout.shipping');
            Route::post('checkout/livraison', [CheckoutController::class, 'storeShipping'])->name('checkout.shipping.store');
            Route::get('checkout/paiement', [CheckoutController::class, 'showPaymentForm'])->name('checkout.payment');
            Route::post('checkout/paiement', [CheckoutController::class, 'storePayment'])->name('checkout.payment.store');

            // imprimer une commande
            Route::get('/commandes/{id}/facture', [CommandeController::class, 'facture'])->name('commandes.facture');

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

            

            Route::get('produits/{produit}/photos', [PhotoController::class, 'index'])->name('photos.index');
            Route::post('produits/{produit}/photos', [PhotoController::class, 'store'])->name('photos.store');
            Route::delete('produits/{produit}/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

            Route::resource('promos', PromoController::class);


            Route::resource('commandes', CommandeController::class);


            // ROUTES profile

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::patch('/profile/updateInfo', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
            Route::patch('/profile/imageUpdate', [ProfileController::class, 'imageUpdate'])->name('profile.imageUpdate');
            Route::get('/profile/listeUsers', [ProfileController::class, 'listeUsers'])->name('profile.listeUsers');
            Route::delete('/profile/supprimer/{id}', [ProfileController::class, 'supprimer'])->name('profile.supprimer');



});

    


require __DIR__.'/auth.php';