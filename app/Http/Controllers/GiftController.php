<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\gift;
use File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $cat = DB::table('gifts')->paginate(15);

      $data['objs'] = $cat;

      return view('admin.gift.index', $data);
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
      $data['url'] = url('admin/free_shipping');
      return view('admin.gift.create', $data);
    }


    public function post_status_gift(Request $request){

        $user = gift::findOrFail($request->user_id);
   
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
            'image' => 'required|max:8048',
            'name' => 'required',
            'detail' => 'required',
            'code' => 'required',
            'start' => 'required',
            'end' => 'required',
            'total' => 'required'
        ]);

         $path = 'assets/banner/';
         $filename = time().'.'.$image->getClientOriginalExtension();
         $image->move($path, $filename);

       $package = new gift();
       $package->name = $request['name'];
       $package->detail = $request['detail'];
       $package->code = $request['code'];
       $package->end = $request['end'];
       $package->start = $request['start'];
       $package->total = $request['total'];
       $package->image = $filename;
       $package->save();

       return redirect(url('admin/free_shipping/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $obj = gift::find($id);
        $data['url'] = url('admin/free_shipping/'.$id);
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.gift.edit', $data);
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

        $image = $request->file('image');

        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'code' => 'required',
            'start' => 'required',
            'end' => 'required',
            'total' => 'required'
        ]);

        $package = gift::find($id);
        $package->name = $request['name'];
        $package->detail = $request['detail'];
        $package->code = $request['code'];
        $package->end = $request['end'];
        $package->start = $request['start'];
        $package->total = $request['total'];
        $package->save();

        if($image != NULL){


            $obj = gift::find($id);

            $destinationPath = 'assets/banner/'.$obj->image;
            File::delete($destinationPath);

            $path = 'assets/banner/';
         $filename = time().'.'.$image->getClientOriginalExtension();
         $image->move($path, $filename);

        $package = gift::find($id);
        $package->image = $filename;
        $package->save();

        }

        return redirect(url('admin/free_shipping/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_gift($id)
    {
        //
        $objs = DB::table('gifts')
      ->where('id', $id)
      ->first();

      $destinationPath = 'assets/banner/'.$objs->image;
      File::delete($destinationPath);

      $obj = DB::table('gifts')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/free_shipping/'))->with('delete','ลบข้อมูล สำเร็จ');
    }
}
