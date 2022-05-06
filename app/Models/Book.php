<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'id' ,'title', 'author', 'available', 'user_id'
    ];
    /**
     * @var int|mixed
     */
    private $user_id;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }
}
