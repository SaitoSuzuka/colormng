<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hue;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Color;
use App\Rules\ExistsColor;
use Illuminate\Support\Facades\Input;

class ColorEditController extends Controller
{

    private $color_list = array(
        "color_name" => "",
        "color_name2" => "",
        "division"=> "2",
        "color1" => "#ffffff",
        "color2" => "#ffffff",
        "color3" => "#ffffff",
        "color4" => "#ffffff",
        "color5" => "#ffffff",
        "color6" => "#ffffff",
        "image_div" => "",
        "hue_div" => "",
        "gradation" => "",
        "memo" => "",

        'color_code'=> "",

        "heading" =>"",
        "sub" => "",
        "title" =>"",
        "action" =>"",
        "button" =>"",
        "disabled" =>"",
        "job" =>"",

        "page"=>"1",

        "date_at" =>"",
        "date_to" =>"",

        "checked" =>"",

        "images" => "",
        "hues" => "",
        "color_list"=> array(),

        "color_id" => "",

    );


    /**
     * 編集画面表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dispColorEdit(){

        //共通部品
        $this->color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();
        $this->color_list['heading'] = "Make Your Colros";
        $this->color_list['sub'] = "　― 配色を作成 ―";
        $this->color_list['title'] = "配色を作成";
        $this->color_list['action'] = "/makecolor";
        $this->color_list['button'] = "登録";
        $this->color_list['job'] = "1";

        return view('colorEdit', $this->color_list);
    }


    /**
     * 更新画面表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dispUpdateColor(Request $request){

        //共通部品
        $this->color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();
        $this->color_list['heading'] = "Edit Your Colros";
        $this->color_list['sub'] = "　― 作成した配色を変更 ―";
        $this->color_list['title'] = "配色を編集";
        $this->color_list['action'] = "/updatecolor";
        $this->color_list['button'] = "更新";
        $this->color_list['job'] = "2";



        $session = $request->getSession();
        $this->color_list['color_id'] =$request->get("color_id");
        $session->put("color_id" , $this->color_list['color_id']);

        $this->color_list['gradation'] =$request->get("gradation");

        if($this->color_list['gradation'] == 0){
            $this->color_list['checked'] = "checked";
        }

        $color = Color::where('color_id', '=', $this->color_list['color_id'])->first();
        $this->color_list['color_name'] = $color->color_name;
        $this->color_list['color_name2'] = $color->color_name;
        $this->color_list['division'] = $color->division;
        $this->color_list['color1'] = $color->color1;
        $this->color_list['color2'] = $color->color2;
        $this->color_list['color3'] = $color->color3;
        $this->color_list['color4'] = $color->color4;
        $this->color_list['color5'] = $color->color5;
        $this->color_list['color6'] = $color->color6;
        $this->color_list['image_div'] = $color->image_div;
        $this->color_list['hue_div'] = $color->hue_div;
        $this->color_list['memo'] = $color->memo;


        //フィールドに値をセット


        return view('colorEdit', $this->color_list);
    }


    /**
     * 削除画面表示
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dispDeleteColor (Request $request){
        $this->color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();
        $this->color_list['title'] = "DeleteColors";
        $this->color_list['action'] = "/deletecolor";
        $this->color_list['button'] = "削除";

        return view('colorEdit', $this->color_list);
    }


    /**
     * 新規作成(insert -> colors table)
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public  function makeColor(Request $request){

        //共通部品
        $this->color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();
        $this->color_list['heading'] = "Make Your Colros";
        $this->color_list['sub'] = "　― 配色を作成 ―";
        $this->color_list['title'] = "配色を作成";
        $this->color_list['action'] = "/makecolor";
        $this->color_list['button'] = "登録";
        $this->color_list['job'] = "1";

        /*
         * gradationのチェックボックスの値は 'on' or ''で返ってくる。
         * ので、分岐をさせて gradation_flgという形で、0 or 1をに変換する。
         */
        if($request->get('gradation') == 'on'){
            $grd = 1;
        } else {
            $grd = 0;
        };

