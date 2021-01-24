<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageFeedbackController extends Controller
{
    public function send()
    {
        Mail::to('asgarot72@gmail.com')->send(new FeedbackMail());
    }
}
