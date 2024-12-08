<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller

{
    public function home()
    {
        $news = News::simplePaginate(5);
        $categories = Categories::get();
        return view('welcome', ['news' => $news, 'categories' => $categories]);
    }

    public function about()
    {
        $id_user = Auth::id();
        $profile = Profile::where('user_id', $id_user)->first();
        return view('about', ['profile' => $profile]);
    }
}