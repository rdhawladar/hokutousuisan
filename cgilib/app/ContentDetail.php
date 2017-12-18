<?php
namespace App;

use Illuminate\Database\Eloquent\Model;



class ContentDetail extends Model
{
    protected $table = "content_detail";
	protected $fillable = [ 'id'  ,'title'  , 'content_page' ,'created_at'  , 'updated_at'  ]; 
	 
}
