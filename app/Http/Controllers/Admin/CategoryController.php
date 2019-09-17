<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesEN = Category::whereTranslation('anchor', 'anchor_en')->paginate(10);
//        $categoriesRU = $categoriesEN->getTranslation('ru', true);

        return view(
            'admin.categories.index',
            [
                'categoriesEN' => $categoriesEN,
//                'categoriesRU' => $categoriesRU
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
        return view('admin.categories.create', [
            'category'   => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
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
            'name_ru'   => 'required',
            'name_en'   => 'required'
        ]);

        Category::add($request->all());
        return redirect()->route('categories.index');
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
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view(
            'admin.categories.edit',
            [
                'categoryEN' => $category->getTranslation('en', true),
                'categoryRU' => $category->getTranslation('ru', true),
                'categories'   => Category::with('children')->where('parent_id', '0')->get(),
                'delimiter'    => ''
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name_ru'   => 'required',
            'name_en'   => 'required'
        ]);

        $category->edit($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->remove();
        return redirect()->route('categories.index');
    }
}
