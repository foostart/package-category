<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateCategoriesTable extends FoostartMigration
{
    public function __construct()
    {
        $this->table = 'categories';
        $this->prefix_column = 'category_';
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists($this->table);
        Schema::create($this->table, function (Blueprint $table) {

            $table->increments($this->prefix_column . 'id')->comment('Primary key');

            // Relation
            $table->integer('context_id')->comment('Context ID');

            // Other attributes
            $table->integer($this->prefix_column . 'id_parent')->nullable()->comment('ID of category parent');
            $table->string($this->prefix_column . 'id_parent_str', 1000)->nullable()->comment('List of ids of category parent');
            $table->string($this->prefix_column . 'id_child_str', 1000)->nullable()->comment('List of ids of category child');
            $table->string($this->prefix_column . 'name', 255)->comment('Category name');
            $table->integer($this->prefix_column . 'order')->nullable()->comment('Order in list of categories');
            $table->string($this->prefix_column . 'slug', 1000)->nullable()->comment('Slug in URL');
            $table->string($this->prefix_column . 'url', 1000)->nullable()->comment('Category url');
            $table->string($this->prefix_column . 'icon', 500)->nullable()->comment('Category icon');
            $table->string($this->prefix_column . 'overview', 1000)->nullable()->comment('Category overview');
            $table->text($this->prefix_column . 'description')->comment('Category description');
            $table->string($this->prefix_column . 'image', 255)->nullable()->comment('Image path');

            //Set common columns
            $this->setCommonColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
