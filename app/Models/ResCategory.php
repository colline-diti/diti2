<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name','description'];

    protected $searchableFields = ['*'];

    protected $table = 'res_categories';

    public function resProducts()
    {
        return $this->hasMany(ResProduct::class);
    }
}
