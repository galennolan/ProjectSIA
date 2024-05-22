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
        Schema::create('Pembelian', function (Blueprint $table) {
            $table->string('no_beli', 14)->primary();
            $table->date('tgl_beli');
            $table->string('no_faktur', 14);
            $table->integer('total_beli');
            $table->string('no_pesan', 14);

            // Assuming 'no_pesan' is a foreign key that references the 'orders' table
            $table->foreign('no_pesan')->references('no_pesan')->on('Pemesanan');
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
