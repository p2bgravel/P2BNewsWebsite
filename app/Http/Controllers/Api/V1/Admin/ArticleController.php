<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\Api\Article;
use App\User;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'published_at' => 'nullable|date'
        ]);
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }

        //create new articles
        $article = new Article($request->all());
        $article->author_id = JWTAuth::user()->id;
        $article->save();

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
        $article = Article::find($id);

        if (is_null($article)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['article' => $article], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:190',
            'content' => 'required',
            'slug' => 'nullable',
            'published_at' => 'nullable|date'
        ]);
        //validate the data
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }

        // update
        $result = Article::where('id', $id)->update($validator->validate());
        if(!$result) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['message' => "update success ".$result], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check if the resource can deleted or not
        if (!Article::destroy($id)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['message' => 'detele item success'], 200);
    }
}


