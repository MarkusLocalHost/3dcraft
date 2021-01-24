<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopReview;
use Illuminate\Http\Request;

class ShopReviewAdminController extends Controller
{
    public function index()
    {
        $reviews = ShopReview::all();

        return view('admin.shop_reviews.index', compact('reviews'));
    }
}
