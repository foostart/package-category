<?php namespace Foostart\Category\Helpers;

trait FoostartDatabaseTrait {
    
    /**
     * Table name
     * @var String
     */
    protected $table = '';
    
    /**
     * Prefix table
     * @var String 
     */
    protected $prefix_table = '';
    
    /**
     * Prefix column in table
     * @var type 
     */
    protected $prefix_column = '';
    
    /**
     * Prefix column of contexts table
     */
    protected $prefix_context = 'context_';
            
}