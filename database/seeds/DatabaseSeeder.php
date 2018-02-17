<?php

use Illuminate\Database\Seeder;
use App\test;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*DB::table('users')->insert([
      'name'=>str_random(10),
      'email'=>str_random(10).'@gmail.com',
      'password'=>bcrypt('secret'),


     	]); */
     	//factory(App\User::class,20)->create(); 
     	// factory(App\test::class,20)->create(); 
     	$this->call(TestSeeder::class);
     	
     	
     	    
    }
}
