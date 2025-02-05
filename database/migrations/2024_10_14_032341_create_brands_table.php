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
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 125); 
            $table->string('image', 225)->nullable();
            $table->tinyInteger('publish')->default(2); 
            $table->text('description')->nullable(); 
            $table->timestamp('deleted_at')->nullable(); 
            $table->string('slug', 225)->nullable()->unique();
            $table->timestamps(); 
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
