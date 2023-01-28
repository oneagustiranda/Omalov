<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('user_identities', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());;
            $table->foreignUuid('user_id');
            $table->string('gender');
            $table->foreignId('marital_status_id');
            $table->string('year_birth');
            $table->string('province');
            $table->string('city');
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
        Schema::connection('mysql')->dropIfExists('user_identities');
    }
};
