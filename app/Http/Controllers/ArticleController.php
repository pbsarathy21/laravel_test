<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    function createArticle(Request $request) {

        $article = Article::create([
            "title" => $request['title'],
            "description" => $request['description'],
        ]);

        return response([
            "success"=> true,
            "message"=> "article created successfully",
            "article"=> $article
        ]);
    }

    function getAllArticles(Request $request) {

        $articles = Article::paginate(4);

        return ArticleResource::collection($articles);
    }
}
