<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesAdsStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_ads_stats', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('city_name_en')->nullable()->index('city_name_en_index');
            $table->integer('square')->nullable();
            $table->integer('price')->nullable();
            $table->integer('ads_count')->nullable()->index('ads_count_index');
            $table->integer('price_m2')->nullable();
            $table->integer('total')->nullable();
            $table->integer('jews')->nullable();
            $table->integer('ads_per_people_1k')->nullable();
            $table->integer('ads_per_jews_1k')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities_ads_stats');
    }
}
