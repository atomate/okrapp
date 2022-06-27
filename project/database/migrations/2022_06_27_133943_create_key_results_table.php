<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_results', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->smallInteger('progress');
            $table->unsignedBigInteger('objective_id');
            $table->index('objective_idx');
            $table->foreign('objective_id')->references('id')->on('objective')->cascadeOnDelete();
//            $table->unsignedBigInteger('user_id');
//            $table->index('user_idx');
//            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

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
        Schema::dropIfExists('key_results');
    }
};
