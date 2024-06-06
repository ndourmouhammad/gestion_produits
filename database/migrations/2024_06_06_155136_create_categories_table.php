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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->unique();
            $table->mediumText('description')->nullable();
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
        // Supprime la contrainte de clé étrangère 'categories_user_id_foreign' avant de supprimer la colonne 'user_id'
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('categories');
    }
};
