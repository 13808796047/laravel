<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(\App\Models\User::class)->times(50)->make();
        \App\Models\User::insert($users->makeVisible(['password', 'remember_token'])->toArray());
        $user = \App\Models\User::find(1);
        $user->name = 'admin';
        $user->email = 'admin@qq.com';
        $user->is_admin = true;
        $user->password = bcrypt('admin888');
        $user->activated = true;
        $user->save();
    }
}
