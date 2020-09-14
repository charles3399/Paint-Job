<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddSoftdeleteToPaintJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paint_jobs', function (Blueprint $table) {
            $table->softDeletes()->after('is_done');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paint_jobs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
