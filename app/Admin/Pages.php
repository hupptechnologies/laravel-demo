<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use SoftDeletes;

    /**
     * The attribute indicates table name.
     *
     * @var array
     */
	protected $table ="pages";
	protected $primaryKey='id';

    /**
     * The attribute guarded for arrays.
     *
     * @var array
     */
	protected $guarded = ['id'];

    /**
     * The attribute used fot soft delete.
     *
     * @var array
     */
	protected $dates = ['deleted_at'];
}