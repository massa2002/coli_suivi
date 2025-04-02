<?php
use App\Http\Controllers\Admin\ColisCrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomLoginController;
Route::get('/', function () {
    return redirect()->route('custom.login.form');
});

Route::get('/administrateur', function () {
    return redirect('/admin');
});

Route::get('/loginVisiteur', [CustomLoginController::class, 'showLoginForm'])->name('custom.login.form');
Route::post('/loginVisiteur', [CustomLoginController::class, 'login'])->name('custom.login');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('custom.logout');

// Route protégée pour le dashboard visiteur
Route::get('/dashboard/visiteur', function () {
    return view('dashboard.visiteur');
})->name('dashboard.visiteur')->middleware('auth');
Route::get('/mes-colis', [ColisCrudController::class, 'showMyColis'])->name('mes.colis');

Route::get('colis/{id}/historique', [ColisCrudController::class, 'showHistorique'])->name('colis.historique');