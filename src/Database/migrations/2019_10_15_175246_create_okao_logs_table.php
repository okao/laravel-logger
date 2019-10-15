<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOkaoLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('okao_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('full_url')->nullable();
            $table->text('method')->nullable();
            $table->text('ip_address')->nullable();
            $table->text('response_time')->nullable();
            $table->text('date')->nullable();
            $table->text('input')->nullable();
            $table->text('output')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('okao_logs');
    }
}
