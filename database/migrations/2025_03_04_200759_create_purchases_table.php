<?php

use App\Models\MedicineCategory;
use App\Models\MedicineType;
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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('type')->nullable();

            // Medicines
            $table->string('generic_name')->nullable();
            $table->string('unit')->nullable();
            $table->string('strength')->nullable();
            $table->string('shelf')->nullable();

            // Quantity & Price
            $table->unsignedBigInteger('quantity')->default(0);
            $table->string('quantity_type')->nullable();
            $table->integer('price')->nullable();
            $table->date('manufacture_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->text('note')->nullable();
            
            $table->foreignIdFor(MedicineType::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(MedicineCategory::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Supplier::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('purchases');
    }
};
