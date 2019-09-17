<?php

namespace App\Http\Controllers\Admin;

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
                'consultationOrders'    => ConsultationOrder::get(),
                'posts'                  => Post::count(),
                'products'               => Product::count()
            ]
        );
    }

    public function registerOrder(Request $request)
    {
        $o = $request->get('order');
        $order = ConsultationOrder::findOrFail($o);

        if ($order == null)
            return ['empty' => 'Nothing found.'];

        $order->acceptOrder();

        return ['data' => ConsultationOrder::get()];
    }
}
