<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clients extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'contact', 'email'];

    protected $searchableFields = ['*'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
