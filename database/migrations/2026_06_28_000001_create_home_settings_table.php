<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateHomeSettingsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('home_settings')) {
            Schema::create('home_settings', function (Blueprint $table) {
                $table->id();
                $table->string('hero_video')->nullable();
                $table->timestamps();
            });

            DB::table('home_settings')->insert([
                'hero_video' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('home_settings');
    }
}
