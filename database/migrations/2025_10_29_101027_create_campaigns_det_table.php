<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsDetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_det', function (Blueprint $table) {
            $table->id();
            $table->integer('campaign_id');
            $table->integer('customer_id');
            $table->string('mobile_no');
            $table->integer('template_id');
            $table->integer('sent');
            $table->integer('delivered');
            $table->integer('click');
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
        Schema::dropIfExists('campaigns_det');
    }
}
