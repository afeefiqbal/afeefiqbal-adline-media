<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->text('contact_image')->nullable()->after('contact_form_title');
            $table->string('contact_image_attribute')->nullable()->after('contact_image');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['contact_image', 'contact_image_attribute']);
        });
    }
};
