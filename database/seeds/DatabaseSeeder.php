<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
use Carbon\Carbon;
use App\User;
use App\Thread;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('UsersTableSeeder');
        $this->call('ThreadsTableSeeder');
        $this->call('CommentsTableSeeder');
        Model::reguard();
    }
}
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'laraboard',
            'email' => 'laraboard@sample.com',
            'password' => bcrypt('password'),
        ]);
    }
}
class ThreadsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('threads')->delete();
        $user = User::all()->first();
        $faker = Faker::create('en_US');
        for($i = 0; $i <10; $i++){
            $thread = new Thread([
                'title' => $faker->sentence(),
                'body' => $faker->paragraph(),
                'last_commented' => Carbon::now(),
            ]);
            $user->threads()->save($thread);
        }
    }
}
class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->delete();
        $user = User::all()->first();
        $threads = Thread::all();
        $faker = Faker::create('en_US');
        foreach($threads as $thread){
            for($i = 0; $i <2; $i++){
                Comment::create([
                    'title' => $faker->sentence(),
                    'body' => $faker->paragraph(),
                    'user_id' => $user->id,
                    'thread_id' => $thread->id,
                ]);
            }
        }
    }
}
