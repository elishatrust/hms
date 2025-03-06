<?php

use App\Models\MedicineCategory;
use App\Models\MedicineType;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_code')->nullable();
            $table->string('medicine_name')->nullable();
            $table->integer('medicine_price')->default(0);
            $table->integer('medicine_profit')->default(0);
            $table->text('description')->nullable();
            $table->integer('available_qty')->default(0);
            $table->integer('alert_qty')->default(0);
            $table->foreignIdFor(Purchase::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            
            //Status
            $table->unsignedBigInteger('status')->default(0);
            $table->unsignedBigInteger('archive')->default(0);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
