<?php

    use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    {
        public function up() {
            Schema::create('taxonomies', function (\Illuminate\Database\Schema\Blueprint $table)
            {
                $table->uuid('id')->primary();
                $table->enum('type', ['tag', 'category'])->default('tag');
                $table->string('title');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        public function down() {
            Schema::dropIfExists('taxonomies');
        }
    };