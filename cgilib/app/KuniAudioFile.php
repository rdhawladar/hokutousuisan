<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class KuniAudioFile extends Model
{
    protected $table = "kuni_files";
	protected $fillable = [ 'id' ,'title' ,'rid' , 'created_at', 'updated_at'    ]; 
}