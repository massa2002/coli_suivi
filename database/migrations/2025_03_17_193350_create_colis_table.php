<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    
    return new class extends Migration {
        public function up()
        {
            Schema::create('colis', function (Blueprint $table) {
                $table->id();
                $table->string('numero_suivi')->unique();
                $table->foreignId('expediteur_id')->constrained('expediteurs')->onDelete('cascade');
                $table->foreignId('destinataire_id')->constrained('destinataires')->onDelete('cascade');
                $table->decimal('poids', 8, 2);
                $table->decimal('frais_livraison', 8, 2)->default(0);
                $table->string('statut')->default('en attente');
                $table->date('date_expedition');
                $table->date('date_livraison')->nullable();
                $table->timestamps();
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('colis');
        }
    };
    

