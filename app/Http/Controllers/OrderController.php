<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\order;
use App\order_detail;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat = DB::table('orders')->paginate(15);

      $data['s'] = 1;
      $data['objs'] = $cat;
      $data['datahead'] = "ยอดสั่งซื้อทั้งหมด";


      return view('admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function search_order(Request $request){

        $this->validate($request, [
            'search' => 'required'
          ]);
    
          $search = $request->get('search');
    
    
          $cat = DB::table('orders')
                ->where('lastname_order', 'like', "%$search%")
                ->orwhere('name_order', 'like', "%$search%")
                ->orwhere('telephone_order', 'like', "%$search%")
                ->get();
    
     
          $data['objs'] = $cat;
          $data['search'] = $search;
    
          return view('admin.order.search', $data);

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
      $data['url'] = url('admin/order/'.$id);
      $data['method'] = "put";

      $objs = DB::table('orders')->where('id', $id)->first();
      $data['objs'] = $objs;

      $obj = DB::table('order_details')->where('order_id', $objs->id)->get();
      $data['obj'] = $obj;

      $pay = DB::table('pay_orders')->where('no_pay', $objs->lastname_order)->first();
      $data['pay'] = $pay;

      return view('admin.order.edit', $data);
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
        $this->validate($request, [
            'status' => 'required',
            'note' => 'required'
        ]);

           $package = order::find($id);
           $package->order_status = $request['status'];
           $package->note = $request['note'];
           $package->save();

           return redirect(url('admin/order/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
