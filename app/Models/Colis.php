<?php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'numero_suivi',
        'expediteur_id',
        'destinataire_id',
        'poids',
        'frais_livraison',
        'statut',
        'date_expedition',
        'date_livraison',
    ];

    public function expediteur()
    {
        return $this->belongsTo(Expediteur::class);
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class);
    }

    public function historique()
    {
        return $this->hasMany(HistoriqueColis::class);
    }
}