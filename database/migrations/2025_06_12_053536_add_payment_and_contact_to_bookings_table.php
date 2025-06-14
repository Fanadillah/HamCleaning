<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
        $table->string('address')->nullable()->after('booking_date');
        $table->string('phone')->nullable()->after('address');
        $table->string('payment_proof')->nullable()->after('status');
        $table->string('payment_status')->default('pending')->after('payment_proof'); // pending, paid, rejected
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['address', 'phone', 'payment_proof', 'payment_status']);
        });
    }
};
