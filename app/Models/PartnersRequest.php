<?php

namespace App\Models;

use App\Models\Traits\Attributes\FaqAttributes;
use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnersRequest extends BaseModel
{
    use ModelAttributes, SoftDeletes, FaqAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'heading', 'localization','images','deleted_at'];
}
