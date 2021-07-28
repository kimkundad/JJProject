<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\get_product;
use App\subscribe;
use App\shop;
use App\wishlist;
use App\bank;
use App\pay_order;
use App\order;
use App\order_detail;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $cat = DB::table('categories')
        ->whereBetween('id', [18, 22])
        ->where('id', '!=', 0)
        ->get();

foreach ($cat as $obj1) {

  $options = DB::table('shops')
        ->where('category_id', $obj1->id)
        ->count();
  $obj1->options = $options;
}


$cat2 = DB::table('categories')
       ->whereBetween('id', [23, 27])
       ->where('id', '!=', 0)
       ->get();

foreach ($cat2 as $obj2) {

 $options = DB::table('shops')
       ->where('category_id', $obj2->id)
       ->count();
 $obj2->options = $options;
}


$cat3 = DB::table('categories')
      ->whereBetween('id', [28, 32])
      ->where('id', '!=', 0)
      ->get();

foreach ($cat3 as $obj3) {

$options = DB::table('shops')
      ->where('category_id', $obj3->id)
      ->count();
$obj3->options = $options;
}

$data['category1'] = $cat;
     $data['category2'] = $cat2;
     $data['category3'] = $cat3;

        $shop_count = DB::table('shops')->count();

        $text = DB::table('text_settings')
            ->where('id', 1)
            ->first();
        $data['text'] = $text;

        $shop = DB::table('shops')
            ->where('first', 1)
            ->orderBy('priority', 'asc')
            ->limit(12)
            ->get();

        $set_point = 0;
        $data['set_point'] = $set_point;
        $data['shop'] = $shop;
        $data['shop_count'] = $shop_count;


        $product = DB::table('products')
            ->where('status', 1)
            ->orderBy('sort', 'asc')
            ->get();
        $data['product'] = $product;

        return view('welcome', $data);
    }


    public function presentation(){

        $cat = DB::table('categories')
               ->whereBetween('id', [18, 22])
               ->where('id', '!=', 0)
               ->get();
   
       foreach ($cat as $obj1) {
   
         $options = DB::table('shops')
               ->where('category_id', $obj1->id)
               ->count();
         $obj1->options = $options;
       }
   
   
       $cat2 = DB::table('categories')
              ->whereBetween('id', [23, 27])
              ->where('id', '!=', 0)
              ->get();
   
      foreach ($cat2 as $obj2) {
   
        $options = DB::table('shops')
              ->where('category_id', $obj2->id)
              ->count();
        $obj2->options = $options;
      }
   
   
      $cat3 = DB::table('categories')
             ->whereBetween('id', [28, 32])
             ->where('id', '!=', 0)
             ->get();
   
     foreach ($cat3 as $obj3) {
   
       $options = DB::table('shops')
             ->where('category_id', $obj3->id)
             ->count();
       $obj3->options = $options;
     }
   
        $data['category1'] = $cat;
        $data['category2'] = $cat2;
        $data['category3'] = $cat3;
        return view('presentation', $data);
      }


    public function contact_us()
    {
        return view('contact_us');
    }


    public function add_contact(Request $request){
        

      
        $secret=env('reCAPTCHA');
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha_1.'
          ]
        ]);

      }else{

        //Y69JyKIDcGA6Qx9lAnDlHMusWip1XBFA1jnQAGDcx8f

        $message = "ข้อความจากหน้าติดต่อ ".$request['name'].", ".$request['email'].", ".$request['phone'].", ข้อความ : ".$request['comments'];
        $lineapi = env('line_token');
        

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);

        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);

            }


    }



    public function add_my_product_home(Request $request){
        

      
        $secret=env('reCAPTCHA');
    //  $response = $request['captcha'];

      $captcha = "";
      if (isset($request["g-recaptcha-response"]))
        $captcha = $request["g-recaptcha-response"];

    //  $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response");
      $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
      //$captcha_success=json_decode($verify);

    //  dd($captcha_success);

    if($response["success"] == false) {

        return response()->json([
          'data' => [
            'status' => 100,
            'msg' => 'This user was not verified by recaptcha_1.'
          ]
        ]);

      }else{

        //Y69JyKIDcGA6Qx9lAnDlHMusWip1XBFA1jnQAGDcx8f

        $message = "ต้องการได้สินค้า ".$request['product'].", ข้อมูลผู้ติดต่อ : ".$request['email'].", ".$request['phone'];
        $lineapi = env('line_token');
        

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);


        $package = new get_product();
       $package->product = $request['product'];
       $package->email = $request['email'];
       $package->phone = $request['phone'];
       $package->save();




        return response()->json([
            'data' => [
              'status' => 200,
              'msg' => 'This user is verified by recaptcha.'
            ]
          ]);

            }


    }



    public function add_subscribe(Request $request){

        $email = $request->input('email');
  
        $check_mail = DB::table('subscribes')
                ->where('email', $email)
                ->count();
  
  
       // dd($check_mail);
  
        if($check_mail != 0){
  
           return response()->json([
            'data' => [
              'status' => 1002
            ]
          ]);
  
        }else{
  
         $package = new subscribe();
         $package->email = $request['email'];
         $package->save();
  
  
         return response()->json([
            'data' => [
              'status' => 1001
            ]
          ]);
  
        }
  
      }



      public function search(Request $request){

        $search = $request->search;
   
        $data['search'] = $search;
   
        $get_user_count = DB::table('shops')
             ->where('name', 'LIKE', "%{$search}%")
             ->orWhere('keyword', 'LIKE', "%{$search}%")
             ->count();
   
  
   
         $options = DB::table('shops')
             ->where('name', 'LIKE', "%{$search}%")
             ->orWhere('keyword', 'LIKE', "%{$search}%")
             ->paginate(8);
   
             $shop = DB::table('shops')
                 ->where('name', 'LIKE', "%{$search}%")
                 ->orWhere('keyword', 'LIKE', "%{$search}%")
                 ->get();
   
                 $shop_count = DB::table('shops')
                     ->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('keyword', 'LIKE', "%{$search}%")
                     ->count();
   
   
   
   
   
       //dd($options);
         $options->appends($request->only('search'));
   
         $data['shop_count'] = $shop_count;
         $data['shop'] = $shop;
         $data['options'] = $options;
         $data['header'] = "ค้นหาสิ่งที่ต้องการ ใน ตลาดนัดสวนจตุจักร";
   
   
         return view('search', compact('options'))->with(['shop_count' => $shop_count, 'search' => $search]);
      }



      public function shop($id){

        $package = shop::find($id);
        $package->view += 1;
        $package->save();
   
        $objs = DB::table('shops')->select(
                   'shops.*',
                   'shops.id as id_p',
                   'shops.detail as details',
                   'shops.detail_en as details_en',
                   'shops.detail_cn as details_cn',
                   'shops.name as names',
                   'categories.*',
                   'categories.id as id_c',
                   'categories.name as name_c'
                   )
           ->leftjoin('categories', 'categories.id',  'shops.category_id')
           ->where('shops.id', $id)
           ->first();



           $ran = DB::table('shops')->select(
            'shops.*',
            'shops.id as id_p',
            'shops.detail as details',
            'shops.detail_en as details_en',
            'shops.detail_cn as details_cn',
            'shops.name as names',
            'shops.image as images_shop11',
            'categories.*',
            'categories.id as id_c',
            'categories.name as name_c'
            )
    ->leftjoin('categories', 'categories.id',  'shops.category_id')
    ->where('shops.category_id', $objs->id_c)
    ->inRandomOrder()->limit(3)->get();
   
     
   
   //dd($objs);
   
           $gallery1 = DB::table('product_images')
                  ->where('product_id', $id)
                  ->get();
   
                  $home_image_count = DB::table('product_images')
                         ->where('product_id', $id)
                         ->count();
   
                  $gallery2 = DB::table('product_image1s')
                         ->where('product_id', $id)
                         ->get();
   
                         $cat = DB::table('categories')
                                ->where('id', '!=', 0)
                                ->get();
   
                                foreach ($cat as $obj1) {
   
                                  $options = DB::table('shops')
                                        ->where('category_id', $obj1->id)
                                        ->count();
                                  $obj1->options = $options;
                                }
                               $data['ran'] = $ran;
                               $data['home_image_count'] = $home_image_count;
        $data['cat'] = $cat;
        $data['objs'] = $objs;
        $data['home_image'] = $gallery1;
        $data['home_image_all'] = $gallery1;
        $data['gallery2'] = $gallery2;
        return view('shop', $data);
      }



      public function category($id){

        $cat = DB::table('categories')
               ->where('id', $id)
               ->first();
   
   
               $options = DB::table('shops')
                   ->where('category_id', $cat->id)
                   ->orderBy('rating', 'desc')
                   ->paginate(8);
   
                   $shop = DB::table('shops')
                       ->where('category_id', $cat->id)
                       ->get();
   
                       $shop_count = DB::table('shops')
                           ->where('category_id', $cat->id)
                           ->count();
   
            $rate1 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 1)
                     ->count();
            $data['rate1'] = $rate1;
   
            $rate2 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 2)
                     ->count();
            $data['rate2'] = $rate2;
   
            $rate3 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 3)
                     ->count();
            $data['rate3'] = $rate3;
   
            $rate4 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 4)
                     ->count();
            $data['rate4'] = $rate4;
   
            $rate5 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 5)
                     ->count();
            $data['rate5'] = $rate5;
   
   
   
            $price1 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [100, 200])
                     ->count();
            $data['price1'] = $price1;
   
            $price2 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [200, 500])
                     ->count();
            $data['price2'] = $price2;
   
            $price3 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [500, 1000])
                     ->count();
            $data['price3'] = $price3;
   
            $price4 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [1000, 2500])
                     ->count();
            $data['price4'] = $price4;
   
            $price5 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [2500, 20000000])
                     ->count();
            $data['price5'] = $price5;
   
   
       $data['shop_count'] = $shop_count;
       $data['shop'] = $shop;
       $data['options'] = $options;
       $data['cat'] = $cat;
       //  dd($cat);
   
        return view('category', $data);
   
      }




      public function category_price($id, $price){

        if($price == 2){
          $s_price = 100;
          $e_price = 200;
        }else if($price == 3){
          $s_price = 200;
          $e_price = 500;
        }else if($price == 4){
          $s_price = 500;
          $e_price = 1000;
        }else if($price == 5){
          $s_price = 1000;
          $e_price = 2500;
        }else{
          $s_price = 2500;
          $e_price = 2500000;
        }
   
        //->whereBetween('startprice', [$s_price, $e_price])
   
        $cat = DB::table('categories')
               ->where('id', $id)
               ->first();
   
   
               $options = DB::table('shops')
                   ->where('category_id', $cat->id)
                   ->whereBetween('startprice', [$s_price, $e_price])
                   ->orderBy('rating', 'desc')
                   ->paginate(8);
   
                   $shop = DB::table('shops')
                       ->where('category_id', $cat->id)
                       ->whereBetween('startprice', [$s_price, $e_price])
                       ->get();
   
                       $shop_count = DB::table('shops')
                           ->where('category_id', $cat->id)
                           ->whereBetween('startprice', [$s_price, $e_price])
                           ->count();
   
            $rate1 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 1)
                     ->count();
            $data['rate1'] = $rate1;
   
            $rate2 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 2)
                     ->count();
            $data['rate2'] = $rate2;
   
            $rate3 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 3)
                     ->count();
            $data['rate3'] = $rate3;
   
            $rate4 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 4)
                     ->count();
            $data['rate4'] = $rate4;
   
            $rate5 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->where('rating', 5)
                     ->count();
            $data['rate5'] = $rate5;
   
   
            //////////////////////////////////////////////
   
   
   
            $price1 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [100, 200])
                     ->count();
            $data['price1'] = $price1;
   
            $price2 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [200, 500])
                     ->count();
            $data['price2'] = $price2;
   
            $price3 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [500, 1000])
                     ->count();
            $data['price3'] = $price3;
   
            $price4 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [1000, 2500])
                     ->count();
            $data['price4'] = $price4;
   
            $price5 = DB::table('shops')
                     ->where('category_id', $cat->id)
                     ->whereBetween('startprice', [2500, 20000000])
                     ->count();
            $data['price5'] = $price5;
   
   
       $data['shop_count'] = $shop_count;
       $data['shop'] = $shop;
       $data['options'] = $options;
       $data['cat'] = $cat;
       //  dd($cat);
   
        return view('category', $data);
   
      }



      public function category_rate($id, $ratting){

        $rate1 = DB::table('shops')
                 ->where('category_id', $id)
                 ->where('rating', 1)
                 ->count();
        $data['rate1'] = $rate1;
   
        $rate2 = DB::table('shops')
                 ->where('category_id', $id)
                 ->where('rating', 2)
                 ->count();
        $data['rate2'] = $rate2;
   
        $rate3 = DB::table('shops')
                 ->where('category_id', $id)
                 ->where('rating', 3)
                 ->count();
        $data['rate3'] = $rate3;
   
        $rate4 = DB::table('shops')
                 ->where('category_id', $id)
                 ->where('rating', 4)
                 ->count();
        $data['rate4'] = $rate4;
   
        $rate5 = DB::table('shops')
                 ->where('category_id', $id)
                 ->where('rating', 5)
                 ->count();
        $data['rate5'] = $rate5;
   
   
        $price1 = DB::table('shops')
                 ->where('category_id', $id)
                 ->whereBetween('startprice', [100, 200])
                 ->count();
        $data['price1'] = $price1;
   
        $price2 = DB::table('shops')
                 ->where('category_id', $id)
                 ->whereBetween('startprice', [200, 500])
                 ->count();
        $data['price2'] = $price2;
   
        $price3 = DB::table('shops')
                 ->where('category_id', $id)
                 ->whereBetween('startprice', [500, 1000])
                 ->count();
        $data['price3'] = $price3;
   
        $price4 = DB::table('shops')
                 ->where('category_id', $id)
                 ->whereBetween('startprice', [1000, 2500])
                 ->count();
        $data['price4'] = $price4;
   
        $price5 = DB::table('shops')
                 ->where('category_id', $id)
                 ->whereBetween('startprice', [2500, 20000000])
                 ->count();
        $data['price5'] = $price5;
   
        $cat = DB::table('categories')
               ->where('id', $id)
               ->first();
   
   
               $options = DB::table('shops')
                   ->where('category_id', $cat->id)
                   ->where('rating', $ratting)
                   ->orderBy('rating', 'desc')
                   ->paginate(8);
   
                   $shop = DB::table('shops')
                       ->where('category_id', $cat->id)
                       ->where('rating', $ratting)
                       ->get();
   
                       $shop_count = DB::table('shops')
                           ->where('category_id', $cat->id)
                           ->where('rating', $ratting)
                           ->count();
   
       $data['shop_count'] = $shop_count;
       $data['shop'] = $shop;
       $data['options'] = $options;
       $data['cat'] = $cat;
       //  dd($cat);
   
        return view('category', $data);
      }




      public function add_wishlist(Request $request)
   {
     if(isset(Auth::user()->id)){

       $check_w = DB::table('wishlists')->select(
              'wishlists.*'
              )
              ->where('product_id', $request->id)
              ->where('user_id', Auth::user()->id)
              ->count();

      if($check_w == 0){

        $package = new wishlist();
        $package->user_id = Auth::user()->id;
        $package->product_id = $request->id;
        $package->save();

        return response()->json([
          'status' => 1001,
        ]);

      }else{

        return response()->json([
          'status' => 1001,
        ]);
      }

     }else{

       return response()->json([
         'status' => 1002,
       ]);

     }
   }


   public function wishlist(){

    $wishlist_count = DB::table('wishlists')->select(
        'wishlists.*',
        'wishlists.id as idw'
        )
        ->where('wishlists.user_id', Auth::user()->id)
        ->count();

    $options = DB::table('wishlists')->select(
        'wishlists.*',
        'wishlists.id as idw',
        'shops.*',
        'shops.id as idp'
        )
        ->leftjoin('shops', 'shops.id', '=', 'wishlists.product_id')
        ->where('wishlists.user_id', Auth::user()->id)
        ->paginate(8);

        $data['wishlist_count'] = $wishlist_count;
        $data['options'] = $options;
        return view('wishlist', $data);

  }


  public function del_wishlist(Request $request){

    $obj = DB::table('wishlists')
     ->where('wishlists.id', $request->id)
     ->delete();

     return response()->json([
       'status' => 1001,
     ]);

  }

  public function confirm_payment(){

    $bank = bank::all();
    $data['bank'] = $bank;
    return view('confirm_payment', $data);
  }



  public function add_confirm_payment(Request $request){

    $image = $request->file('files');

    if($image == NULL){

      $this->validate($request, [
              'name_pay' => 'required',
              'phone_pay' => 'required',
              'no_pay' => 'required',
              'money_pay' => 'required',
              'bank' => 'required',
              'day_pay' => 'required',
              'time_pay' => 'required',
              'message_pay' => 'required'
          ]);


     $package = new pay_order();
     $package->name_pay = $request['name_pay'];
     $package->phone_pay = $request['phone_pay'];
     $package->no_pay = $request['no_pay'];
     $package->money_pay = $request['money_pay'];
     $package->bank = $request['bank'];
     $package->day_pay = $request['day_pay'];
     $package->time_pay = $request['time_pay'];
     $package->message_pay = $request['message_pay'];
     $package->save();

    }else{

      $image = $request->file('files');

      $this->validate($request, [
              'files' => 'required|max:8048',
              'name_pay' => 'required',
              'phone_pay' => 'required',
              'no_pay' => 'required',
              'money_pay' => 'required',
              'bank' => 'required',
              'day_pay' => 'required',
              'email_pay' => 'required'
          ]);



          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $destinationPath = asset('assets/image/payment/');
      $img = Image::make($image->getRealPath());
      $img->resize(800, 533, function ($constraint) {
      $constraint->aspectRatio();
    })->save('assets/image/payment/'.$input['imagename']);


          $package = new pay_order();
          $package->name_pay = $request['name_pay'];
          $package->phone_pay = $request['phone_pay'];
          $package->no_pay = $request['no_pay'];
          $package->money_pay = $request['money_pay'];
          $package->bank = $request['bank'];
          $package->day_pay = $request['day_pay'];
          $package->time_pay = $request['time_pay'];
          $package->message_pay = $request['message_pay'];
          $package->email_pay = $request['email_pay'];
          $package->files_pay = $input['imagename'];
          $package->save();

    }

    $the_id = $package->id;
    $pay = pay_order::find($the_id);



    // send email
        $details = array();
      //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
        date_default_timezone_set("Asia/Bangkok");
        $details['name_pay'] = $pay->name_pay;
        $details['phone_pay'] = $pay->phone_pay;
        $details['no_pay'] = $pay->no_pay;
        $details['money_pay'] = $pay->money_pay;
        $details['bank'] = $pay->bank;
        $details['day_pay'] = $pay->day_pay;
        $details['time_pay'] = $pay->time_pay;
        $details['message_pay'] = $pay->message_pay;
        $details['files_pay'] = $pay->files_pay;
        $details['email_pay'] = $pay->email_pay;
        

        \Mail::to($pay->email_pay)->send(new \App\Mail\ConFirmPay($details));


        $message = "แจ้งชำระเงินโดย ".$pay->name_pay.", ข้อมูลผู้ติดต่อ : ".$pay->phone_pay.", ".$pay->email_pay." หมายเลขสั่งซื้อ : ".$pay->no_pay." จำนวนเงิน : ".$pay->money_pay;
        $lineapi = env('line_token');
        

        $mms =  trim($message);
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if(curl_error($chOne)){
        echo 'error:' . curl_error($chOne);
        }else{
        $result_ = json_decode($result, true);
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);
        

    return redirect(url('success_payment/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

  }

  public function success_payment(){

    return view('success_payment');

  }

  public function product($id){

     //dd(Session::get('cart'));

     $cart = Session::get('cart');

     //dd($cart['2']);


     $gallery1 = DB::table('pro_images')
            ->where('product_id', $id)
            ->get();

            $home_image_count = DB::table('pro_images')
                   ->where('product_id', $id)
                   ->count();

     $data['home_image'] = $gallery1;
     $data['home_image_all'] = $gallery1;
     $data['home_image_count'] = $home_image_count;

     $product = DB::table('products')->select(
           'products.*',
           'products.id as idp',
           'products.detail as detailss',
           'categories.*'
           )
           ->leftjoin('categories', 'categories.id',  'products.cat_id')
           ->where('products.status', 1)
           ->where('products.id', $id)
           ->first();

           $data['product'] = $product;
           return view('product', $data);

  }


  public function add_session_value(Request $request){

    $id = $request->input('product_id');
    $quantity = $request->input('quantity');

  $product = DB::select('select * from products where id='.$id);
  $cart = Session::get('cart');

  $cart[$product[0]->id] = array(
      "id" => $product[0]->id,
      "name_product" => $product[0]->name_pro,
      "price" => $product[0]->price,
      "image" => $product[0]->image_pro,
      "qty" => $quantity,
      "shipping_price" => $product[0]->shipping_price,
  );

  Session::put('cart', $cart);


  return redirect(url('product/'.$id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

  //  dd(Session::get('cart'));
    // return redirect(url('booking_cars'));
  }


  public function deleteCart($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back();
    }


    public function buy_item(Request $request){

      $id = $request->input('product_id');
      $quantity = $request->input('quantity');

    $product = DB::select('select * from products where id='.$id);
    $cart = Session::get('cart');
    $cart[$product[0]->id] = array(
        "id" => $product[0]->id,
        "name_product" => $product[0]->name_pro,
        "price" => $product[0]->price,
        "image" => $product[0]->image_pro,
        "qty" => $quantity,
        "shipping_price" => $product[0]->shipping_price,
    );

    Session::put('cart', $cart);


    return redirect(url('cart/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    //  dd(Session::get('cart'));
      // return redirect(url('booking_cars'));
    }

    public function cart(){

      return view('cart');
 
    }


    public function updateCart(Request $request)
    {
      $id = $request->input('id');
      $quantity = $request->input('quantity');
      //dd($id);
      $cart = Session::get('cart');

      if ($quantity > 0) {
            $cart[$id]['qty'] = $quantity;
        } else {
            unset($cart[$id]);
        }




      Session::put('cart', $cart);
    return redirect()->back();

    }

    public function payment(){

      $provinces = DB::table('provinces')->get();
      $data['provinces'] = $provinces;
      return view('payment', $data);
 
    }



    public function add_order(Request $request){



      $this->validate($request, [
              'name_order' => 'required',
              'lastname_order' => 'required',
              'email_order' => 'required',
              'telephone_order' => 'required',
              'country_order' => 'required',
              'postal_code_order' => 'required',
              'street_order' => 'required',
              'total' => 'required',
              'shipping_price' => 'required',
              'policy_terms' => 'required'
          ]);
 
          $package = new order();
          $package->user_id = Auth::user()->id;
          $package->name_order = $request['name_order'];
          $package->lastname_order = $request['lastname_order'];
          $package->email_order = $request['email_order'];
          $package->telephone_order = $request['telephone_order'];
          $package->country_order = $request['country_order'];
          $package->postal_code_order = $request['postal_code_order'];
          $package->street_order = $request['street_order'];
          $package->total = $request['total'];
          $package->shipping_price = $request['shipping_price'];
          $package->save();
 
          $the_id = $package->id;
 
          $cart = Session::get('cart');
 
          foreach ($cart as $product_item){
 
            $obj = new order_detail();
            $obj->user_id = Auth::user()->id;
            $obj->order_id = $the_id;
            $obj->product_id = $product_item['id'];
            $obj->product_image = $product_item['image'];
            $obj->product_name = $product_item['name_product'];
            $obj->product_total = $product_item['qty'];
            $obj->product_price = $product_item['price'];
            $obj->save();
          }
 
          $bank = bank::all();
 
 
          $order = DB::table('orders')->select(
                 'orders.*'
                 )
                 ->where('id', $the_id)
                 ->first();
 
                 $order_detail = DB::table('order_details')->select(
                        'order_details.*'
                        )
                        ->where('order_id', $the_id)
                        ->get();
 
                     //   dd($order_detail);
 
          $data['bank'] = $bank;
         $data['order'] = $order;
         $data['order_detai1'] = $order_detail;
 
 
         // send email
             $data_toview = array();
             $data_toview['data'] = $order;
             $data_toview['bank'] = $bank;
             $data_toview['order_detai1'] = $order_detail;
             $data_toview['datatime'] = date("d-m-Y H:i:s");

             \Mail::to($package->email_order)->send(new \App\Mail\Pay($data_toview));
 
 
 
         unset($cart);
         session()->forget('cart');
 
         return view('confirmation', $data);
    }




}
