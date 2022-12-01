<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Class Tag
 * @package App\Models
 * @version December 1, 2022, 4:59 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property string $name
 * @property string $description
 */

class Tag extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'tags';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/

    public function articles()
    {
        return $this->belongsToMany(\App\Models\Article::class, 'article_tag');
    }
}
