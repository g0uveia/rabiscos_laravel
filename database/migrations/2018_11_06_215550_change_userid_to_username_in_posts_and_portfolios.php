<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUseridToUsernameInPostsAndPortfolios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function ($table)
        {
            $table->dropColumn('user_id');
            $table->string('user_username');
        });
        Schema::table('portfolios', function ($table)
        {
            $table->dropColumn('user_id');
            $table->string('user_username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function ($table)
        {
            $table->dropColumn('user_username');
            $table->int('user_id');
        });
        Schema::table('portfolios', function ($table)
        {
            $table->dropColumn('user_username');
            $table->int('user_id');
        });
    }
}
