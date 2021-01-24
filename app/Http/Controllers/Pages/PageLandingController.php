<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\ShopCategory;
use App\Models\ShopSection;
use Illuminate\Http\Request;

class PageLandingController extends Controller
{
    public function index()
    {
        $sections = ShopSection::all();
        $categories = ShopCategory::all();
        $categories_blog = BlogCategory::all();

        return view('pages.landing', compact('sections', 'categories', 'categories_blog'));
    }
}
