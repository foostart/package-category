<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Foostart\Category\Helpers\FoostartMigration;

class CreateContextsTable extends FoostartMigration
{
    public function __construct()
    {
        $this->table = 'contexts';
        $this->prefix_column = 'context_';
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

            // Other attributes
            $table->string($this->prefix_column . 'name', 255)->comment('Context name');
            $table->string($this->prefix_column . 'ref', 255)->comment('Context references');
            $table->string($this->prefix_column . 'key', 255)->comment('Context key');
            $table->string($this->prefix_column . 'slug', 1000)->nullable()->comment('Context slug');
            $table->string($this->prefix_column . 'notes', 1000)->nullable()->comment('Category overview');

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
