<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\text_setting;

class TextSettingController extends Controller
{
    //
    public function set_text(){

      $text = DB::table('text_settings')->select(
          'text_settings.*'
          )
          ->where('id', 1)
          ->first();

          $id = 1;

          $data['url'] = url('admin/set_text/'.$id);
          $data['method'] = "post";
          $data['objs'] = $text;
          $data['datahead'] = "แก้ไข ข้อความหน้าแรก";
          return view('admin.text_setting.index', $data);
    }


    public function up_set_text(Request $request, $id){


          $package = text_setting::find($id);
          $package->title_text_t = $request['title_text_t'];
          $package->sub_title_text_t = $request['sub_title_text_t'];
          $package->title_text_e = $request['title_text_e'];
          $package->sub_title_text_e = $request['sub_title_text_e'];
          $package->title_text_c = $request['title_text_c'];
          $package->sub_title_text_c = $request['sub_title_text_c'];
          $package->save();

          return redirect(url('admin/set_text/'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


}
