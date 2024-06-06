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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('designation');
            $table->integer('prix_unitaire');
            $table->string('image');
            $table->enum('etat', ['disponible', 'en_rupture', 'en_stock']);
            $table->timestamps();

            // Ajoute une colonne 'categorie_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('categorie_id');

            // Définit 'categorie_id' comme clé étrangère, liée à la colonne 'id' de la table 'categories'
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Supprime la contrainte de clé étrangère 'produits_categorie_id_foreign' avant de supprimer la colonne 'categorie_id'
         Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign('produits_categorie_id_foreign');
            $table->dropColumn('categorie_id');
        });

        Schema::dropIfExists('produits');
    }
};
