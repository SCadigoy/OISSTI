<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('folios', function (Blueprint $table) {
$table->id();
$table->foreignId('reservation_id')->nullable()->constrained('reservations');
$table->foreignId('guest_id')->nullable()->constrained('guests');
$table->decimal('balance', 10, 2)->default(0);
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('folios');
}
};