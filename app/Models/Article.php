<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * Class Article
 * @package App\Models
 * @version December 1, 2022, 5:00 pm UTC
 *
 * @property \App\Models\Status $status
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $tags
 * @property integer $status_id
 * @property integer $user_id
 * @property string $title
 * @property string $announce
 * @property string $content
 */

class Article extends \Illuminate\Database\Eloquent\Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'articles';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'status_id',
        'user_id',
        'title',
        'announce',
        'content'
    ];

    /*
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'announce' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status_id' => 'required',
        'user_id' => 'required',
        'title' => 'string|max:256',
        'announce' => 'string',
        'content' => 'string',
        'tags' => 'nullable|array',
//        'file'=>"required|max:2048",
        'file' => 'nullable',
        'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /*
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id');
    }

    /*
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /*
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'article_tag');
    }
}
