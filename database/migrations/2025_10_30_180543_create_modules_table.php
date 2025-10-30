<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('modules', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->string('icon')->nullable();
        $table->string('route')->nullable();
        $table->foreignId('parent_id')->nullable()->constrained('modules');
        $table->integer('order')->default(0);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });

    Schema::create('module_permission', function (Blueprint $table) {
        $table->foreignId('module_id')->constrained()->onDelete('cascade');
        $table->foreignId('permission_id')->constrained()->onDelete('cascade');
        $table->primary(['module_id', 'permission_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
