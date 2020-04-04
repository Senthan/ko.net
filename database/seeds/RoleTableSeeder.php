<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if(!(App\Role::where('name', 'Super Admin')->first())) {
    		App\Role::create(['name' => 'Super Admin', 'description' => 'Super Admin' ]);
    	}


        if(!(App\Role::where('name', 'Admin')->first())) {
            App\Role::create(['name' => 'Admin', 'description' => 'Admin Team' ]);
        }


        if(!(App\Role::where('name', 'Operations')->first())) {
            App\Role::create(['name' => 'Operations', 'description' => 'Operations Team' ]);
        }

        if(!(App\Role::where('name', 'Team Lead')->first())) {
            App\Role::create(['name' => 'Team Lead', 'description' => 'Team Lead' ]);
        }

        if(!(App\Role::where('name', 'Guest')->first())) {
            App\Role::create(['name' => 'Guest', 'description' => 'Guest' ]);
        }

        if(!(App\User::where('name', 'SYSADMIN')->first()->roles()->first())) {
            App\User::where('name', 'SYSADMIN')->first()->roles()->attach(1);
        }
    }
}
