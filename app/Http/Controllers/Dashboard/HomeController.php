<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function changeLang($lang)
    {
        app()->setLocale($lang);
        session()->put('locale', $lang);
        return back();
    }

    public function index () {
        $products = Item::count();
        $categories = Category::count();
        $users = User::count();

        return view('dashboard.home', compact(['products', 'categories', 'users']));
        
    }
}
