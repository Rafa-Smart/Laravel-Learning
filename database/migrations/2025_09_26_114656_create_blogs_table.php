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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            // caranya iu pake colsring lalu enter
            $table->string('title', 100);
            $table->text("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // jadi dia kana mejalankan fungsi ini, ketika kita rollback
        // jadi akan dihapus tablenya ketika tabelnya ketika sudah ada

        // dan dia akan hapus berdasarkan batch yang paling besar (karena yg paling baru)
        Schema::dropIfExists('blogs');
    }
};
