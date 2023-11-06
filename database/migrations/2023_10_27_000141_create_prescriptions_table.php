<?php

use App\Models\Disease;
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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(Disease::class)->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('medication_name');
            $table->string('dose_amount');
            $table->string('dose_unit');
            $table->timestamp('date')->nullable();
            $table->integer('each')->nullable();
            $table->timestamp('next_dose')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
