<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddImageToWhyChooseHeadingsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('why_choose_headings')) {
            Schema::table('why_choose_headings', function (Blueprint $table) {
                if (!Schema::hasColumn('why_choose_headings', 'image')) {
                    $table->text('image')->nullable()->after('description');
                }
                if (!Schema::hasColumn('why_choose_headings', 'image_attribute')) {
                    $table->text('image_attribute')->nullable()->after('image');
                }
            });

            $whatWeDo = DB::table('what_we_do')->first();
            if ($whatWeDo && !empty($whatWeDo->image)) {
                DB::table('why_choose_headings')->update([
                    'image' => $whatWeDo->image,
                    'image_attribute' => $whatWeDo->image_attribute ?? '',
                ]);
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable('why_choose_headings')) {
            Schema::table('why_choose_headings', function (Blueprint $table) {
                if (Schema::hasColumn('why_choose_headings', 'image_attribute')) {
                    $table->dropColumn('image_attribute');
                }
                if (Schema::hasColumn('why_choose_headings', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
}
