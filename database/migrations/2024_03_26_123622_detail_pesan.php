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
        Schema::create('detail_pesan', function (Blueprint $table) {
            $table->string('no_pesan', 14);
            $table->string('kd_brg', 5);
            $table->integer('qty_pesan');
            $table->integer('subtotal');
            
            $table->primary(['no_pesan', 'kd_brg']);
            $table->foreign('no_pesan')->references('no_pesan')->on('pemesanan');
            // Assuming 'kd_brg' references another table
            // $table->foreign('kd_brg')->references('kd_brg')->on('another_table');
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
