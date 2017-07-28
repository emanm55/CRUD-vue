<?php

use Illuminate\Database\Seeder;
use App\PersonalInfo;
class PersonalInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	PersonalInfo::create([
    		'first_name' => 'Emmanuel',
    		'last_name'	 => 'Mendiola'
    	]);    
    }
}
