<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\review_product;
use App\review_shop;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //
    public function review_product(){

        $objs = DB::table('review_products')->select(
            'review_products.*',
            'review_products.id as id_p',
            'review_products.name as name_re',
            'review_products.status as status_re',
            'review_products.created_at as created_ats',
            'products.*',
            'products.name_pro as name_p',
            )
        ->leftjoin('products', 'products.id',  'review_products.product_id')
        ->get();

          
        $data['objs'] = $objs;
        return view('admin.review.product', $data);

    }

    public function review_shop(){
        $objs = DB::table('review_shops')->select(
            'review_shops.*',
            'review_shops.id as id_p',
            'review_shops.name as name_re',
            'review_shops.status as status_re',
            'review_shops.created_at as created_ats',
            'shops.*',
            'shops.name as name_p',
            )
        ->leftjoin('shops', 'shops.id',  'review_shops.product_id')
        ->get();

        
      
        $data['objs'] = $objs;
        return view('admin.review.shop', $data);
    }


    public function post_status_re_shop(Request $request){

        $user = review_shop::findOrFail($request->user_id);
   
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



        public function post_status_re_product(Request $request){

            $user = review_product::findOrFail($request->user_id);
       
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



    public function del_review_shop($id)
    {

      $obj = DB::table('review_shops')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/review_shop/'))->with('delete','ลบข้อมูล สำเร็จ');
    }



    public function del_review_product($id)
    {

      $obj = DB::table('review_products')
      ->where('id', $id)
      ->delete();

      return redirect(url('admin/review_product/'))->with('delete','ลบข้อมูล สำเร็จ');
    }




}
