<?php
namespace Database\Seeders;
use App\Models\HistoriqueColis;
use Illuminate\Database\Seeder;

class HistoriqueColisSeeder extends Seeder
{
    public function run()
    {
        HistoriqueColis::create([
            'colis_id' => 1, // ID du colis
            'statut' => 'en transit',
            'date_historique' => now(),
            'commentaire' => 'Colis en cours de livraison',
        ]);

        HistoriqueColis::create([
            'colis_id' => 1, // ID du colis
            'statut' => 'livré',
            'date_historique' => now()->addHours(2),
            'commentaire' => 'Colis livré avec succès',
        ]);
    }
}