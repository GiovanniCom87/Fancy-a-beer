<?php

use App\Models\Brewery;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        $path = database_path('seeds/breweries.json');
    
        $breweries = json_decode(file_get_contents($path), true);
    
        foreach($breweries as $brewery){
   
            $b = new Brewery();
            $b->name = $brewery['name'];
            $b->description = $brewery['description'];
            $b->address = $brewery['address'];
            $b->lat = $brewery['lat'];
            $b->lon = $brewery['lon'];
            $b->img = $brewery['img'];
            $b->is_accepted = $brewery['is_accepted'];
            $b->save();
        }
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
