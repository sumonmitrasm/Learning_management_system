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
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('shop_name')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('shop_city')->nullable();
            $table->string('shop_state')->nullable();
            $table->string('shop_country')->nullable();
            $table->string('shop_pincode')->nullable();
            $table->string('shop_mobile')->nullable();
            $table->string('shop_website')->nullable();
            $table->string('shop_email')->nullable();
            $table->string('address_proof')->nullable();
            $table->string('address_proof_image')->nullable();
            $table->string('business_license_number')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors_business_details');
    }
};
