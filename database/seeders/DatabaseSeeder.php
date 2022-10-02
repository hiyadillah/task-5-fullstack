<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User as User;
use App\Models\Article as Article;
use App\Models\Category as Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->toArray();
        $cat = ['Work','Travel','food','coding','disaster','crash'];
        User::factory(10)->create();
        for($i=0;$i<10;$i++){
            Category::create([
                'name'=>$cat[random_int(0,count($cat)-1)],
                'user_id'=> $user[random_int(0,count($user)-1)]['id'],
            ]);
        }
        Article::factory(10)->create();
        
    }
}
