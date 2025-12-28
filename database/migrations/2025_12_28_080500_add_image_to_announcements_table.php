<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if column exists to avoid errors if the table was already updated
        if (!Schema::hasColumn('announcements', 'image')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->string('image')->nullable()->after('content');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('announcements', 'image')) {
            Schema::table('announcements', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
};