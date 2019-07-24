<?php

namespace App;

use App\subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $with = ['subcategories'];

	public function subcategories()
	{
		return $this->belongsToMany(subcategory::class);
	}
}
