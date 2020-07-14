<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Ticket extends Model
{
    use Translatable;
    public $useTranslationFallback = true;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable=['name','status','deadline'];
    protected $table='tickets';
    public function user(){
        return $this->belongsTo(User::class,'ticket_id');
    }

}//end of model
