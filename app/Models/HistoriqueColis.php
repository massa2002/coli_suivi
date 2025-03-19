<?php
namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueColis extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'colis_id',
        'statut',
        'commentaire',
        'date_historique',
    ];

    public function colis()
    {
        return $this->belongsTo(Colis::class);
    }
}