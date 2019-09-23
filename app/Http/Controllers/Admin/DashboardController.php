<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\ConsultationOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Product;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Admin
 * @author Alisher Kasimov
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'admin.dashboard',
            [
                'consultationOrders'     => ConsultationOrder::paginate(30),
                'orders'                 => ConsultationOrder::count(),
                'posts'                  => Post::count(),
                'products'               => Product::count(),
                'categories'             => Category::count()
            ]
        );
    }

    public function registerOrder($id)
    {
        $order = ConsultationOrder::findOrFail($id);
        $order->acceptOrder();
        redirect()->route('dashboard.index');
    }
}
