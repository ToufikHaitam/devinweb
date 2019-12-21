<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeliveryTimesDeliveryTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_time_delivery_date', function (Blueprint $table) {


            $table->unsignedBigInteger('delivery_time_id')->index();
                $table->foreign('delivery_time_id')->references('id')
                    ->on('delivery_times')->onDelete('cascade');

                    $table->unsignedBigInteger('delivery_date_id')->index();
                $table->foreign('delivery_date_id')->references('id')
                    ->on('delivery_dates')->onDelete('cascade');

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
