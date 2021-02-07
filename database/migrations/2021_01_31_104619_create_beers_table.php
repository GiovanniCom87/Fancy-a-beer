<?php

use App\Models\Beer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    private function getFieldifExists($dict, $field){
        if(array_key_exists($field, $dict)){
            return $dict[$field];
        }
        return null;
    }

    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('style')->nullable();
            $table->decimal('alcohol',4,2)->nullable();
            $table->string('category')->nullable();
            $table->string('brewer')->nullable();
            $table->decimal('lat', 10, 8)->default(0);
            $table->decimal('lon', 11, 8)->default(0);
            $table->string('country')->nullable();
            $table->string('www')->nullable();
            $table->timestamps();
        });

    // recupero il file json dalla directory seeds dove l'ho inserito (tra le cartelle del progetto)     
        $path = database_path('seeds/open-beer-database.json');
    // riempio la variabile beers con il contenuto del json salvato in path e lo decodifico perchè sia leggibile al php
        $beers = json_decode(file_get_contents($path), true);
    //Istanzio direttamente nel model Beer(quindi nella tabella beer) i campi desiderati sfruttando la funzione che ho creato prima per permettere alla compilazione din skippare i campi vuoti 
        foreach($beers as $beer){
    //fields è un campo del json che ora ho salvato in beers, che contiene i dati delle singole birre. Guarda il json se vuoi capire meglio 
            $fields = $beer['fields'];
            $b = new Beer();
            $b->name = $this->getFieldIfExists($fields, 'name');
            $b->description = $this->getFieldIfExists($fields, 'descript');
            $b->style = $this->getFieldIfExists($fields, 'style_name');
            $b->alcohol = $this->getFieldIfExists($fields, 'abv');
            $b->category = $this->getFieldIfExists($fields, 'cat_name');
            $b->brewer = $this->getFieldIfExists($fields, 'name_breweries');
            $b->country = $this->getFieldIfExists($fields, 'country');
            $b->www = $this->getFieldIfExists($fields, 'website');
            $coordinates =  $this->getFieldIfExists($fields, 'coordinates');
            if($coordinates){
                $b->lat = $coordinates[0];
                $b->lon = $coordinates[1];
            }
            $b->save();
        }

    }
    

 
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
