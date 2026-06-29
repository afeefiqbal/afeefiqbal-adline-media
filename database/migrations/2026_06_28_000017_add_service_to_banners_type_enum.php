<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddServiceToBannersTypeEnum extends Migration
{
    public function up()
    {
        if (Schema::hasTable('banners')) {
            DB::statement("ALTER TABLE `banners` MODIFY `type` ENUM('About','Service','Portfolio','Blog','Contact','Privacy','Terms') NOT NULL DEFAULT 'About'");
        }
    }

    public function down()
    {
        if (Schema::hasTable('banners')) {
            DB::statement("ALTER TABLE `banners` MODIFY `type` ENUM('About','Portfolio','Blog','Contact','Privacy','Terms') NOT NULL DEFAULT 'About'");
        }
    }
}
