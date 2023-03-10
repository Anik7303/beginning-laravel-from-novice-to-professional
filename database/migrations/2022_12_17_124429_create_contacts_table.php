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
        Schema::create('contacts', function (Blueprint $table) {
            // for laravel 6 or below
            // $table->bigIncrements('id');
            // for laravel 7 or above
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('address');

            // for laravel 6 or below
            // $table->unsignedBigInteger('company_id');
            // $table->bigInteger('company_id', unsigned: true);
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // for laravel 7 and above
            $table->foreignId('company_id')->constrained()->onDelete('cascade');

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
        Schema::dropIfExists('contacts');
    }
};