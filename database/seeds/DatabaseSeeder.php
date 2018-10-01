<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserLevel;
use App\Config;
use App\Account;
use App\AccountType;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->id = 1;
        $user->first_name = 'Admin';
        $user->middle_name = 'Admin';
        $user->last_name = 'Admin';
        $user->name = 'Admin';
        $user->address = '';
        $user->mobile = '';
        $user->level = 1;
        $user->email = 'admin@exactiv.com';
        $user->gender = 'male';
        $user->birth_date = date('Y-m-d');
        $user->password = bcrypt('123456');
        $user->picture = 'no-photo.jpg';
        $user->user_data = [];
        $user->save();

        if(UserLevel::where('id', 1)->count()==0){
            $level = new UserLevel;
            $level->id = 1;
            $level->level_name = 'Administrator';
            $level->description = 'Administrator';
            $level->level_data = [];
            $level->is_active =1;
            $level->save();
        }
    }
}
