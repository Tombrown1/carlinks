<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('branch_id');
            $table->integer('customer_id');
            $table->string('pickup_date');
            $table->string('dropoff_date');
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
        Schema::dropIfExists('rentals', function(Blueprint $table){
           $table->dropColumns([
               'vehicle_id',
               'branch_id',
               'customer_id',
               'VIN',
               'available_indicatior',
               'odometer',
               'vehicle_desc'
           ]); 
        });
    }
}
