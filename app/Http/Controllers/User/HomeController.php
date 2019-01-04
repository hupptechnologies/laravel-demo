<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User\images;
use App\User\ImageRelation;
use App\Admin\Pages;
use DB;
use Auth;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = images::select('images.id as img_id','images.name','images.title',DB::raw("(SELECT COUNT(images_relation.id) FROM images_relation WHERE images.id = images_relation.image_id GROUP BY images.id) as total_count"))->get();
        $user = Auth::user();
        $pages = null;

        if (!empty($user)) {
            $pages = Pages::paginate(config('app.data-limit'));
            $login = 'true';            
        } else {
            $login = 'false';
        }

        return view('user.home',['images' => $list,'login'=>$login, 'pages'=>$pages]);
    }

    /**
     * Show the count of images.
     *
     * @return \Illuminate\Http\Response
     */
    public function countUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'img_id' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['error'=>'true']);
        }

        $img_id = $request->img_id;
        $userId = Auth::id();;
        $check = ImageRelation::where('image_id',$img_id)->where('user_id',$userId)->first();

        if ($check) {
            ImageRelation::where('id', $check->id)->delete();
            $colour = "grey";
        } else {
            $data = ['image_id'=>$img_id,'user_id'=>$userId];
            $insert = new ImageRelation;
            $result = $insert::create($data);
            $colour = "red";
        }

        $imagecount = ImageRelation::where('image_id',$img_id)->count();
        return response()->json(['error'=>'false','count'=>$imagecount,'colour'=>$colour]);
    }

    /**
     * Check for image liked or not.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkImagesColour($imgId)
    {
        $userId = Auth::id();;
        $check = ImageRelation::where('image_id',$imgId)->where('user_id',$userId)->first();

        if ($check) {
            $colour = "red";
        } else {
            $colour = "grey";
        }
        return $colour;
    }
}
