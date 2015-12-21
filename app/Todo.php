<?php
/**
 * Created by PhpStorm.
 * User: shiftdeveloper
 * Date: 16/12/15
 * Time: 10:43 ص
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $fillable = ['title', 'body'];

}