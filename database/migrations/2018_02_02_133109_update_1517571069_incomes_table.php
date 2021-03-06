<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1517571069IncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            if(! Schema::hasColumn('incomes', 'deleted_at')) {
                $table->softDeletes();
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
        Schema::table('incomes', function (Blueprint $table) {
            if(Schema::hasColumn('incomes', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            
        });

    }
}
