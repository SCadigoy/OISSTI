<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('reservations', function (Blueprint $table) {
$table->id();
$table->foreignId('guest_id')->constrained('guests');
$table->foreignId('room_id')->nullable()->constrained('rooms');
$table->enum('status', ['booked','checked_in','checked_out','cancelled','no_show'])->default('booked');
$table->dateTime('check_in_at');
$table->dateTime('check_out_at');
$table->string('source')->nullable();
$table->boolean('is_vip')->default(false);
$table->foreignId('created_by')->nullable()->constrained('users');
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('reservations');
}
};