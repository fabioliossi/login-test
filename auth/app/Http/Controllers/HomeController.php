<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleXmlElement;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feed = file_get_contents("https://news.google.com/news/section?cf=all&hl=pt-BR&pz=1&ned=pt-BR_br&topic=n&output=rss");
        $feed = trim($feed);

        $feedList = new SimpleXmlElement($feed);    

        return view('home', ['feeds'=>$feedList]);
    }
}
