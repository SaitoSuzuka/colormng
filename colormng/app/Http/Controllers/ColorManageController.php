<?php

namespace App\Http\Controllers;

use App\Hue;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColorManageController extends Controller
{

    private $show_color_list = array(

        'images' =>'',
        'hues'=>'',

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

        "page" => "1",
        "color_list"=> array(),

        'color_id' =>"",

    );

    /**
     * カラーリストの表示（検索ボタン押下 and ページネーション押下）
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function showList(Request $request)
    {
        $session = $request->getSession();

        //プルダウンメニューの情報
        $this->show_color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->show_color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();

        if(!empty($_GET['page'])){ //ページネーションが押下されたら
            $this->show_color_list['page'] = $_GET['page'];
            $session->put('color_list' , $this->show_color_list);
        }else{ //検索ボタンが押されたら
            //フィールドに値を持たせる
            $this->show_color_list['color_name'] = $request->get("color_name");
            $this->show_color_list['division'] = $request->get("division");
            $this->show_color_list['color_code'] = $request->get("color_code");
            $this->show_color_list['image_div'] = $request->get("image_div");
            $this->show_color_list['hue_div'] = $request->get("hue_div");
            if($request->get('gradation') == 'on'){
                $this->show_color_list['checked'] = "checked";
                $this->show_color_list['gradation'] = 1;
            }
            $this->show_color_list['date_from'] = $request->get("date_from");
            $this->show_color_list['date_to'] = $request->get("date_to");
            $session->put("color_list",$this->show_color_list);
        }

        $user = Auth::user();

        //DBから値を取得する
        $color = DB::table('colors as c');
        $color->select('c.color_id', 'c.color_name' , 'c.division' ,
            'c.color1' , 'c.color2' , 'c.color3' , 'c.color4' , 'c.color5' , 'c.color6' ,
            'c.image_div' , 'c.hue_div' , 'c.gradation');
        $color->join('images as i', 'c.image_div' , '=' , 'i.image_div');
        $color->join('hues as h', 'c.hue_div' , '=' , 'h.hue_div');
        $color->addSelect('i.image_word' , 'h.hue_word');
        $color->where('c.user_id', '=', $user->id)->where('c.delete_flg', '=', 0);


        //検索項目に入力がされていたら
        //名前
        if($this->show_color_list['color_name'] !=""){
            $color->where('color_name' , 'like' , '%'.$this->show_color_list['color_name'].'%');
        }

        //登録日
        //date_from
        if($this->show_color_list['date_from'] !=""){
            $color->where('c.created_at' , '>=' , $this->show_color_list['date_from'] . " 00:00:00");
        }
        //date_to
        if($this->show_color_list['date_to'] !=""){
            $color->where('c.created_at' , '<=' , $this->show_color_list['date_to'] . " 23:59:59");
        }

        //イメージ
        if($this->show_color_list['image_div'] !=""){
            $color->where('c.image_div' , '=' , $this->show_color_list['image_div']);
        }

        //色相
        if($this->show_color_list['hue_div'] !=""){
            $color->where('c.hue_div' , '=' , $this->show_color_list['hue_div']);
        }

        //分割数
        if($this->show_color_list['division'] !=""){
            $color->where('c.division' , '=' , $this->show_color_list['division']);
        }

        //カラーコード
        if($this->show_color_list['color_code'] !=""){
            $color->where(function($color){
                $color->orwhere('c.color1' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color2' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color3' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color4' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color5' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color6' , '=' , $this->show_color_list['color_code']);
            });
        }

        //グラデーション
        if($this->show_color_list['gradation'] !=""){
            $color->where('c.gradation' , '=' , 1);
        }

        //order by（登録日が新しい純）
        $color->orderBy('c.created_at' , 'desc');

        //ページネーション（25レコード文の値をget）
        //フィールドの"color_lis"t配列にDBの値を代入
        $this->show_color_list['color_list'] = $color->paginate(10);

        return view('colorManage',$this->show_color_list);
    }

    /***
     * フォームの値をリセット
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function reset(Request $request){

        //共通部品
        $this->show_color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->show_color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();

        $this->show_color_list['color_name'] = "";
        $this->show_color_list['division'] = "";
        $this->show_color_list['color_code'] = "";
        $this->show_color_list['image_div'] = "";
        $this->show_color_list['hue_div'] = "";
        $this->show_color_list['checked'] = "";
        $this->show_color_list['date_from'] = "";
        $this->show_color_list['date_to'] = "";

        $session = $request->getSession();
        $session->put("color_list", $this->show_color_list);

        $user = Auth::user();
        //DBから値を取得する
        $color = DB::table('colors as c');
        $color->select('c.color_id', 'c.color_name' , 'c.division' ,
            'c.color1' , 'c.color2' , 'c.color3' , 'c.color4' , 'c.color5' , 'c.color6' ,
            'c.image_div' , 'c.hue_div' , 'c.gradation');
        $color->join('images as i', 'c.image_div' , '=' , 'i.image_div');
        $color->join('hues as h', 'c.hue_div' , '=' , 'h.hue_div');
        $color->addSelect('i.image_word' , 'h.hue_word');
        $color->where('c.user_id', '=', $user->id);
        $color->where('c.delete_flg', '=',0);

        $color->orderBy('c.created_at' , 'desc');
        $this->show_color_list['color_list'] = $color->paginate(10);


        return view('colorManage',$this->show_color_list);
    }

    /***
     * キャンセルボタン押下
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function cancel(Request $request){
        $session = $request->getSession();

        //共通部品
        $this->show_color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->show_color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();

        $color_list = $session->get("color_list");

        //フィールドに値を持たせる
        $this->show_color_list['color_name'] = $color_list['color_name'];
        $this->show_color_list['division'] = $color_list['division'];
        $this->show_color_list['color_code'] = $color_list['color_code'];
        $this->show_color_list['image_div'] = $color_list['image_div'];
        $this->show_color_list['hue_div'] = $color_list['hue_div'];
        $this->show_color_list['checked'] = $color_list['checked'];
        $this->show_color_list['date_from'] = $color_list['date_from'];
        $this->show_color_list['date_to'] = $color_list['date_to'];

        $user = Auth::user();
        //DBから値を取得する
        $color = DB::table('colors as c');
        $color->select('c.color_id', 'c.color_name' , 'c.division' ,
            'c.color1' , 'c.color2' , 'c.color3' , 'c.color4' , 'c.color5' , 'c.color6' ,
            'c.image_div' , 'c.hue_div' , 'c.gradation');
        $color->join('images as i', 'c.image_div' , '=' , 'i.image_div');
        $color->join('hues as h', 'c.hue_div' , '=' , 'h.hue_div');
        $color->addSelect('i.image_word' , 'h.hue_word');
        $color->where('c.user_id', '=', $user->id);
        $color->where('c.delete_flg', '=',0);

        //検索項目に入力がされていたら
        //名前
        if($this->show_color_list['color_name'] !=""){
            $color->where('color_name' , 'like' , '%'.$this->show_color_list['color_name'].'%');
        }

        //登録日
        //date_from
        if($this->show_color_list['date_from'] !=""){
            $color->where('c.created_at' , '>=' , $this->show_color_list['date_from'] . " 00:00:00");
        }
        //date_to
        if($this->show_color_list['date_to'] !=""){
            $color->where('c.created_at' , '<=' , $this->show_color_list['date_to'] . " 23:59:59");
        }

        //イメージ
        if($this->show_color_list['image_div'] !=""){
            $color->where('c.image_div' , '=' , $this->show_color_list['image_div']);
        }

        //色相
        if($this->show_color_list['hue_div'] !=""){
            $color->where('c.hue_div' , '=' , $this->show_color_list['hue_div']);
        }

        //分割数
        if($this->show_color_list['division'] !=""){
            $color->where('c.division' , '=' , $this->show_color_list['division']);
        }

        //カラーコード
        if($this->show_color_list['color_code'] !=""){
            $color->where(function($color){
                $color->orwhere('c.color1' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color2' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color3' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color4' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color5' , '=' , $this->show_color_list['color_code']);
                $color->orwhere('c.color6' , '=' , $this->show_color_list['color_code']);
            });
        }

        //グラデーション
        if($this->show_color_list['gradation'] !=""){
            $color->where('c.gradation' , '=' , 1);
        }

        //order by（登録日が新しい順）
        $color->orderBy('c.created_at' , 'desc');

        //ページネーション（10レコード文の値をget）
        //フィールドの"color_list"配列にDBの値を代入
        $this->show_color_list['color_list'] = $color->paginate(10);

        if($this->show_color_list['page'] ==0){
            return redirect("/search");
        }else{
            return redirect("/search?page=" . $this->show_color_list['page']);
        }

//         return view('colorManage',$this->show_color_list);
    }
}
