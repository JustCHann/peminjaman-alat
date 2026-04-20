<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjamen', function (Blueprint $table) {
            $table->enum('status_denda', ['belum_bayar','sudah_bayar'])
                  ->default('belum_bayar')
                  ->after('denda'); // opsional biar rapi
        });
    }

    public function down(): void
    {
        Schema::table('peminjamen', function (Blueprint $table) {
            $table->dropColumn('status_denda');
        });
    }
};