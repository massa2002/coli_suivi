<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFraisLivraisonToColisTable extends Migration
{
    public function up()
    {
        Schema::table('colis', function (Blueprint $table) {
            $table->decimal('frais_livraison', 8, 2)->default(0)->after('poids');
        });
    }

    public function down()
    {
        Schema::table('colis', function (Blueprint $table) {
            $table->dropColumn('frais_livraison');
        });
    }
}