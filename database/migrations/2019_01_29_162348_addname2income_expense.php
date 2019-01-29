<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addname2incomeExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function(Blueprint $table) {
            if (!Schema::hasColumn('amount', 'corrency_id')) {

                $table->string('name')->nullable()->after('id');
                       }

                
        });

        Schema::table('expenses', function(Blueprint $table) {
            if (!Schema::hasColumn('amount', 'corrency_id')) {

                $table->string('name')->nullable()->after('id');
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
