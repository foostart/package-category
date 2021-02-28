<?php namespace Foostart\Category\Helpers;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Foostart\Category\Helpers\FoostartDatabaseTrait;

/**
 * Set common fields of all table
 */
class FoostartMigration extends Migration
{
    use FoostartDatabaseTrait;

    /**
     * Set common columns
     * @param Blueprint $table
     */
    public function setCommonColumns(Blueprint &$table) {
        
        //Status
        $table->tinyInteger('status')->nullable()->default(1)->comment('1: show, 0: hide');
        
        //The order item in list of items
        $table->integer('sequence')->nullable()->comment('Input order');
        
        //Add created_user_id and updated_user_id
        $table->integer('created_user_id')->comment('Created by User Id');
        $table->integer('updated_user_id')->comment('Updated by User Id');
        
        //Add deleted_at field
        $table->softDeletes();
        
        //Add created_at and updated_at field
        $table->timestamps();
    }
}