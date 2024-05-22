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
            CREATE VIEW `lap_stok` AS
            SELECT 
                `barang`.`kd_brg` AS `kd_brg`,
                `barang`.`nm_brg` AS `nm_brg`,
                `barang`.`harga` AS `harga`,
                `barang`.`stok` AS `stok`,
                SUM(`detail_pembelian`.`qty_beli`) AS `beli`,
                SUM(`detail_retur`.`qty_retur`) AS `retur`
            FROM 
                `barang`
            JOIN 
                `detail_retur`
            ON 
                `barang`.`kd_brg` = `detail_retur`.`kd_brg`
            JOIN 
                `detail_pembelian`
            ON 
                `barang`.`kd_brg` = `detail_pembelian`.`kd_brg`
            GROUP BY 
                `barang`.`kd_brg`,
                `barang`.`nm_brg`,
                `barang`.`harga`,
                `barang`.`stok`
        ");
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
