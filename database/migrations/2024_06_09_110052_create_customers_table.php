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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name', 25);
            $table->text('address');
            $table->unsignedInteger('telp');
            $table->string('email', 20);
            $table->string('location', 20);
            $table->text('maps')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('images', 20);
            $table->date('registration_date');
            $table->string('type', 20);
            $table->float('capacity');
            $table->unsignedInteger('device_id');
            $table->unsignedInteger('province');
            $table->unsignedInteger('regency');
            $table->unsignedInteger('district');
            $table->unsignedInteger('village');
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
