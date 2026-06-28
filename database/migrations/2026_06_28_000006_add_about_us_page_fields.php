<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->text('image_2')->nullable()->after('image_attribute');
            $table->text('image_2_attribute')->nullable()->after('image_2');
            $table->string('mv_section_title')->nullable()->after('count');
            $table->string('mv_section_sub_title')->nullable()->after('mv_section_title');
            $table->text('mv_section_description')->nullable()->after('mv_section_sub_title');
        });
    }

    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'image_2',
                'image_2_attribute',
                'mv_section_title',
                'mv_section_sub_title',
                'mv_section_description',
            ]);
        });
    }
};
