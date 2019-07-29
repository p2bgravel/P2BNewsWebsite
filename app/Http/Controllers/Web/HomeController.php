<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Api\Article;
use App\Models\Api\Category;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::getByCategory(Input::get('category'))
            ->getByArticleState('published')
            ->getOrderBy(['updated_at', 'desc'])
            ->paginate(30);
        if ($articles->count() > 0) {
            $hot_article = $articles[0];
            $latest_articles = $articles->slice(1, 5);
            $regular_articles = $articles->slice(6);
            if ($articles->count() > 3) {
                $slide_articles = $articles->random(3);
            } else {
                $slide_articles = $articles;
            }

            $categories = Category::all();

            return view('home', [
                'hot_article' => $hot_article,
                'latest_articles' => $latest_articles,
                'regular_articles' => $regular_articles,
                'slide_articles' => $slide_articles,
                'categories' => $categories,
            ]);
        }

        //else empty article
        return view('not-found');

    }
}
