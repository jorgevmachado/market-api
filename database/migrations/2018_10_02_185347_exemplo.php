<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exemplo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_exemplo', function (Blueprint $table) {
            $table->increments('cd_exemplo');
            $table->string('ds_exemplo', '30 CHAR')->comment('Descrição do Exemplo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_exemplo');
    }
}
