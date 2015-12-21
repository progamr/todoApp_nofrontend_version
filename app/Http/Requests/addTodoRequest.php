<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 11/08/15
 * Time: 02:26 م
 */

namespace App\Http\Requests;
use App\Http\Requests\Request;


class addTodoRequest extends Request {


    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules= [
            'title' =>'required',
            'body'    =>'required',
        ];

        return $rules;


    }

}