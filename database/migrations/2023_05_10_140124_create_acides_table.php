<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acides', function (Blueprint $table) {
            $table->id('id_acide');
            $table->string('Ref_bac');
            $table->string('densite');
            $table->string('temperature');
            $table->string('P2O5');
            $table->string('TS');
            $table->string('SO4');
            $table->string('cd');
            $table->string('Mgo');
            $table->string('Zn');
            $table->string('heure');
            $table->string('saiseur');
            $table->unsignedBigInteger('id_produit');
            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
            $table->timestamps();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acides');
    }
};