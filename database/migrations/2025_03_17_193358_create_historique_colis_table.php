<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historique_colis', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->foreignId('colis_id')->constrained('colis')->onDelete('cascade'); // Clé étrangère vers `colis`
            $table->string('statut'); // Statut du colis à ce moment-là
            $table->text('commentaire')->nullable(); // Commentaire ou détails supplémentaires
            $table->timestamp('date_historique')->useCurrent(); // Date de l'événement
            $table->timestamps(); // Colonnes `created_at` et `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('historique_colis');
    }
};
