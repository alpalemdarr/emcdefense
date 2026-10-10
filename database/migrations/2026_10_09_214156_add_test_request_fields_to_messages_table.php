<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('device_name')->nullable()->after('subject');
            $table->string('brand_model')->nullable()->after('device_name');
            $table->string('voltage')->nullable()->after('brand_model');
            $table->string('current')->nullable()->after('voltage');
            $table->string('product_standard')->nullable()->after('current');
            $table->string('usage_area')->nullable()->after('product_standard');
            $table->string('operation_mode')->nullable()->after('usage_area');
            $table->string('electronic_circuit')->nullable()->after('operation_mode');
            $table->string('power_type')->nullable()->after('electronic_circuit');
            $table->string('connectors')->nullable()->after('power_type');
            $table->string('dimensions')->nullable()->after('connectors');
            $table->text('device_description')->nullable()->after('dimensions');
            $table->string('attachment')->nullable()->after('device_description');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn([
                'device_name',
                'brand_model',
                'voltage',
                'current',
                'product_standard',
                'usage_area',
                'operation_mode',
                'electronic_circuit',
                'power_type',
                'connectors',
                'dimensions',
                'device_description',
                'attachment',
            ]);
        });
    }
};
