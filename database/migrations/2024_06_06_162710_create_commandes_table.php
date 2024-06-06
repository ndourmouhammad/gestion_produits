<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->integer('montant_total');
            $table->enum('etat_commande', ['valide', 'annule', 'encours']);
            $table->timestamps();

            // Ajoute une colonne 'user_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('user_id');

            // Définit 'user_id' comme clé étrangère, liée à la colonne 'id' de la table 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la contrainte de clé étrangère 'commandes_user_id_foreign' avant de supprimer la colonne 'user_id'
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign('commandes_user_id_foreign');
            $table->dropColumn('user_id');
        });
        
        Schema::dropIfExists('commandes');
    }
};
