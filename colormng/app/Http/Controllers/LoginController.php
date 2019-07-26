<?php

namespace App\Http\Controllers;

use App\Image;
use App\Hue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    private $image_list = array(
        'images' =>'',
        'hues'=>'',
        /*
         * ↓manage.bladeに変数として使用しているので
         * 'undifind'にならないよう空でセット
         */
        'color_list' =>array(),

        'color_name' =>"",
        'division' =>"",
        'color_code'=> "",
        'image_div'=> "",
        'hue_div'=> "",
        'image_word'=> "",
        'hue_word'=> "",
        'gradation'=> "",
        'memo'=> "",
        'date_to'=> "",
        'date_from'=> "",

        "checked" =>"",

    );


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //プルダウンメニューの値
        $this->image_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->image_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();

        $user = Auth::user(); //<-すべてのカラムが取得された

        //DBから値を取得する
        $color = DB::table('colors as c');
        $color->select('c.color_id', 'c.color_name' , 'c.division' ,
            'c.color1' , 'c.color2' , 'c.color3' , 'c.color4' , 'c.color5' , 'c.color6' ,
            'c.image_div' , 'c.hue_div' , 'c.gradation');
        $color->join('images as i', 'c.image_div' , '=' , 'i.image_div');
        $color->join('hues as h', 'c.hue_div' , '=' , 'h.hue_div');
        $color->addSelect('i.image_word' , 'h.hue_word');
        $color->where('c.user_id', '=', $user->id);
        $color->where('c.delete_flg', '=', 0);

        $color->orderBy('c.created_at' , 'desc');

        $this->image_list['color_list'] = $color->paginate(10);



        return view('colorManage', $this->image_list);
    }
}
