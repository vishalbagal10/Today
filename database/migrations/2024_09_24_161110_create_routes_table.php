<?php
// database/migrations/xxxx_xx_xx_create_routes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('start_location');
            $table->string('end_location');
            $table->decimal('price_single', 8, 2); // Price for single seat
            $table->decimal('price_double', 8, 2); // Price for double seat
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('routes');
    }
}

