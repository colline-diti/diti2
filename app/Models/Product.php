<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['product_name', 'unit_cost', 'invoices_id'];

    protected $searchableFields = ['*'];

    public function allProductParticulars()
    {
        return $this->hasMany(ProductParticulars::class);
    }

    public function invoices()
    {
        return $this->belongsTo(Invoices::class);
    }
}
