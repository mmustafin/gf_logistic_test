<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(1);
            $table
                ->foreign('status')
                ->references('id')
                ->on('delivery_statuses')
                ->onUpdate('cascade');
            $table->integer('driver')->nullable();
            $table
                ->foreign('driver')
                ->references('id')
                ->on('drivers')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
