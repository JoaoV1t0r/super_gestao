<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Teste',
                'uf' => 'CE',
                'email' => 'fornecedor@teste.com',
                'site' => 'fornecedorteste.com'
            ]);
            $table->foreignId('fornecedor_id')->default($fornecedor_id)->constrained('fornecedores')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('fornecedor_id');
        });
    }
}