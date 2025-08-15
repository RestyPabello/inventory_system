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
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');

            $table->after('name', function (Blueprint $table) {
                $table->string('brand', 100)->nullable()->after('name');
                $table->text('description')->nullable()->after('brand');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['brand', 'description']);
            $table->foreignId('unit_id')->nullable()->constrained()->after('name');
        });
    }
};
