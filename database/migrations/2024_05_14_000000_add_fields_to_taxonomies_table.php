<?php

use Illuminate\Database\Migrations\Migration;
use \Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
        public function up() {
            Schema::table('taxonomies', function (Blueprint $table) {
                $table->string('slug')->after('type');
                $table->text('description')->nullable();
            });
        }

        public function down() {
            Schema::table('taxonomies', function (Blueprint $table) {
                $table->dropColumn(['slug', 'description']);
            });
        }
    };
