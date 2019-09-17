<?php

namespace App\Http\Controllers;

use App\Category;
use App\Credential;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        $logo = $credential->images;


        foreach ($logo as $l)
        {
            $img = $l->url;
        }

        return view(
            'front.index',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'logo'              => $img,
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'products'          => Product::whereTranslation('anchor', $anchor)->limit(4)->get(),
                'posts'             => Post::orderBy('id', 'desc')->limit(4)->get(),
                'countCategory'     => DB::table('categories')->count(),
                'countProducts'     => DB::table('products')->count()
            ]
        );
    }

    public function about()
    {
        return view('front.about');
    }

    public function contacts()
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        foreach ($credential->images as $l)
        {
            $img = $l->url;
        }

        return view(
            'front.contacts',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'logo'              => $img,
            ]
        );
    }

    public function blog()
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        foreach ($credential->images as $l)
        {
            $img = $l->url;
        }

        return view(
            'front.posts',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'posts'             => Post::orderBy('id', 'desc')->paginate(10),
                'logo'              => $img,
            ]
        );
    }

    public function getPost($slug)
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        $logo = $credential->images;

        foreach ($logo as $l)
        {
            $img = $l->url;
        }

        $post = Post::whereTranslation('slug', $slug)->with('recommendations')->firstOrFail();
        $post->incrementViews($post->views);

        $images = $post->images;
        $pRecommends = $post->recommendations;
        $rPost = array();
        foreach ($pRecommends as $r)
        {
            array_push($rPost, Post::where('id', $r->related_post_id)->get());
        }
//        $prImages = $pRecommends->images;

//        dd($pRecommends);
        return view(
            'front.post',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'logo'              => $img,
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'post'              => $post,
                'images'            => $images,
                'recommendations'   => $rPost,
            ]
        );
    }

    public function getProduct($slug)
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        $logo = $credential->images;

        foreach ($logo as $l)
        {
            $img = $l->url;
        }

        $product = Product::whereTranslation('slug', $slug)->firstOrFail();
        $product->incrementViews($product->views);

        $characteristics = $product->characteristics;
        $images = $product->images;

        return view(
            'front.product',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'logo'              => $img,
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'product'           => $product,
                'characteristics'   => $characteristics,
                'images'            => $images,
            ]
        );
    }

    public function underConstruction()
    {
        $anchor = $this->getCurrentLocale();

        $credential = Credential::find(1);
        foreach ($credential->images as $l)
        {
            $img = $l->url;
        }

        return view(
            'front.development',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'logo'              => $img,
            ]
        );
    }

    private function getCurrentLocale()
    {
        $locale = app()->getLocale();
        if($locale == 'en')
        {
            $anchor = 'anchor_en';
        }
        elseif ($locale == 'ru')
        {
            $anchor = 'anchor_ru';
        }

        return $anchor;
    }
}
