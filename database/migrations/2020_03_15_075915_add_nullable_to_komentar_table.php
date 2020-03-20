<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->unsignedBigInteger('pertanyaan_id')->nullable()->change();
            $table->unsignedBigInteger('pertanyaan_user_id')->nullable()->change();
            $table->unsignedBigInteger('jawaban_id')->nullable()->change();
            $table->unsignedBigInteger('jawaban_user_id')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('komentar', function (Blueprint $table) {
            $table->unsignedBigInteger('pertanyaan_id')->change();
            $table->unsignedBigInteger('pertanyaan_user_id')->change();
            $table->unsignedBigInteger('jawaban_id')->change();
            $table->unsignedBigInteger('jawaban_user_id')->change();
        });
    }
}