        //フィールドにリクエストの値を保持させる
        $this->color_list['color_name'] = $request->get('color_name');
        $this->color_list['division'] = $request->get('division');
        $this->color_list['color1'] = $request->get('color1');
        $this->color_list['color2'] = $request->get('color2');
        $this->color_list['color3'] = $request->get('color3');
        $this->color_list['color4'] = $request->get('color4');
        $this->color_list['color5'] = $request->get('color5');
        $this->color_list['color6'] = $request->get('color6');
        $this->color_list['image_div'] = $request->get('image_div');
        $this->color_list['hue_div'] = $request->get('hue_div');
        if($request->get('gradation') == 'on'){
            $this->color_list['checked'] = "checked";
        }


        //ログイン情報をAuthから取得(Login者のみの)
        $user = Auth::user(); //<-すべてのカラムが取得された

        //チェック
        $validator = Validator::make($request->all(),
            [
                'division' => 'required',
                'color_name' => ['required','max:30', new ExistsColor($request->all())],
                'image_div' => 'required',
                'hue_div' => 'required'
            ]
        );

        if ($validator->fails()){
            return view('/colorEdit', $this->color_list)->withErrors($validator);
        }


        //insert
        $color = new Color();
        $color -> user_id = $user->id;
        $color -> color_name = $request -> color_name;
        $color -> division = $request -> division;
        $color -> color1 = $request -> color1;
        $color -> color2 = $request -> color2;
        if($request->get('division') == 3){
            $color -> color3 = $request -> color3;
        } else if($request->get('division') == 4){
            $color -> color3 = $request -> color3;
            $color -> color4 = $request -> color4;
        } else if($request->get('division') == 5){
            $color -> color3 = $request -> color3;
            $color -> color4 = $request -> color4;
            $color -> color5 = $request -> color5;
        } else if($request->get('division') == 6){
            $color -> color3 = $request -> color3;
            $color -> color4 = $request -> color4;
            $color -> color5 = $request -> color5;
            $color -> color6 = $request -> color6;
        }
        $color -> image_div = $request -> image_div;
        $color -> hue_div = $request -> hue_div;
        $color -> gradation =$grd;
        $color -> memo = $request -> memo;
        $color -> delete_flg = 0;
        $color -> created_by = $user->name;
        $color -> updated_by = $user->name;

        $color ->save();


        self::showColorList($request);

