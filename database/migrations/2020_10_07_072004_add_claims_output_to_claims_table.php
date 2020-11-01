<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClaimsOutputToClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('post_id')->constrained();
            // $table->foreignId('claim_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('claim_id');
        });
    }
}
