<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->text('cta_contact_icon')->nullable()->after('working_hours');
            $table->text('cta_location_icon')->nullable()->after('cta_contact_icon');
            $table->text('cta_working_hours_icon')->nullable()->after('cta_location_icon');
            $table->text('testimonial_quote_icon')->nullable()->after('cta_working_hours_icon');
        });
    }

    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn([
                'cta_contact_icon',
                'cta_location_icon',
                'cta_working_hours_icon',
                'testimonial_quote_icon',
            ]);
        });
    }
};
