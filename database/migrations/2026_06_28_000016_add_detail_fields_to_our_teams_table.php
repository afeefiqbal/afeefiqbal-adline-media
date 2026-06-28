<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddDetailFieldsToOurTeamsTable extends Migration
{
    public function up()
    {
        if (Schema::hasTable('our_teams')) {
            Schema::table('our_teams', function (Blueprint $table) {
                if (!Schema::hasColumn('our_teams', 'short_url')) {
                    $table->string('short_url')->nullable()->after('designation');
                }
                if (!Schema::hasColumn('our_teams', 'description')) {
                    $table->longText('description')->nullable()->after('short_url');
                }
                if (!Schema::hasColumn('our_teams', 'email')) {
                    $table->string('email')->nullable()->after('description');
                }
                if (!Schema::hasColumn('our_teams', 'phone')) {
                    $table->string('phone')->nullable()->after('email');
                }
                if (!Schema::hasColumn('our_teams', 'experience')) {
                    $table->string('experience')->nullable()->after('phone');
                }
            });

            $teams = DB::table('our_teams')->get();
            foreach ($teams as $team) {
                if (empty($team->short_url)) {
                    $slug = Str::slug($team->title) ?: 'team-member';
                    $baseSlug = $slug;
                    $counter = 1;
                    while (DB::table('our_teams')->where('short_url', $slug)->where('id', '!=', $team->id)->exists()) {
                        $slug = $baseSlug . '-' . $counter;
                        $counter++;
                    }
                    DB::table('our_teams')->where('id', $team->id)->update(['short_url' => $slug]);
                }
            }
        }
    }

    public function down()
    {
        if (Schema::hasTable('our_teams')) {
            Schema::table('our_teams', function (Blueprint $table) {
                foreach (['experience', 'phone', 'email', 'description', 'short_url'] as $column) {
                    if (Schema::hasColumn('our_teams', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
}
