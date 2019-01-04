<?php

namespace App\Http\Controllers\User;
use App\Admin\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Show the dynamic pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
    	$pageDetail = Pages::where('page_slug', $page)->first();
    	$pages = Pages::paginate(config('app.data-limit'));

    	if (!empty($pageDetail)) {
    		return view('user.page', compact('pageDetail','pages'));
    	} else {
    		abort(404);
    	}
    }
}
