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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('referral')->nullable()->comment('1=Yes, 2=No');
            $table->string('referred_by')->nullable();
            $table->string('patient_type')->nullable()->comment('1=Inpatient, 2=Outpatient');
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable()->comment('M = Male, F = Female');
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable()->comment('S=Single, M=Married, D=Divorced');
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('country')->nullable();

            // Home details
            $table->string('home_phone')->nullable();
            $table->string('home_address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_address')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_address')->nullable();

            $table->string('next_of_kin_phone')->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->string('next_of_kin_address')->nullable();

            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Specialist::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('patients');
    }
};
