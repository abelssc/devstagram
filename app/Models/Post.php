<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'description',
        'imagen',
        'user_id',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class)->select('id', 'name', 'username');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(): HasMany{
        return $this->hasMany(Like::class);
    }
    public function checkLike(User $user){
        return $this->likes->contains('user_id',$user->id);
    }
}
