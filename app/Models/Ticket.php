<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use \Dimsav\Translatable\Translatable;
    public $translatedAttributes = ['name'];

    protected $fillable=['name','status','deadline'];
    protected $table='tickets';
    public function user(){
        return $this->belongsTo(User::class,'ticket_id');
    }

}//end of model
