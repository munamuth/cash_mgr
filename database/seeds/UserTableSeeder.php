<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name =  "User Admin";
        $user->email =  "admin";
        $user->password =  bcrypt("admin");
        $user->save();
    }
}
