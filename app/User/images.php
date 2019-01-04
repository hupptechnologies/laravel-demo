<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class images extends Model
{

    use SoftDeletes;

    /**
     * The attribute indicates table name.
     *
     * @var array
     */protected $table ="images";
    protected $primaryKey='id';

    /**
     * The attribute guarded for arrays.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attribute used for soft delete.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
