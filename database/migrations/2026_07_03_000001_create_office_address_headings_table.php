<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('office_address_headings')) {
            Schema::create('office_address_headings', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->text('image')->nullable();
                $table->text('image_attribute')->nullable();
                $table->timestamps();
            });

            DB::table('office_address_headings')->insert([
                'title' => 'Who We Are',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('office_address_headings');
    }
};
