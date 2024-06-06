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
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->id();

            // Ajoute une colonne 'commande_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('commande_id');
            // Définit 'commande_id' comme clé étrangère, liée à la colonne 'id' de la table 'commandes'
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade')->onUpdate('cascade');

            // Ajoute une colonne 'produit_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('produit_id');
            // Définit 'produit_id' comme clé étrangère, liée à la colonne 'id' de la table 'produits'
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime les contraintes de clé étrangère avant de supprimer la table
        Schema::table('commande_produit', function (Blueprint $table) {
            $table->dropForeign(['commande_id']);
            $table->dropForeign(['produit_id']);
        });

        // Supprime la table 'commande_produit'
        Schema::dropIfExists('commande_produit');
    }
};
