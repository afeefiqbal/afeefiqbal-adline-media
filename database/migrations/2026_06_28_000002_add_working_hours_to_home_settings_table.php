<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddWorkingHoursToHomeSettingsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('home_settings') && !Schema::hasColumn('home_settings', 'working_hours')) {
            Schema::table('home_settings', function (Blueprint $table) {
                $table->text('working_hours')->nullable()->after('hero_video');
            });

            DB::table('home_settings')->where('id', 1)->update([
                'working_hours' => "Monday - Friday : 9:00 am to 6:00 pm\nSaturday : 11:00 am to 5pm",
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        if (Schema::hasTable('home_settings') && Schema::hasColumn('home_settings', 'working_hours')) {
            Schema::table('home_settings', function (Blueprint $table) {
                $table->dropColumn('working_hours');
            });
        }
    }
}
