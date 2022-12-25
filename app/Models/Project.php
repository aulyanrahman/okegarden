<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['status', 'author'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filter)
    {

        $query->when($filter['search'] ??  false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filter['status'] ??  false, function ($query, $status) {
            return $query->whereHas('status', function ($query) use ($status) {
                $query->where('slug', $status);
            });
        });

        $query->when(
            $filter['author'] ??  false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) =>
            $query->where('username', $author))
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
