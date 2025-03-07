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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('created_by')->nullable()->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('manager_id')->nullable()->unsigned();
            $table->foreign('manager_id')->references('id')->on('managers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('building_manager_id')->nullable()->unsigned();
            $table->foreign('building_manager_id')->references('id')->on('managers')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('strata_manager_id')->nullable()->unsigned();
            $table->foreign('strata_manager_id')->references('id')->on('managers')->onDelete('cascade')->onUpdate('cascade');

            $table->string('sp_no')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('lots')->nullable();
            $table->string('total_lots')->nullable();
            $table->string('commercial_lots')->nullable();
            $table->string('amenities')->nullable();
            $table->string('visitors_parking')->nullable();
            $table->string('gymnasium')->nullable();
            $table->string('tennis_court')->nullable();
            $table->string('other')->nullable();
            $table->string('waste_management')->nullable();
            $table->string('resident_garbage')->nullable();
            $table->string('green_waste')->nullable();
            $table->string('spare_keys')->nullable();
            $table->string('registered_keys')->nullable();
            $table->string('lock_out')->nullable();
            $table->string('no_lifts')->nullable();
            $table->string('contractor_keys')->nullable();
            $table->string('hours_keys')->nullable();
            $table->string('gas_meter_location')->nullable();
            $table->string('electricity_meter_location')->nullable();
            $table->string('site_hours')->nullable();


            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('category')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
