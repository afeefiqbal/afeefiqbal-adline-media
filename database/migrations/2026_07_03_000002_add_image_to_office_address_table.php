<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('office_address')) {
            Schema::table('office_address', function (Blueprint $table) {
                if (!Schema::hasColumn('office_address', 'image')) {
                    $table->text('image')->nullable()->after('address');
                }
                if (!Schema::hasColumn('office_address', 'image_attribute')) {
                    $table->text('image_attribute')->nullable()->after('image');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('office_address')) {
            Schema::table('office_address', function (Blueprint $table) {
                if (Schema::hasColumn('office_address', 'image_attribute')) {
                    $table->dropColumn('image_attribute');
                }
                if (Schema::hasColumn('office_address', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
};
