<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Aaran\Aadmin\Src\Customise::hasCommon()) {

            Schema::create('soft_versions', function (Blueprint $table) {
                $table->id();
                $table->string('version');
                $table->string('title')->nullable();
                $table->longText('body')->nullable();
                $table->longText('image')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('soft_versions');
    }
};
