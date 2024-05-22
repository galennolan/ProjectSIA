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
        DB::statement("
            CREATE VIEW `view_temp_pesan` AS
            SELECT 
                `temp_pemesanan`.`kd_brg` AS `kd_brg`,
                CONCAT(`barang`.`nm_brg`, ' ', `barang`.`harga`) AS `nm_brg`,
                `temp_pemesanan`.`qty_pesan` AS `qty_pesan`,
                `barang`.`harga` * `temp_pemesanan`.`qty_pesan` AS `sub_total`
            FROM 
                `temp_pemesanan`
            JOIN 
                `barang` 
            ON 
                `temp_pemesanan`.`kd_brg` = `barang`.`kd_brg`
        ");
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_temp_pesan');
    }
};
