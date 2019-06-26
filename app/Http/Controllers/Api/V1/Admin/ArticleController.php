<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Api\Article;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \JWTAuth;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all
        $articles = Article::with('author')->with('categories')->searchKeyword(Input::get('keyword'))->getByAuthor(Input::get('author'))->latest()->paginate(10);
        return response(['articles' => $articles], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:190',
            'content' => 'required',
            'slug' => 'nullable',
            'published_at' => 'nullable|date',
            'categories' => 'nullable|string'
        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }

        //create new articles
        $article = new Article($validator->validate());
        $article->author_id = JWTAuth::user()->id;
        $article->save();

        //update the article_category_table
        $categories = explode(',', $request->get('categories'));
        if (is_array($categories) && count($categories) > 0) {
            foreach ($categories as $categoryId) {
                $article->categories()->attach($categoryId);
            }
        }
        return response(['message' => "create success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->with('author')->with('categories')->get();
        if (is_null($article)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['article' => $article], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if(!$article->isTheAuthor(JWTAuth::user()->id)) {
            //if there is not the author then return no permission
            return response(['message' =>'There is only author can edit this resource'], 403);
        }
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:190',
                Rule::unique('articles')->ignore($id)
            ],
            'content' => 'required',
            'slug' => [
                'nullable',
                'string',
                'max:190',
                Rule::unique('articles')->ignore($id)
            ],
            'published_at' => 'nullable|date',
            'categories' => 'nullable|string'
        ]);
        //validate the data
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }
        $updatedData = collect($validator->validate())->filter(function ($value, $key) {
            return $key != 'categories';
        });

        // update
        $result = $article->update($updatedData->toArray());
        if (!$result) {
            return response(['message' => 'Cannot found resource'], 404);
        }


        //update article category table
        if ($request->get('categories')) {

            $categories = explode(',', $request->get('categories'));
            //remove all relationship between this article and categories
            $article->categories()->detach();
            //update the article_category_table
            if (is_array($categories) && count($categories) > 0) {
                foreach ($categories as $categoryId) {
                    $article->categories()->attach($categoryId);
                }
            }
        }

        return response(['message' => "update success "], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $user = JWTAuth::user();
        //in case login-user is mod and article's author is admin then cannot be destroyed
        if($user->hasRole('mod') && !$article->isTheAuthor($user->id)){
            return response(['message' => 'There is only '.$article->author()->first()->name.' can delete resource'], 403);
        }

        //check if the resource can deleted or not
        if (!Article::destroy($id)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['message' => 'detele item success'], 200);
    }
}


