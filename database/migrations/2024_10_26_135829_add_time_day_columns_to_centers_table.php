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
        Schema::table('centers', function (Blueprint $table) {
            //
            $table->string('group_time')->after('group_number')->nullable();
            $table->string('group_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('centers', function (Blueprint $table) {
            //
            $table->dropColumn('group_time');
            $table->dropColumn('group_day');
        });
    }
};
