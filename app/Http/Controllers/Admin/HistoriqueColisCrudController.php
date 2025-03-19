<?php
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class HistoriqueColisCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\HistoriqueColis::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/historique-colis');
        CRUD::setEntityNameStrings('historique colis', 'historique colis');
    }

    protected function setupListOperation()
    {
        CRUD::column('colis.numero_suivi')->label('Colis');
        CRUD::column('statut')->label('Statut');
        CRUD::column('commentaire')->label('Commentaire');
        CRUD::column('date_historique')->label('Date de l\'événement');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('colis_id')
            ->label('Colis')
            ->type('select2')
            ->entity('colis')
            ->model('App\Models\Colis')
            ->attribute('numero_suivi');
        CRUD::field('statut')
            ->label('Statut')
            ->type('select_from_array')
            ->options([
                'en attente' => 'En attente',
                'en transit' => 'En transit',
                'livré' => 'Livré',
            ]);
        CRUD::field('commentaire')->label('Commentaire')->type('textarea');
        CRUD::field('date_historique')->label('Date de l\'événement')->type('datetime');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
    }
}