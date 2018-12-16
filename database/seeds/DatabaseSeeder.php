<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// Insert groupes
        for ($i=1; $i <= 20; $i++) { 
        	DB::table('groups')->insert([
        		'name' => 'Group-' . $i, 
        		'type' => 'Type-' . $i 
        	]);
        }

		// Insert users 
        for ($i=1; $i <= 20; $i++) { 
        	DB::table('users')->insert([
		        'name' => 'John Doe ' . $i,
		        'email' => 'john' . $i . '@doe.com',
		        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		        'remember_token' => str_random(10),
        	]);
        }

        // Insert departement & branches
        for ($i=1; $i <= 20; $i++) { 
        	DB::table('departments')->insert([
        		'name' => 'Department' . $i, 
        		'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
        	]);
			
			for ($j=1; $j <= 3; $j++) { 
	        	DB::table('branches')->insert([
	        		'department_id' => $i, 
	        		'user_id' => $i, 
	        		'name' => 'Filière' . $i, 
        			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' 
	        	]);

	        }        	
        }

        for ($j=1; $j <= 20; $j++) { 
            DB::table('modules')->insert([
                'branch_id' => rand(1, 20), 
                'name' => "module - $i", 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
            ]);
        }

        // Insert students
        for ($j=1; $j <= 50; $j++) { 
            DB::table('students')->insert([
                'group_id' => rand(1, 20), 
                'branch_id' => rand(1, 20), 
                'first_name' => 'Taylor ' . $i, 
                'last_name' => 'Atwell ' . $i, 
                'email' => 'taylor' . $i . '@atwell.com', 
                'tel' => '012345679'
            ]);

            // Insert absences
            for ($i=1; $i < 10; $i++) { 
                DB::table('absences')->insert([
                    'type' => "Absence type $i", 
                    'justification' => "Lorem ipsum dolor sit amet. $i", 
                    'nb_hours' => rand(1, 5)                
                ]);

                DB::table('absence_details')->insert([
                    'module_id' => rand(1, 20), 
                    'student_id' => $j, 
                    'absence_id' => $i,                
                    'absence_date' => '2018-12-16 18:24:17',                
                ]);                
            }
        }
    }
}
