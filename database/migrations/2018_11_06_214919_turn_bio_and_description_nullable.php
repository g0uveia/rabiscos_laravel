<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TurnBioAndDescriptionNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table)
        {
            $table->mediumText('bio')->nullable()->change();
        });
        Schema::table('portfolios', function ($table)
        {
            $table->mediumText('descricao')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table)
        {
            $table->mediumText('bio')->nullable(false)->change();
        });
        Schema::table('portfolios', function ($table)
        {
            $table->mediumText('descricao')->nullable(false)->change();
        });
    }
}
