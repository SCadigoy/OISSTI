<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('feedback', function (Blueprint $table) {
$table->id();
$table->foreignId('reservation_id')->nullable()->constrained('reservations');
$table->foreignId('guest_id')->nullable()->constrained('guests');
$table->text('content');
$table->enum('category', ['housekeeping','maintenance','service','billing']);
$table->enum('severity', ['info','minor','major']);
$table->string('routed_to_role')->nullable();
$table->boolean('resolved')->default(false);
$table->text('resolution_notes')->nullable();
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('feedback');
}
};