<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::all();

        return view('admin.user_addresses.index', compact('addresses'));
    }

    public function create()
    {

    }

    public function store()
    {

    }
}
