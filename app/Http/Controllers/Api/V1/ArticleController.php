<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArticleCollection;
use App\Http\Resources\V1\ArticleResource;

class ArticleController extends Controller
{
    public function index(){
        return new ArticleCollection(Article::paginate());
    }
    public function show(Article $article){
        return new ArticleResource($article);
    }
    public function create(Request $req){
        $article = Article::create([
            'title' => $req['judul'],
            'content' => $req['isi'],
            'image'=> $req['image'],
        ]);
        return new ArticleResource($article);
    }
    public function edit(Article $article, Request $req){
        $article->update([
            'title' => $req['judul'],
            'content' => $req['isi'],
            'image'=> $req['image'],
        ]);
        return new ArticleResource($article);
    }
    public function delete(Article $article){
        return $article->delete();
    }
}
