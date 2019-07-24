<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{

	protected $fillable= ['name','info'];
	
	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
}
