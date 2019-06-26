<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return response(['categories' => $categories], 200);
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
            'name' => 'required|string|unique:categories|min:3',
            'display_name' => 'required|string|unique:categories|min:3'
        ]);

        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }

        //create new articles
        $category = new Category($request->all());
        $category->save();

        return response(['message' => "create success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Api\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            return response(['message' => 'Cannot found resource'], 404);
        }

        return response(['category' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Api\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if(is_null($category)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'min:3',
                Rule::unique('categories')->ignore($id)
            ],
            'display_name' =>  [
                'required',
                'string',
                'min:3',
                Rule::unique('categories')->ignore($id)
            ],
        ]);

        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 400);
        }

        //create new articles
        $result = $category->update($validator->validate());

        if (!$result) {
            return response(['message' => 'Cannot update resource'], 400);
        }
        return response(['message' => "create success"], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Api\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Category::destroy($id)) {
            return response(['message' => 'Cannot found resource'], 404);
        }
        return response(['message' => 'detele item success'], 200);
    }
}
