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
        Schema::create('jurnal', function (Blueprint $table) {
            $table->string('no_jurnal', 14)->primary();
            $table->text('keterangan');
            $table->date('tgl_jurnal');
            $table->string('no_akun', 5);
            $table->integer('debet');
            $table->integer('kredit');

            // Assuming 'no_akun' references the 'accounts' table
            $table->foreign('no_akun')->references('no_akun')->on('akun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
