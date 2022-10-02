<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    private static $order = 0;
    public function definition()
    {
        $user = User::all()->toArray();
        $category = Category::all();
        $req = Http::get('https://api-berita-indonesia.vercel.app/antara/dunia/')['data']['posts'];
        return [
            'title'=> $req[self::$order++]['title'],
            'content'=> $this->faker->paragraph(3),
            'image'=>$req[self::$order++]['thumbnail'],
            'user_id'=> $user[random_int(0,count($user)-1)]['id'],
            'category_id'=>$category[random_int(0,count($category)-1)]['id'],
        ];
    }
}
