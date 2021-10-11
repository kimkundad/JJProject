<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\banner_img;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use File;
use Response;
use Redirect;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = banner_img::all();
        $data['objs'] = $objs;
        return view('admin.banner.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $data['method'] = "post";
      $data['url'] = url('admin/banner');
      return view('admin.banner.create', $data);
    }


    public function post_status_banner(Request $request){

        $user = banner_img::findOrFail($request->user_id);
   
                  if($user->status == 1){
                      $user->status = 0;
                  } else {
                      $user->status = 1;
                  }
   
   
          return response()->json([
          'data' => [
            'success' => $user->save(),
          ]
        ]);
   
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image = $request->file('image');

        $this->validate($request, [
             'image' => 'required|max:8048'
         ]);

         $path = 'assets/banner/';
         $filename = time().'.'.$image->getClientOriginalExtension();
         $image->move($path, $filename);

       $package = new banner_img();
       $package->image_url = $request['image_url'];
       $package->sort = $request['sort'];
       $package->image = $filename;
       $package->save();

       return redirect(url('admin/banner/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj = banner_img::find($id);
        $data['url'] = url('admin/banner/'.$id);
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.banner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $package = banner_img::find($id);
        $package->image_url = $request['image_url'];
        $package->sort = $request['sort'];
        $package->save();

        $image = $request->file('image');

        if($image != NULL){

            $obj = banner_img::find($id);

            $destinationPath = 'assets/banner/'.$obj->image;
      File::delete($destinationPath);

  

         $path = 'assets/banner/';
         $filename = time().'.'.$image->getClientOriginalExtension();
         $image->move($path, $filename);

        $obj = banner_img::find($id);
        $obj->image = $filename;
        $obj->save();

        }

        return redirect(url('admin/banner/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_banner($id)
    {
        //
        $objs = DB::table('banner_imgs')
      ->where('id', $id)
      ->first();

      $destinationPath = 'assets/banner/'.$objs->image;
      File::delete($destinationPath);

      $obj = DB::table('banner_imgs')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/banner/'))->with('delete','ลบข้อมูล สำเร็จ');
    }
}
