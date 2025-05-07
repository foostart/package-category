<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateLocationTable extends FoostartMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createProvinceTable();
        $this->createDistrictTable();
        $this->createWardTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_provinces');
        Schema::dropIfExists('location_districts');
        Schema::dropIfExists('location_wards');
    }

    /**
     * Create location_provinces table
     */
    private function createProvinceTable() {
        Schema::dropIfExists('location_provinces');
        Schema::create('location_provinces', function (Blueprint $table) {
            $table->id('province_id');
            $table->string('province_code', 55)->unique()->comment('Province code');
            $table->string('province_name')->comment('Province name');

            //Set common columns
            $this->setCommonColumns($table);
        });
    }

    /**
     * Create location_districts table
     */
    private function createDistrictTable() {
        Schema::dropIfExists('location_districts');
        Schema::create('location_districts', function (Blueprint $table) {
            $table->id('district_id');
            $table->string('province_code')->comment('Province code');//Index
            $table->string('district_code', 55)->unique()->comment('District code');
            $table->string('district_name')->comment('District name');
            $table->index(['province_code']);
            //Set common columns
            $this->setCommonColumns($table);
        });
    }

    /**
     * Create location_ward table
     */
    private function createWardTable() {
        Schema::dropIfExists('location_wards');
        Schema::create('location_wards', function (Blueprint $table) {
            $table->id('ward_id');
            $table->string('district_code')->comment('District code');//Index
            $table->string('ward_code', 55)->unique()->comment('Ward code');
            $table->string('ward_name')->comment('Ward name');
            $table->index(['district_code']);

            //Set common columns
            $this->setCommonColumns($table);
        });
    }
}
