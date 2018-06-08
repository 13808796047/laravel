<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();
        $user = $users->first();
//        获取除了1以外的所有用户
        $followers  = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();
        $user->follow($follower_ids);
        // 除了 1 号用户以外的所有用户都来关注 1 号用户
        foreach ($followers as $follower) {
            $follower->follow($user->id);
        }
    }
}
