<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up() {
Schema::create('folio_transactions', function (Blueprint $table) {
$table->id();
$table->foreignId('folio_id')->constrained('folios');
$table->enum('type', ['charge','payment','adjustment']);
$table->decimal('amount', 10, 2);
$table->foreignId('posted_by')->nullable()->constrained('users');
$table->dateTime('posted_at');
$table->string('description')->nullable();
$table->json('source_reference')->nullable();
$table->timestamps();
});
}


public function down() {
Schema::dropIfExists('folio_transactions');
}
};