<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockTable extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'item_name',
        'quantity',
        'unit',
        'buying_price',
        'item_category_id',
        'remarks',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'stock_tables';

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function stockDischarges()
    {
        return $this->hasMany(StockDischarge::class);
    }
}
