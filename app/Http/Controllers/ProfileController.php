<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\User;

class ProfileController extends Controller
{
    //
    public function my_account(){

        return view('profile.my_account'); 
    }

    public function delete_my_account(){
        return view('profile.delete_account'); 
    }


    public function user_coupon(){


      $objs = DB::table('user_gifts')->select(
        'user_gifts.*',
        'user_gifts.id as idp',
        'user_gifts.status as g_status',
        'gifts.*'
        )
        ->leftjoin('gifts', 'gifts.id',  'user_gifts.gift_id')
        ->where('user_gifts.user_id', Auth::user()->id)
        ->get();

     //   dd($objs);



    $data['objs'] = $objs;
    return view('profile.user_coupon', $data);

    }

    public function confirm_delete_my_account($id){

        DB::table('users')
        ->where('id', $id)
        ->delete();
        
        Auth::logout();

        return redirect(url('/'))->with('del_success','ลบข้อมูล สำเร็จ');
    }

    public function edit_my_account($id){

        $user = DB::table('users')
          ->where('id', Auth::user()->id)
          ->first();

          //dd($user);
          if($user == null){
            abort(404);
          }

      $data['objs'] = $user;
      return view('profile.edit_account', $data);

        //edit_account.blade
    }


    public function post_edit_profile(Request $request){

        $this->validate($request, [
              'name' => 'required'
        ]);
  
        $id = $request['user_id'];
     
  
          $package = User::find($id);
          $package->name = $request['name'];
          $package->phone = $request['phone'];
          $package->save();
  
        return redirect(url('my_account/'))->with('edit_success','Edit successful');
      }


      public function payment_notify()
    {

        $get_order_count = DB::table('pay_orders')
        ->where('email_pay', Auth::user()->email)
        ->count();

        $data['get_order_count'] = $get_order_count;

        $objs = DB::table('pay_orders')
            ->where('email_pay', Auth::user()->email)
            ->get();

        $data['objs'] = $objs;


      return view('profile.payment_notify', $data);
        

    }

    public function payment_notify_item2($id){

      $get_order = DB::table('orders')
        ->where('user_id', Auth::user()->id)
        ->where('id', $id)
        ->first();

        $data['get_order'] = $get_order;

        $order_de = DB::table('order_details')->select(
          'order_details.*',
          'order_details.id as id_de',
          'order_details.created_at as created_ats',
          'products.*'
          )
          ->leftjoin('products', 'products.id',  'order_details.product_id')
          ->where('order_details.order_id', $get_order->id)
          ->get();

          $data['order_de'] = $order_de;

        //  dd($order_de);



      return view('profile.payment_notify_item2', $data);

    }

    public function user_purchase(){

        $get_order = DB::table('orders')
        ->where('user_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
        
        
        if(count($get_order) > 0){


            foreach($get_order as $u){

                $count_p = 0;
                $name = '';

                $order_de = DB::table('order_details')->select(
                      'order_details.*',
                      'order_details.id as id_de',
                      'order_details.created_at as created_ats',
                      'products.*'
                      )
                      ->leftjoin('products', 'products.id',  'order_details.product_id')
                      ->where('order_details.order_id', $u->id)
                      ->get();
    
    
                      foreach($order_de as $h){
    
                        $name .= $h->name_pro.', ';
                        $count_p += $h->product_total;
    
                        }
              $u->count_p = $count_p;
              $u->name_pro = $name;
            }

        }



        $get_order1 = DB::table('orders')
        ->where('user_id', Auth::user()->id)
        ->where('order_status', 0)
        ->orderBy('id', 'desc')
        ->get();

        if(count($get_order1) > 0){


            foreach($get_order1 as $u){

                $count_p = 0;
                $name = '';

                $order_de = DB::table('order_details')->select(
                      'order_details.*',
                      'order_details.id as id_de',
                      'order_details.created_at as created_ats',
                      'products.*'
                      )
                      ->leftjoin('products', 'products.id',  'order_details.product_id')
                      ->where('order_details.order_id', $u->id)
                      ->get();
    
    
                      foreach($order_de as $h){
    
                        $name .= $h->name_pro.', ';
                        $count_p += $h->product_total;
    
                        }
              $u->count_p = $count_p;
              $u->name_pro = $name;
            }

        }



        $get_order2 = DB::table('orders')
        ->where('user_id', Auth::user()->id)
        ->where('order_status', 1)
        ->orderBy('id', 'desc')
        ->get();

        if(count($get_order2) > 0){


            foreach($get_order2 as $u){

                $count_p = 0;
                $name = '';

                $order_de = DB::table('order_details')->select(
                      'order_details.*',
                      'order_details.id as id_de',
                      'order_details.created_at as created_ats',
                      'products.*'
                      )
                      ->leftjoin('products', 'products.id',  'order_details.product_id')
                      ->where('order_details.order_id', $u->id)
                      ->get();
    
    
                      foreach($order_de as $h){
    
                        $name .= $h->name_pro.', ';
                        $count_p += $h->product_total;
    
                        }
              $u->count_p = $count_p;
              $u->name_pro = $name;
            }

        }

       
        
        $data['get_order'] = $get_order;
        $data['get_order1'] = $get_order1;
        $data['get_order2'] = $get_order2;

        return view('profile.user_purchase', $data);
    }


}
