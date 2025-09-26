<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("blogs", function (Blueprint $table) {
            $table->string("title")->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("blogs", function (Blueprint $table) {
            // gini aja gausah tambah naa colomnya, tapi kita apus nama idexnya aj, krn defaultnya itu kalo kita punya unique itu
            // format namanya gini
            $table->dropUnique('blogs_title_unique');
        });
    }
};
