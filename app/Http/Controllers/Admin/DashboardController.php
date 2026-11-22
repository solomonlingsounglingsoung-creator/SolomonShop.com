<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
         $counts = [
            'items' => Schema::hasTable('items')
                ? DB::table('items')->count() : 0,

            'categories' => Schema::hasTable('categories')
                ? DB::table('categories')->count() : 0,

            'orders' => Schema::hasTable('orders')
                ? DB::table('orders')->count() : 0,

            'payments' => Schema::hasTable('payments')
                ? DB::table('payments')->count() : 0,
        ];

        return view('admin.dashboards.index', compact('counts'));
    }
}
