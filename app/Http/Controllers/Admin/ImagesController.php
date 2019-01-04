<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User\images;

class ImagesController extends Controller
{
    /**
     * Display a listing of the images.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = images::paginate(config('app.data-limit'));
    	return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new image.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('admin.images.add');
    }

    /**
     * Store a newly created image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title'  => 'required|max:255',
            'image'  => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        if (!$validator->fails()) {
			$fileName = time().'.'.request()->image->getClientOriginalExtension();
		 	$request->image->storeAs('public/images',$fileName);

		 	$imageData = [
		 		'title' => $request->title,
		 		'name' => $fileName,
		 	];

		 	images::create($imageData);
		 	return redirect('images')->with('success', 'Image has been Added');
        } else {
        	return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the specified image.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$image = images::find($id);
    	if ($image) {
    		return view('admin.images.edit', compact('image'));
    	} else {
    		abort(404);
    	}
    }

    /**
     * Update the specified image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title'  => 'required|max:255',
        ]);

        if (!$validator->fails()) {
        	$updateImage = ['title' => $request->title];
        	images::where('id',$id)->update($updateImage);
        	return redirect('images')->with('success', 'Title has been Updated');
        } else {
        	return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified image from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if (images::destroy($id)) {
    		return redirect('images')->with('success', 'Image has been Deleted');
    	} else {
    		abort(404);
    	}
    }
}
