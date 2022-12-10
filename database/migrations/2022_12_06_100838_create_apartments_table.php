<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('apartment_slug')->unique()->nullable(false);
            $table->string('apartment_title', 255)->nullable(false);
            $table->text('description')->nullable(false);
            $table->tinyInteger('bedrooms')->nullable(false)->default(0);
            $table->tinyInteger('bed')->nullable()->default();
            $table->tinyInteger('bathrooms')->nullable()->default();
            $table->decimal('sqm',5,2)->nullable()->default(0);
            $table->string('category', 255)->nullable()->default();
            $table->decimal('price', 8,2)->nullable()->default(0);
            $table->string('apartment_images',255)->nullable();
            $table->string('address',255)->nullable();
            $table->tinyInteger('civic_number')->nullable();
            $table->string('countrySubdivision',255)->nullable();
            $table->string('postalCode',5)->nullable();
            $table->string('city',255)->nullable();
            $table->decimal('latitude',12,10)->nullable(false)->default(0);
            $table->decimal('longitude',12,10)->nullable(false)->default(0);
            $table->boolean('visible')->nullable()->default(true);
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
        Schema::dropIfExists('apartments');
    }
}
