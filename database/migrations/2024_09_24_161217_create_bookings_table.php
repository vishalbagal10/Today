<?php
// database/migrations/xxxx_xx_xx_create_bookings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seat_id'); // Foreign key for seats
            $table->string('customer_name');
            $table->timestamps();

            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
