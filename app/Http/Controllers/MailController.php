<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class MailController extends Controller
{
    Mail::to('marsup39@gmail.com')->send(new contactMail());
}
