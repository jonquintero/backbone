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
        Schema::create('city_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('code_id')->nullable()->constrained('codes');
            $table->foreignId('settlement_id')->nullable()->constrained('settlements');
            $table->foreignId('settlement_type_id')->nullable()->constrained('settlement_types');
            $table->foreignId('municipality')->nullable()->constrained('municipalities');
            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('direction_cps_id')->nullable()->constrained('direction_cps');
            $table->foreignId('code_state_id')->nullable()->constrained('code_states');
            $table->foreignId('code_office_id')->nullable()->constrained('code_offices');
            $table->foreignId('code_cps_id')->nullable()->nullable()->constrained('code_cps');
            $table->foreignId('code_settlement_type_id')->nullable()->constrained('code_settlement_types');
            $table->foreignId('code_municipality_id')->nullable()->constrained('code_municipalities');
            $table->foreignId('id_settlement_id')->nullable()->constrained('id_settlements');
            $table->foreignId('type_zone_id')->nullable()->constrained('type_zones');
            $table->foreignId('code_city_id')->nullable()->constrained('code_cities');
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
        Schema::dropIfExists('city_information');
    }
};
