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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_option')->nullable();
            $table->string('coupon_code')->nullable();
            $table->text('categories')->nullable();
            $table->text('users')->nullable();
            $table->string('coupon_type')->nullable();
            $table->string('amount_type')->nullable();
            $table->float('amount')->nullable();
            $table->date('expiry_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
