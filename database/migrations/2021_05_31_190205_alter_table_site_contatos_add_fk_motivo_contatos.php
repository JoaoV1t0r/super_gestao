<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
<<<<<<< HEAD
            $table->unsignedBigInteger('motivo_contatos_id');
=======
            $table->unsignedBigInteger(column: 'motivo_contatos_id');
>>>>>>> 45b86fdb8c4d61133796939dd854fb26b6fe9aaf
        });

        DB::statement('update site_contatos set motivo_contatos_id = motivo');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
<<<<<<< HEAD
            $table->dropColumn('motivo');
=======
            $table->dropColumn(columns: 'motivo');
>>>>>>> 45b86fdb8c4d61133796939dd854fb26b6fe9aaf
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
<<<<<<< HEAD
            $table->integer('motivo');
=======
            $table->integer(column: 'motivo');
>>>>>>> 45b86fdb8c4d61133796939dd854fb26b6fe9aaf
            $table->dropForeign('site_contato_motivo_contatos_id_foreing');
        });

        DB::statement('update site_contatos set motivo = motivo_contatos_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
