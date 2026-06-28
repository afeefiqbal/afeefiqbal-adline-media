<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('site_logo_attribute')->nullable()->after('site_logo');
            $table->string('footer_logo_attribute')->nullable()->after('footer_logo');
            $table->string('favicon_attribute')->nullable()->after('favicon');
            $table->string('error_page_image_attribute')->nullable()->after('error_page_image');
        });

        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('cta_contact_icon_attribute')->nullable()->after('cta_contact_icon');
            $table->string('cta_location_icon_attribute')->nullable()->after('cta_location_icon');
            $table->string('cta_working_hours_icon_attribute')->nullable()->after('cta_working_hours_icon');
            $table->string('testimonial_quote_icon_attribute')->nullable()->after('testimonial_quote_icon');
        });

        Schema::table('who_we_are', function (Blueprint $table) {
            $table->string('count_icon_attribute')->nullable()->after('count_icon');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn([
                'site_logo_attribute',
                'footer_logo_attribute',
                'favicon_attribute',
                'error_page_image_attribute',
            ]);
        });

        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn([
                'cta_contact_icon_attribute',
                'cta_location_icon_attribute',
                'cta_working_hours_icon_attribute',
                'testimonial_quote_icon_attribute',
            ]);
        });

        Schema::table('who_we_are', function (Blueprint $table) {
            $table->dropColumn('count_icon_attribute');
        });
    }
};
