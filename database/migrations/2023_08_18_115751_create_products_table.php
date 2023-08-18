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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->integer('qty');
            $table->integer('valor');
            $table->integer('fp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Shecma::table('products', function(Blueprint $table){
            $table->id();
            $table->string('name', 70);
            $table->integer('qty');
            $table->float('valor');
            $table->integer('fp');
            $table->timestamps();
        });
    }
};
