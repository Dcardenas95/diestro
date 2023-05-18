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
        Schema::create('informs', function (Blueprint $table) {
            $table->id();
            $table->string('account');
            $table->string('ot');
            $table->string('id_adviser');
            $table->string('name_adviser');
            $table->string('package');
            $table->string('cant_service');
            $table->string('type_network');
            $table->string('divide');
            $table->string('area');
            $table->string('zone');
            $table->string('population');
            $table->string('distrite');
            $table->string('tercero');
            $table->string('point');
            $table->string('rent');
            $table->string('group');
            $table->string('category');
            $table->string('date');
            $table->string('venta');
            $table->string('type_register');
            $table->string('channel');
            $table->string('number_contract');
            $table->string('social_class')->nullable();
            $table->string('package_pg')->nullable();
            $table->string('package_pvd')->nullable();
            $table->string('cod_campaign')->nullable();
            $table->string('multiplay')->nullable();
            $table->string('type_product')->nullable();
            $table->string('area_gv')->nullable();
            $table->string('cod_rate')->nullable();
            $table->float('comision')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informs');
    }
};
