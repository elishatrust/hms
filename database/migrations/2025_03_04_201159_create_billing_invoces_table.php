<?php

use App\Models\DoctorOrder;
use App\Models\Patient;
use App\Models\PatientVisit;
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
        Schema::create('billing_invoces', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->integer('total')->default(0);
            $table->integer('pending_amount')->default(0);
            $table->integer('payment_amount')->default(0);
            $table->tinyInteger('mood')->default(0);
            $table->string('discount_type')->nullable();
            $table->integer('discount_amount')->default(0);
            $table->string('discount_note')->nullable();
            $table->string('note')->nullable();
            $table->string('tax')->default(0);
            $table->string('additional_fee')->nullable();
            $table->foreignIdFor(Patient::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(PatientVisit::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(DoctorOrder::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('billing_invoces');
    }
};
