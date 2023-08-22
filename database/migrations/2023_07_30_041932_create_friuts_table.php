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
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('fr_name', 20);
            $table->string('fr_img', 50);
            $table->integer('fr_qty');
            $table->float('fr_old_price');
            $table->float('fr_cur_price');
            $table->boolean('fr_soft_delete')->default(0);
            $table->boolean('fr_availability')->default(1);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friuts');
    }
};
