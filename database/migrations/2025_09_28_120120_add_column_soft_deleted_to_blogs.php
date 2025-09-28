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
        Schema::table('blogs', function (Blueprint $table) {
            $table->softDeletes();
            // ini akan menambahkan kolom deleted_at di tabel blogs
            // kolom ini akan otomatis diisi oleh Laravel ketika kita menghapus data
            // tapi data aslinya tetap ada di database
            // sehingga kita bisa mengembalikan data yang terhapus jika diperlukan
            // fitur ini sangat berguna untuk mencegah kehilangan data secara tidak sengaja
            // dan juga untuk keperluan audit trail
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
        });
    }
};
