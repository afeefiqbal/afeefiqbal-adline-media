<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->enum('form_captcha_enabled', ['Yes', 'No'])->default('Yes')->after('error_page_image_attribute');
            $table->enum('form_captcha_type', ['addition', 'subtraction', 'random'])->default('random')->after('form_captcha_enabled');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['form_captcha_enabled', 'form_captcha_type']);
        });
    }
};
