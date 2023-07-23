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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->string('slug');
            $table->string('type')->nullable();
            $table->string('category')->nullable();         
            $table->longText('description')->nullable();  
            $table->longText('disease')->nullable();       
            $table->longText('variety')->nullable();
            $table->longText('sorting')->nullable();
            $table->longText('pod')->nullable();
            $table->longText('plant')->nullable();   
            $table->string('pf_image')->nullable();   

            $table->integer('orginal_price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->integer('quantity')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

 
            $table->foreign('brand_id')->references('id')->on('brands_tabils')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
