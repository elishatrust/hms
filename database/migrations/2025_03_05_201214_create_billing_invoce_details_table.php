<?php

use App\Models\BillingInvoce;
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
        Schema::create('billing_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->integer('item_amount')->default(0);
            $table->string('item_total_amount')->nullable();
            $table->foreignIdFor(BillingInvoce::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('billing_invoce_details');
    }
};
