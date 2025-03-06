<?php

use App\Models\User;
use App\Models\Patient;
use App\Models\PatientVisit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->string('systolic_B_P')->nullable();
            $table->string('diastolic_B_P')->nullable();
            $table->string('temperature')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('bmi')->nullable();
            $table->string('respiratory')->nullable();
            $table->string('heart_rate')->nullable();
            $table->string('urine_output')->nullable();
            $table->string('blood_sugar_f')->nullable();
            $table->string('blood_sugar_r')->nullable();
            $table->string('spo_2')->nullable();
            $table->string('avpu')->nullable();
            $table->string('trauma')->nullable();
            $table->string('mobility')->nullable();
            $table->text('comment')->nullable();
            $table->string('oxygen_supplementary')->nullable();

            $table->foreignIdFor(Patient::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(PatientVisit::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('vitals');
    }
};
