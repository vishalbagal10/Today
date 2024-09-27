<?php
// database/migrations/xxxx_xx_xx_create_seats_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsTable extends Migration
{
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id'); 
            $table->string('seat_number');
            $table->enum('seat_type', ['Single', 'Double']); 
            $table->boolean('is_booked')->default(false);
            $table->timestamps();

            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
