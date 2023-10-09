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
        Schema::table('tuition_payments', function (Blueprint $table) {
            $table->set('done', ['pending','processing', 'completed'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tuition_payments', function (Blueprint $table) {
            $table->set('done', ['pending','processing', 'completed'])->default('pending');
        });
    }
};