<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('rooms', function (Blueprint $table) {
$table->id();
$table->string('number')->unique();
$table->foreignId('room_type_id')->constrained();
$table->enum('status', ['clean','dirty','inspected','out_of_order','occupied'])->default('clean');
$table->unsignedBigInteger('current_reservation_id')->nullable();
$table->string('floor')->nullable();
$table->json('amenities')->nullable();
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('rooms');
}
};