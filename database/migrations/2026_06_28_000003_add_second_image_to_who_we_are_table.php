<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecondImageToWhoWeAreTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('who_we_are')) {
            Schema::table('who_we_are', function (Blueprint $table) {
                if (!Schema::hasColumn('who_we_are', 'image_2')) {
                    $table->text('image_2')->nullable()->after('image');
                }
                if (!Schema::hasColumn('who_we_are', 'image_2_attribute')) {
                    $table->text('image_2_attribute')->nullable()->after('image_2');
                }
            });
        }
    }

    public function down()
    {
        if (Schema::hasTable('who_we_are')) {
            Schema::table('who_we_are', function (Blueprint $table) {
                if (Schema::hasColumn('who_we_are', 'image_2_attribute')) {
                    $table->dropColumn('image_2_attribute');
                }
                if (Schema::hasColumn('who_we_are', 'image_2')) {
                    $table->dropColumn('image_2');
                }
            });
        }
    }
}
