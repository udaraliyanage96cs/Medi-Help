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
        Schema::create('recipts', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->text('content');
            $table->string('staff_note')->nullable();
            $table->string('price')->nullable();
            $table->string('patient_id');
            $table->string('user_id');
            $table->string('ticket_id')->nullable();
            $table->string('channel_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('recipts');
    }
};
