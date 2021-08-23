<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductParticulars extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['particulars', 'quantity', 'product_id'];

    protected $searchableFields = ['*'];

    protected $table = 'product_particulars';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
