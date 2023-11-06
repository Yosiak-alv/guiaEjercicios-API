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
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->decimal('bmi', 5, 2);
            $table->decimal('blood_pressure', 5, 2);
            $table->decimal('blood_sugar', 5, 2);
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
