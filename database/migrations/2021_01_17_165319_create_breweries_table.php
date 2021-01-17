<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreweriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('img');
            $table->boolean('is_accepted')->default(false);
            $table->decimal('lat', 10, 8);
            $table->decimal('lon', 11, 8);
            $table->string('address')->nullable();
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
        Schema::dropIfExists('breweries');
    }
}