        return view('colorManage',$this->color_list);
    }


    /**
     * 更新処理（update）
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function updateColor(Request $request){

        //共通部品
        $this->color_list['images'] = Image::select(['image_word' , 'image_div'])->get();
        $this->color_list['hues'] = Hue::select(['hue_div' , 'hue_word'])->get();
        $this->color_list['heading'] = "Edit Your Colros";
        $this->color_list['sub'] = "　― 作成した配色を変更 ―";
        $this->color_list['title'] = "配色を編集";
        $this->color_list['action'] = "/updatecolor";
        $this->color_list['button'] = "更新";
        $this->color_list['job'] = "2";


        $session = $request->getSession();
        $this->color_list['color_id'] = $session->get("color_id");


        /*
         * gradationのチェックボックスの値は 'on' or ''で返ってくる。
         * ので、分岐をさせて gradation_flgという形で、0 or 1をに変換する。
         */
        if($request->get('gradation') == 'on'){
            $grd = 0;
            $this->color_list['checked'] = "checked";
        } else {
            $grd = 1;
        };

        $color = Color::where('color_id', '=', $this->color_list['color_id'])->first();

        //フィールドにセット
        $this->color_list['color_name'] = $request->get("color_name");
        $this->color_list['color_name2'] = $color->color_name; //DBの値をセット
        $this->color_list['division'] = $request->get("division");
        $this->color_list['color1'] = $request->get("color1");
        $this->color_list['color2'] = $request->get("color2");
        $this->color_list['color3'] = $request->get("color3");
        $this->color_list['color4'] = $request->get("color4");
        $this->color_list['color5'] = $request->get("color5");
        $this->color_list['color6'] = $request->get("color6");
        $this->color_list['image_div'] = $request->get("image_div");
        $this->color_list['hue_div'] = $request->get("hue_div");
        $this->color_list['memo'] = $request->get("memo");


        //チェック
        $validator = Validator::make($request->all(),
            [
                'division' => 'required',
                //一意のカラム=color_nameがDBにあるか
                'color_name' => ['required','max:30', new ExistsColor($request->all())],
                'image_div' => 'required',
                'hue_div' => 'required',
            ]
        );


        if ($validator->fails()){
            return view('/colorEdit', $this->color_list)->withErrors($validator);
        }

        $colorUpdate = Color::where('color_id', '=', $this->color_list['color_id']);

        $colorUpdate->update([
            'color_name' => $request->get("color_name"),
            'division' => $request->get("division"),
            'color1' => $request->get("color1"),
            'color2' => $request->get("color2"),
            'color3' => $request->get("color3"),
            'color4' => $request->get("color4"),
            'color5' => $request->get("color5"),
            'color6' => $request->get("color6"),
            'image_div' => $request->get("image_div"),
            'hue_div' => $request->get("hue_div"),
            'gradation' => $grd,
            'memo' => $request->get("memo"),
        ]);

        self::showColorList($request);
        return view('colorManage',$this->color_list);
    }



    public function deleteColor(Request $request) {

        $session = $request->getSession();
        $this->color_list['color_id'] =$request->get("color_id");
        $session->put("color_id" , $this->color_list['color_id']);

        $colorUpdate = Color::where('color_id', '=', $this->color_list['color_id']);

        $colorUpdate->update([
            'delete_flg' =>1,
        ]);

        self::showColorList($request);
        return view('colorManage',$this->color_list);
    }



    //リスト表示の関数
    public function showColorList(Request $request){


        $session = $request->getSession();

        //プルダウンメニューの情報
        $this->color_list['images'] = Image::select('image_word' , 'image_div')->get();
        $this->color_list['hues'] = Hue::select('hue_div' , 'hue_word')->get();

        $color_list = $session->get("color_list");

        //フィールドに値を持たせる
        $this->color_list['page'] = $color_list['page'];
        $this->color_list['color_name'] = $color_list['color_name'];
        $this->color_list['division'] = $color_list['division'];
        $this->color_list['color_code'] = $color_list['color_code'];
        $this->color_list['image_div'] = $color_list['image_div'];
        $this->color_list['hue_div'] = $color_list['hue_div'];
        $this->color_list['checked'] = $color_list['checked'];
        $this->color_list['date_from'] = $color_list['date_from'];
        $this->color_list['date_to'] = $color_list['date_to'];

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
        if($this->color_list['color_name'] !=""){
            $color->where('color_name' , 'like' , '%'.$this->color_list['color_name'].'%');
        }

        //登録日
        //date_from
        if($this->color_list['date_from'] !=""){
            $color->where('c.created_at' , '>=' , $this->color_list['date_from'] . " 00:00:00");
        }
        //date_to
        if($this->color_list['date_to'] !=""){
            $color->where('c.created_at' , '<=' , $this->color_list['date_to'] . " 23:59:59");
        }

        //イメージ
        if($this->color_list['image_div'] !=""){
            $color->where('c.image_div' , '=' , $this->color_list['image_div']);
        }

        //色相
        if($this->color_list['hue_div'] !=""){
            $color->where('c.hue_div' , '=' , $this->color_list['hue_div']);
        }

        //分割数
        if($this->color_list['division'] !=""){
            $color->where('c.division' , '=' , $this->color_list['division']);
        }

        //カラーコード
        if($this->color_list['color_code'] !=""){
            $color->where(function($color){
                $color->orwhere('c.color1' , '=' , $this->color_list['color_code']);
                $color->orwhere('c.color2' , '=' , $this->color_list['color_code']);
                $color->orwhere('c.color3' , '=' , $this->color_list['color_code']);
                $color->orwhere('c.color4' , '=' , $this->color_list['color_code']);
                $color->orwhere('c.color5' , '=' , $this->color_list['color_code']);
                $color->orwhere('c.color6' , '=' , $this->color_list['color_code']);
            });
        }

        //グラデーション
        if($this->color_list['gradation'] !=""){
            $color->where('c.gradation' , '=' , 1);
        }

        //order by（登録日が新しい順）
        $color->orderBy('c.created_at' , 'desc');

        //ページネーション（10レコード文の値をget）
        //フィールドの"color_lis"t配列にDBの値を代入
        $this->color_list['color_list'] = $color->paginate(10);

    }
}
