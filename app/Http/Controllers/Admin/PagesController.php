<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Pages;
use Validator;

class PagesController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$pages = Pages::paginate(config('app.data-limit'));
    	return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('admin.pages.add');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'disc' => 'required|max:255',
            'pageImage' =>'required|mimes:jpeg,jpg,png,gif|max:5000'
        ], [
            'disc.required' => 'The description field is required.',
            'pageImage.required' => 'The image field is required.',
        	'pageImage.max' => 'Maximum image size is 4mb.'
        ]);

        if (!$validator->fails()) {
            $pageImage = time(). '.'. $request->pageImage->getClientOriginalExtension();
            $request->pageImage->storeAs('public/page_image', $pageImage);

        	$page = [
        		'page' => $request->name,
        		'page_slug' => str_replace(' ', '-', $request->name),
        		'disc' => $request->disc,
                'page_image' => $pageImage
        	];
        	Pages::create($page);
        	return redirect('pages')->with('success', 'Page has been Created');
        } else {
        	return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$page = Pages::find($id);
    	if ($page) {
    		return view('admin.pages.edit', compact('page'));
    	} else {
    		abort(404);
    	}
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'disc' => 'required|max:255',
        ]);

        if (!$validator->fails()) {
            if (!empty($request->pageImage)) {
                $pageImage = time(). '.'. $request->pageImage->getClientOriginalExtension();
                $request->pageImage->storeAs('public/page_image',$pageImage);

                $updatePage = [
                    'page' => $request->name,
                    'page_slug' => str_replace(' ', '-', $request->name),
                    'disc' => $request->disc,
                    'page_image' => $pageImage
                ];
                Pages::where('id',$id)->update($updatePage);
            } else {
                $updatePage = [
                    'page' => $request->name,
                    'page_slug' => str_replace(' ','-',$request->name),
                    'disc' => $request->disc
                ];
                Pages::where('id',$id)->update($updatePage);
            }
        	return redirect('pages')->with('success', 'Page has been Updated');
        } else {
        	return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (Pages::destroy($id)) {
    		return redirect('pages')->with('success', 'Page has been Deleted');
    	} else {
    		abort(404);
    	}
    }
}
