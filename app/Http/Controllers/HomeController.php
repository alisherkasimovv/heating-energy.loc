<?php

namespace App\Http\Controllers;

use App\Category;
use App\Characteristic;
use App\ConsultationOrder;
use App\Credential;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anchor = $this->getCurrentLocale();
        return view(
            'front.index',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'products'          => Product::whereTranslation('anchor', $anchor)->orderBy('views', 'desc')->limit(4)->get(),
                'posts'             => Post::orderBy('id', 'desc')->limit(4)->get(),
                'countCategory'     => DB::table('categories')->count(),
                'countProducts'     => DB::table('products')->count()
            ]
        );
    }

    /**
     * Show about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('front.about');
    }

    /**
     * Show contacts page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contacts()
    {
        $anchor = $this->getCurrentLocale();

        return view(
            'front.contacts',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get()
            ]
        );
    }

    /*
     * Show blog page with all posts.
     */
    public function blog()
    {
        $anchor = $this->getCurrentLocale();
        return view(
            'front.posts',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'posts'             => Post::orderBy('id', 'desc')->paginate(10)
            ]
        );
    }

    /**
     * Show single post
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        $anchor = $this->getCurrentLocale();
        $post = Post::whereTranslation('slug', $slug)->firstOrFail();

        $post->incrementViews($post->views);

        $rr = $post->getRecommendations();
        $related = array();
        foreach ($rr as $r)
        {
            array_push($related, Post::whereTranslation('anchor', $anchor)->where('id', $r)->firstOrFail());
        }

        return view(
            'front.post',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'post'              => $post,
                'related'           => $related
            ]
        );
    }


    /**
     * Show products page with filtration by categories
     *
     * @param $slug
     */
    public function filterProducts($slug)
    {

    }

    /**
     * Show single product
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProduct($slug)
    {
        $anchor = $this->getCurrentLocale();

        $product = Product::whereTranslation('slug', $slug)->firstOrFail();
        $product->incrementViews($product->views);

        $ch = $product->getCharacteristics();
        $chars = array();
        foreach($ch as $c)
            array_push($chars, Characteristic::whereTranslation('anchor', $anchor)->where('product_id', $c)->firstOrFail());

        return view(
            'front.product',
            [
                'credential'        => Credential::whereTranslation('anchor', $anchor)->first(),
                'categories'        => Category::whereTranslation('anchor', $anchor)->get(),
                'product'           => $product,
                'characteristics'   => $chars,
            ]
        );
    }

    /**
     * `Under construction` page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * Registering consultations by name and phone
     *
     * @param Request $request
     * @return array
     */
    public function registerConsultation(Request $request)
    {
        ConsultationOrder::add($request);

        return ['data' => 'Wait for request'];
    }

    /**
     * Retrieving application's current locale
     *
     * @return string
     */
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
