<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'admin.posts.index',
            [
                'postsEN' => Post::whereTranslation('anchor', 'anchor_en')->get(),
                'postsRU' => Post::whereTranslation('anchor', 'anchor_ru')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'post'   => [],
            'suggestPosts' => Post::whereTranslation('anchor', 'anchor_en')->get(),
            'suggestProducts' => Product::whereTranslation('anchor', 'anchor_en')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ru'   => 'required',
            'title_en'   => 'required'
        ]);

        if ($request->has('suggestPosts'))
            $sPosts = $request->suggestPosts;
        else
            $sPosts = null;

        if ($request->has('suggestProducts'))
            $sProducts = $request->suggestProducts;
        else
            $sProducts = null;

        Post::add($request->all(), $sPosts, $sProducts);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view(
            'admin.posts.edit',
            [
                'postEN' => $post->getTranslation('en', true),
                'postRU' => $post->getTranslation('ru', true),
                'suggested'   => Post::with('recommendation')->get()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title_ru'   => 'required',
            'title_en'   => 'required'
        ]);

        $post->edit($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->remove();
        return redirect()->route('posts.index');
    }
}
