<?php namespace Database\Seeders;

use Foostart\Category\Helpers\FoostartSeeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContextSeeder extends FoostartSeeder
{
    public function __construct()
    {
        // Table name
        $this->table = 'contexts';
        // Prefix column
        $this->prefix_column = 'context_';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table before create sample data
        DB::table($this->table)->truncate();

        $this->userCreateContext();
        $this->postCreateContext();
        $this->slideshowCreateContext();
    }

    private function userCreateContext() {
        //Create context for user/level
        DB::table($this->table)->insert([
            $this->prefix_column . 'name' => 'User level',
            $this->prefix_column . 'key' => md5('user/level'),
            $this->prefix_column . 'ref' => 'user/level',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //Create context for user/level
        DB::table($this->table)->insert([
            $this->prefix_column . 'name' => 'User department',
            $this->prefix_column . 'key' => md5('user/department'),
            $this->prefix_column . 'ref' => 'user/department',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    private function postCreateContext() {
        DB::table($this->table)->insert([
            $this->prefix_context . 'name' => 'Admin posts',
            $this->prefix_context . 'key' => md5('admin/posts'),
            $this->prefix_context . 'ref' => 'admin/posts',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }

    private function slideshowCreateContext() {
        DB::table($this->table)->insert([
            $this->prefix_context . 'name' => 'Admin slideshows',
            $this->prefix_context . 'key' => md5('admin/slideshows'),
            $this->prefix_context . 'ref' => 'admin/slideshows',
            'status' => 99,
            'created_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
