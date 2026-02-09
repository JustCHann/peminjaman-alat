<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('alats', function (Blueprint $table) {
                $table->id();
                $table->string('nama_alat');
                $table->string('kode_alat')->unique();
                $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
                $table->integer('stok');
                $table->timestamps();
            });
        }
    };
