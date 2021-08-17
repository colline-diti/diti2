<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResSalesTable extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['product_name', 'price', 'res_product_id'];

    protected $searchableFields = ['*'];

    protected $table = 'res_sales_tables';

    public function resProduct()
    {
        return $this->belongsTo(ResProduct::class);
    }
}
