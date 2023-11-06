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
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('routine_name');
            $table->string('routine_description');
            $table->string('routine_duration');
            $table->string('routine_type');
            $table->string('recommended_weight');
            $table->string('recommended_BMI');
            $table->string('recommended_blood_pressure');
            $table->string('recommended_blood_sugar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routines');
    }
};
