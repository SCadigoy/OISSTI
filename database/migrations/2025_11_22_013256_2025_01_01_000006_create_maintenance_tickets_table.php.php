<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('maintenance_tickets', function (Blueprint $table) {
$table->id();
$table->foreignId('room_id')->nullable()->constrained('rooms');
$table->foreignId('reported_by')->nullable()->constrained('users');
$table->string('title');
$table->text('description');
$table->json('photos')->nullable();
$table->foreignId('assigned_to')->nullable()->constrained('users');
$table->enum('status', ['open','in_progress','waiting_parts','closed'])->default('open');
$table->dateTime('sla_due_at')->nullable();
$table->dateTime('closed_at')->nullable();
$table->integer('priority')->default(0);
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('maintenance_tickets');
}
};