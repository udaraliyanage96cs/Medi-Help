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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('puid')->nullable(); // puid -> Patient Unique ID
            $table->string('dob');
            $table->string('phone')->nullable();
            $table->string('nic')->nullable();
            $table->string('address')->nullable();
            $table->string('barcode')->nullable();
            $table->string('propic')->nullable()->default('empty.png');
            $table->string('bloodgroup')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('patients');
    }
};
