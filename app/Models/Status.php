<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Class Status
 * @package App\Models
 * @version December 1, 2022, 5:00 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property string $name
 * @property string $description
 */

class Status extends \Illuminate\Database\Eloquent\Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'statuses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /*
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /*
     * Validation rules
     *
     * @var array
     */

    public static $rules = [
        'name' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /*
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/

    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'status_id');
    }
}
