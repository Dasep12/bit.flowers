<?php


namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Administrator\App\Models\Users;

class FE_HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function myaccount()
    {
        return view('frontend.myaccount');
    }

    public function faq()
    {
        return view('frontend.faq');
    }
    public function shop()
    {
        return view('frontend.shop');
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function login()
    {
        return view('frontend.login');
    }
    public function register()
    {
        return view('frontend.register');
    }
}
