<?php

use App\Models\User;
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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('weight');
            $table->string('height');
            $table->string('bmi');
            $table->string('blood_pressure');
            $table->string('blood_sugar');
            $table->timestamp('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};
