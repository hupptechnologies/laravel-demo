<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class ImageRelation extends Model
{

    /**
     * The attribute indicates table name.
     *
     * @var array
     */
    protected $table ="images_relation";
    protected $primaryKey='id';

    /**
     * The attribute guarded for arrays.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
