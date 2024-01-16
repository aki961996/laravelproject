<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "tag",
        "company",
        "location",
        "email",
        "website",
        "logo",
        "description"
    ];

    public static function find($id)
    {
        // $id = decrypt($id);
        $listings = Listing::all();
        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }

    //filtering
    public function scopeFilter($query, array $filters)
    {
        // dd(request(['tag']));
        // dd($filters['tag']);
        //This part is attempting to access the 'search' key in the $filters array. If the 'search' key exists, it will return its value; otherwise, it will result in null.s
        if ($filters['tag'] ?? false) {
            $query->where('tag', 'like', '%' . request('tag') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tag', 'like', '%' . request('search') . '%')
                ->orWhere('company', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%');
        }
    }
}
