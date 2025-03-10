<?php

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
        Schema::create('hospital_settings', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->date('establish')->nullable();
            $table->string('email')->unique();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();

            // Mail Driver Configuration
            $table->string('driver')->nullable();
            $table->string('encryption')->nullable();
            $table->string('host')->nullable();
            $table->string('port')->nullable();
            $table->string('username')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_from_name')->nullable();

            // Invoice Settings Configuration
            $table->string('invoice_prefix')->nullable();
            $table->string('invoice_logo')->nullable();
            $table->string('user_prefix')->nullable();
            $table->string('patient_prefix')->nullable();
            $table->string('invoice_number_mood')->nullable();
            $table->string('invoice_last_number')->nullable();

            //Tax Configuration
            $table->string('taxes')->default(0);
            $table->string('discount')->default(0);
            
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
        Schema::dropIfExists('hospital_settings');
    }
};
