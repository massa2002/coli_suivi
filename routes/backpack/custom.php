<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColisCrudController;
// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('post', 'PostCrudController');
    Route::crud('colis', 'ColisCrudController');
    Route::crud('destinataire', 'DestinataireCrudController');
    Route::crud('expediteur', 'ExpediteurCrudController');
    Route::crud('historique-colis', 'HistoriqueColisCrudController');
   

Route::get('colis/{id}/historique', [ColisCrudController::class, 'showHistorique'])->name('colis.historique');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */