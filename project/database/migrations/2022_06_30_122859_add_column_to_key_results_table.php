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
        Schema::table('key_results', function (Blueprint $table) {
            $table->foreign('objective_id')
                ->references('id')
                ->on('objective')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('key_results', function (Blueprint $table) {
            $table->dropForeign('key_results_objective_id_foreign');
        });
    }
};
