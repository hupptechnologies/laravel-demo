<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$users = User::paginate(config('app.data-limit'));
    	return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
    	return view('admin.users.add');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'name'  => 'required|max:255',
            'email'  => 'required|unique:users|email|max:255',
            'password'  => 'min:5|required_with:confPassword|same:confPassword|max:255',
            'confPassword'  => 'required|min:5|max:255',
        ], [
        	'password.same' => 'The password and confirm password must match.',
            'confPassword.required' => 'The confirm password field is required.'
        ]);
        if (!$validator->fails()) {
        	$user = [
        		'name'=>$request->name,
        		'email'=>$request->email,
        		'password'=>bcrypt($request->password),
        	];
        	User::create($user);
        	return redirect('users')->with('success', 'User has been added');
        } else {
        	return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$userData = User::find($id);
    	if ($userData) {
    		return view('admin.users.edit', compact('userData'));
    	} else {
    		abort(404);
    	}
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
    	if ($request->check) {
    		$validator = Validator::make($request->all(), [
	            'name'  => 'required|max:200',
	            'email'  => 'required|email|max:200|unique:users,email,'. $id,
	            'password'  => 'min:5|required|max:200',
	        ]);

	        if (!$validator->fails()) {
	        	$updateUser = [
	        		'name'=> $request->name,
	        		'email'=> $request->email,
	        		'password'=> bcrypt($request->password),
	        	];
	        	User::where('id',$id)->update($updateUser);
	        	return redirect('users')->with('success', 'User has been Added');
	        } else {
	        	return redirect()->back()->withErrors($validator);
	        }
    	} else {
    		$validator = Validator::make($request->all(), [
	            'name'  => 'required|max:200',
	            'email'  => 'required|email|max:200|unique:users,email,'.$id,
	        ]);

	        if (!$validator->fails()) {
	        	$updateUser = [
	        		'name'=> $request->name,
	        		'email'=> $request->email,
	        	];
	        	User::where('id',$id)->update($updateUser);
	        	return redirect('users')->with('success', 'User has been Updated.');
	        } else {
	        	return redirect()->back()->withErrors($validator);
	        }
    	}
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id)) {
            return redirect('users')->with('success', 'User has been Deleted.');
        } else {
            abort(404);
        }
    }
}
