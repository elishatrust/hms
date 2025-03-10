<?php

use App\Models\RoomType;
use App\Models\Ward;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_no')->nullable();
            $table->string('name')->nullable();
            $table->integer('price')->default(0);
            $table->integer('capacity')->default(0);
            $table->string('image')->nullable();
            //Status
            $table->unsignedBigInteger('status')->default(0);
            $table->unsignedBigInteger('archive')->default(0);
            $table->foreignIdFor(Ward::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(RoomType::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rooms');
    }
};
