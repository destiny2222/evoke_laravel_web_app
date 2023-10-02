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
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->string('visa_website_link')->nullable();
            $table->string('user_password')->nullable();
            $table->string('username')->nullable();
            $table->set('visa_type', ['usa', 'canada', 'uk'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visa_applications', function (Blueprint $table) {
            $table->string('visa_website_link')->nullable();
            $table->string('user_password')->nullable();
            $table->string('username')->nullable();
            $table->set('visa_type', ['usa', 'canada', 'uk'])->nullable();
        });
    }
};
