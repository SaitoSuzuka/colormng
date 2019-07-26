<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExistsColor implements Rule
{

    protected $attributes = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {


        $user = Auth::user();
        $cnt = DB::table('colors')
        ->where('user_id', '=', $user->id)
        ->where('color_name', '=' , $value)
        ->where('delete_flg', '=', 0)
        ->count();

        $colors = $this->attributes;


        if($colors["color_name"] != $colors["color_name2"]){
            if($cnt > 0){
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            return TRUE;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'その名前は既に登録されています。';
    }
}
