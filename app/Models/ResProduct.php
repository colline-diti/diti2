<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResProduct extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_name',
        'product_price',    
        'res_category_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'res_products';

    public function resSalesTables()
    {
        return $this->hasMany(ResSalesTable::class);
    }

    public function resCategory()
    {
        return $this->belongsTo(ResCategory::class);
    }
}
