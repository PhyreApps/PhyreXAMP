<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('virtual_hosts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('document_root')->nullable();
            $table->string('server_name')->nullable();
            $table->string('server_alias')->nullable();
            $table->string('server_admin')->nullable();
            $table->string('error_log')->nullable();
            $table->string('custom_log')->nullable();
            $table->string('php_version')->nullable();
            $table->string('php_ini')->nullable();
            $table->string('ssl_certificate_file')->nullable();
            $table->string('ssl_certificate_key_file')->nullable();
            $table->string('ssl_certificate_chain_file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_hosts');
    }
};
