<?php
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Colis;  // <-- Ajout de l'import de la classe Colis
use App\Models\Expediteur;
use App\Models\Destinataire;
class ColisCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Colis::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/colis');
        CRUD::setEntityNameStrings('colis', 'colis');
    }

    protected function setupListOperation()
    {
        // Colonnes à afficher
        CRUD::column('numero_suivi')->label('Numéro de suivi');
        CRUD::column('expediteur.nom')->label('Expéditeur');
        CRUD::column('destinataire.nom')->label('Destinataire');
        CRUD::column('poids')->label('Poids (kg)');
        CRUD::column('frais_livraison')->label('Frais de livraison')->type('number')->suffix(' €');
        CRUD::column('statut')->label('Statut');
        CRUD::column('date_expedition')->label('Date d\'expédition');
        CRUD::column('date_livraison')->label('Date de livraison');

        // Supprimé : CRUD::filter() car il nécessite Backpack PRO

        // Boutons d'action
        CRUD::addButtonFromView('line', 'voir_historique', 'voir_historique', 'end');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('numero_suivi')->label('Numéro de suivi');
    
        CRUD::field('expediteur_id')
            ->label('Expéditeur')
            ->type('select') // Remplacement de select2 par select
            ->entity('expediteur')
            ->model('App\Models\Expediteur')
            ->attribute('nom');
    
        CRUD::field('destinataire_id')
            ->label('Destinataire')
            ->type('select') // Remplacement de select2 par select
            ->entity('destinataire')
            ->model('App\Models\Destinataire')
            ->attribute('nom');
    
        CRUD::field('poids')->label('Poids (kg)')->type('number');
        CRUD::field('frais_livraison')->label('Frais de livraison')->type('number')->prefix('€')->suffix('par colis');
        CRUD::field('statut')
            ->label('Statut')
            ->type('select_from_array')
            ->options([
                'en attente' => 'En attente',
                'en transit' => 'En transit',
                'livré' => 'Livré',
            ]);
    
        CRUD::field('date_expedition')->label('Date d\'expédition')->type('date');
        CRUD::field('date_livraison')->label('Date de livraison')->type('date');
    }
    
    public function showHistorique($id)
    {
        // Récupérer le colis
        $colis = \App\Models\Colis::findOrFail($id);
    
        // Récupérer l'historique du colis
        $historique = $colis->historique;
    
        // Retourner la vue avec les données
        return view('vendor.backpack.crud.historique_colis', compact('colis', 'historique'));
    }
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }

    public function showMyColis()
    {
        // Récupérer l'utilisateur connecté depuis la session
        $user = session('user');
    
        // Vérifier si l'utilisateur est un destinataire de colis
        // Ici on suppose que Destinataire et Expéditeur sont des entités qui ont un champ id
        if ($user && session('role') === 'destinataire') {
            $colis = Colis::where('destinataire_id', $user->id)->get();
        } elseif ($user && session('role') === 'expediteur') {
            // Si l'utilisateur est un expéditeur, récupérer les colis associés à cet expéditeur
            $colis = Colis::where('expediteur_id', $user->id)->get();
        } else {
            return redirect()->route('loginVisiteur')->withErrors(['user' => 'Utilisateur non connecté']);
        }
    
        // Retourner la vue avec les colis
        return view('vendor.backpack.base.colis.mes_colis', compact('colis'));
    }
    
}
