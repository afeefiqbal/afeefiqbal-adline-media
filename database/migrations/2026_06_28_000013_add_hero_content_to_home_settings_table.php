<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('hero_video');
            $table->text('hero_sub_title')->nullable()->after('hero_title');
            $table->string('hero_button_text')->nullable()->after('hero_sub_title');
            $table->string('hero_button_url')->nullable()->after('hero_button_text');
        });

        $banner = DB::table('home_banners')
            ->where('status', 'Active')
            ->orderBy('sort_order')
            ->first();

        if ($banner) {
            DB::table('home_settings')->where('id', 1)->update([
                'hero_title' => $banner->title,
                'hero_sub_title' => $banner->sub_title,
                'hero_button_text' => $banner->button_text,
                'hero_button_url' => $banner->button_url,
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'hero_sub_title', 'hero_button_text', 'hero_button_url']);
        });
    }
};
