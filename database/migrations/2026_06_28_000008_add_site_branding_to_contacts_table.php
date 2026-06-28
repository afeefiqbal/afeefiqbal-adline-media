<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('site_logo')->nullable()->after('contact_image_attribute');
            $table->text('footer_logo')->nullable()->after('site_logo');
            $table->text('favicon')->nullable()->after('footer_logo');
            $table->text('footer_description')->nullable()->after('favicon');
            $table->text('error_page_image')->nullable()->after('footer_description');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['site_logo', 'footer_logo', 'favicon', 'footer_description', 'error_page_image']);
        });
    }
};
