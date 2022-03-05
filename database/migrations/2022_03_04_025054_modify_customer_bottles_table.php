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
        Schema::table('customer_bottles', function (Blueprint $table) {
            $table->string('bottle_name')->nullable()->change();
            $table->string('amount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_bottles', function (Blueprint $table) {
            $table->string('bottle_name')->nullable(false)->change();
            $table->string('amount')->nullable(false)->change();
        });
    }
};
