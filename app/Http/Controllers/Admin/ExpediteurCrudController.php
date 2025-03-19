<?php
namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ExpediteurCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\Expediteur::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/expediteur');
        CRUD::setEntityNameStrings('expéditeur', 'expéditeurs');
    }

    protected function setupListOperation()
    {
        CRUD::column('nom')->label('Nom');
        CRUD::column('adresse')->label('Adresse');
        CRUD::column('telephone')->label('Téléphone');
    }

    protected function setupCreateOperation()
    {
        CRUD::field('nom')->label('Nom');
        CRUD::field('adresse')->label('Adresse')->type('textarea');
        CRUD::field('telephone')->label('Téléphone');
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