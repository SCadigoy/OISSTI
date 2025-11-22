<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('housekeeping_tasks', function (Blueprint $table) {
$table->id();
$table->foreignId('room_id')->constrained('rooms');
$table->integer('priority')->default(0);
$table->enum('reason', ['stayover','checkout','deep_clean','early_checkin','vip']);
$table->foreignId('assigned_to')->nullable()->constrained('users');
$table->dateTime('assigned_at')->nullable();
$table->dateTime('started_at')->nullable();
$table->dateTime('completed_at')->nullable();
$table->enum('status', ['pending','in_progress','completed','skipped'])->default('pending');
$table->text('notes')->nullable();
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('housekeeping_tasks');
}
};