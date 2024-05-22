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
        CREATE VIEW `lap_jurnal` AS
        SELECT
            `akun`.`nm_akun` AS `nm_akun`,
            `jurnal`.`tgl_jurnal` AS `tgl`,
            SUM(`jurnal`.`debet`) AS `debet`,
            SUM(`jurnal`.`kredit`) AS `kredit`
        FROM
            `akun`
        JOIN
            `jurnal`
        ON
            `akun`.`no_akun` = `jurnal`.`no_akun`
        GROUP BY
            `akun`.`nm_akun`,
            `jurnal`.`tgl_jurnal`
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
