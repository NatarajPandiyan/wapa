<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWapaIdColumnIntoCampaignsDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns_det', function (Blueprint $table) {
                $table->string('wamid')->nullable(); // Add a new nullable string column
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                   Schema::table('campaigns_det', function (Blueprint $table) {
                  $table->dropColumn('wamid');
            });

    }
}
