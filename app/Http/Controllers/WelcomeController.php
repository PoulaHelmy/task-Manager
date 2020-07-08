<?php

namespace App\Http\Controllers;


use App\Models\User;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
//        $categories_count = Category::count();
//        $products_count = Product::count();
//        $clients_count = Client::count();
          //  $users_count = User::whereRoleIs('admin')->count();
       $users_count = User::count();
//       $suppliers_count = Supplier::count();
//       $orders_count = Order::count();
//       $orders_suppliers_count = OrderSupplier::count();

        // $sales_data = Order::select(
        //     DB::raw('YEAR(created_at) as year'),
        //     DB::raw('MONTH(created_at) as month'),
        //     DB::raw('SUM(total_price) as sum')
        // )->groupBy('month')->get();
//        'categories_count', 'products_count', 'clients_count','suppliers_count','orders_suppliers_count','orders_count'
        return view('dashboard.welcome', compact( 'users_count',));

    }//end of index

}//end of controller
