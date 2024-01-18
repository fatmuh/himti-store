<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInoviceNumberOnTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('uniq')->unique()->after('id');
            if (Schema::hasColumn('transactions', 'product_id')) {
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('transactions', 'quantity')) {
                $table->dropColumn('quantity');
            }
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
}
