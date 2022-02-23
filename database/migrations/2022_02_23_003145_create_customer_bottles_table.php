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
        Schema::create('customer_bottles', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true);
            $table->string('product_name');
            $table->string('bottle_name');
            $table->string('amount');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            //timestampと書いてしまうと、レコード導入時更新に値が入らないので、DB::rawで直接かいてます。
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            //論理削除を定義→deleted_atを自動生成　
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_bottles');
    }
};
