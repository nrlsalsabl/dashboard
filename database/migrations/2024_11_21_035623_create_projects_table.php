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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('staff_id'); // Relasi ke Staff (PIC)
            $table->unsignedBigInteger('brand_id'); // Relasi ke Brand
            $table->string('month_year');
            $table->unsignedBigInteger('talent_id'); // Relasi ke Talent
            $table->unsignedBigInteger('agency_id'); // Relasi ke Agency
            $table->unsignedBigInteger('scope_id'); // Relasi ke Scope
            $table->integer('qty'); // Angka 1-100
            $table->decimal('rate_brand', 10, 2); // Rate Brand
            $table->decimal('rate_talent', 10, 2); // Rate Talent
            $table->date('payment_date_talent')->nullable(); // Tanggal pelunasan ke Talent
            $table->date('payment_date_brand')->nullable(); // Tanggal pelunasan dari Brand
            $table->text('description')->nullable(); // Keterangan
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('talent_id')->references('id')->on('talent')->onDelete('cascade');
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->foreign('scope_id')->references('id')->on('scopes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
