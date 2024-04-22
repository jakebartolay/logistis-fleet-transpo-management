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
        Schema::create('lms_g43_sched', function (Blueprint $table) {
            $table->id();
            $table->string('route_name');
            $table->string('status');
            $table->integer('order_id');
            $table->string('contact_person');
            $table->text('shipping_address');
            $table->string('vehicle_type');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lms_g43_sched');
    }
};
