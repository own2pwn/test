<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Auto\Auto;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auto_id', 11);
            $table->integer('user_id')->unsigned();
            $table->integer('mark_id')->unsigned();
            $table->integer('model_category_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('body_id')->unsigned();
            $table->integer('transmission_id')->unsigned();
            $table->integer('rudder_id')->unsigned();
            $table->integer('color_id')->unsigned();
            $table->integer('interior_color_id')->unsigned();
            $table->integer('engine_id')->unsigned();
            $table->integer('cylinder_id')->unsigned();
            $table->integer('train_id')->unsigned();
            $table->integer('door_id')->unsigned();
            $table->integer('wheel_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->string('tuning');
            $table->smallInteger('year')->unsigned();
            $table->integer('mileage')->unsigned();
            $table->enum('mileage_measurement', [Auto::MILEAGE_MEASUREMENT_KM, Auto::MILEAGE_MEASUREMENT_MILE]);
            $table->tinyInteger('volume_1')->unsigned();
            $table->tinyInteger('volume_2')->unsigned();
            $table->smallInteger('horsepower')->unsigned();
            $table->string('place');
            $table->integer('price_amd')->unsigned();
            $table->integer('price_usd')->unsigned();
            $table->integer('price_eur')->unsigned();
            $table->enum('contract', [Auto::NOT_CONTRACT, Auto::CONTRACT]);
            $table->enum('auction', [Auto::NOT_AUCTION, Auto::AUCTION]);
            $table->enum('bank', [Auto::NOT_BANK, Auto::BANK]);
            $table->enum('exchange', [Auto::NOT_EXCHANGE, Auto::EXCHANGE]);
            $table->enum('partial_pay', [Auto::NOT_PARTIAL_PAY, Auto::PARTIAL_PAY]);
            $table->enum('custom_cleared', [Auto::NOT_CUSTOM_CLEARED, Auto::CUSTOM_CLEARED]);
            $table->enum('damaged', [Auto::NOT_DAMAGED, Auto::DAMAGED]);
            $table->string('vin');
            $table->text('description');
            $table->string('additional_phone', 30);
            $table->date('term');
            $table->timestamps();
            $table->enum('status', [Auto::STATUS_PENDING, Auto::STATUS_APPROVED, Auto::STATUS_BLOCKED]);
            $table->enum('show_status', [Auto::STATUS_ACTIVE, Auto::STATUS_DELETED]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autos');
    }
}
