<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
           
            
            $table->increments('id');
              
            $table->String("name");
            
            
            
            $table->text("des");
            
            $table->String("Link");
                    
             $table->boolean("publish")->default(1);       
            
            $table->integer("User_id");
            
			$table->String("src");
			
            $table->integer("Category_id");
            
            $table->String("image");
            
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
        Schema::dropIfExists('videos');
    }
}
