<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Characteristic;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'admin.products.index',
            [
                'productsEN' => Product::whereTranslation('anchor', 'anchor_en')->paginate(10),
                'productsRU' => Product::whereTranslation('anchor', 'anchor_ru')->paginate(10)
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
        return view(
            'admin.products.create', [
                'product'           => [],
                'suggestProducts'   => Product::whereTranslation('anchor', 'anchor_en')->get(),
                'categories'        => Category::with('children')->where('parent_id', '0')->get(),
                'delimiter'         => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_en' => 'required',
            'name_ru' => 'required',
            'images.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        /*
         * Making characteristics array for further usage
         */
        $ch = array($request['keys_en'], $request['values_en'], $request['keys_ru'], $request['values_ru']);

        /*
         * Add newly created array into request body
         */
        $request->request->add(['characteristics' => $ch]);
        $request->request->add([
            'char-size' => sizeof($request['keys_en'])
        ]);

        /*
         * Remove old request fields
         */
        $request->request->remove('keys_en');
        $request->request->remove('keys_ru');
        $request->request->remove('values_en');
        $request->request->remove('values_ru');

        if (!$request->has('suggestProducts'))
            $request->request->add(['suggestProducts' => null]);

        if (!$request->has('characteristics'))
            $request->request->add(['characteristics' => null]);

        Product::add($request->all());
        return redirect()->route('products.index');
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
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view(
            'admin.products.edit',
            [
                'product'               => $product,
                'productEN'             => $product->getTranslation('en', true),
                'productRU'             => $product->getTranslation('ru', true),
                'selCategories'         => $product->categories()->get(),
                'characteristicsEN'     => $product->characteristics()->get(),
                'oldImages'             => $product->images,
                'suggestProducts'       => Product::whereTranslation('anchor', 'anchor_en')->get(),
                'suggestSelect'         => $product->categories()->pluck('id'),
                'categories'            => Category::with('children')->where('parent_id', '0')->get(),
                'delimiter'             => ''
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name_en'   => 'required',
            'name_ru'   => 'required',
            'images.*'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
//        dd($request->all());

        /*
         * Making characteristics array for further usage
         */
        $ch = array($request['keys_en'], $request['values_en'], $request['keys_ru'], $request['values_ru']);

        /*
         * Add newly created array into request body
         */
        $request->request->add(['characteristics' => $ch]);
        $request->request->add([
            'char-size' => sizeof($request['keys_en'])
        ]);

        /*
         * Remove old request fields
         */
        $request->request->remove('keys_en');
        $request->request->remove('keys_ru');
        $request->request->remove('values_en');
        $request->request->remove('values_ru');

        if (!$request->has('oldImages'))
        $request->request->add(['oldImages' => null]);

        if (!$request->has('suggestProducts'))
        $request->request->add(['suggestProducts' => null]);

        if (!$request->has('characteristics'))
        $request->request->add(['characteristics' => null]);


        $product->edit($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->remove();
        return redirect()->route('products.index');
    }
}
