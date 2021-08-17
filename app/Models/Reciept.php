<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reciept extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quantity',
        'cash',
        'change',
        'balance',
        'total',
        'served_by',
        'res_product_id',
    ];

    protected $searchableFields = ['*'];

    public function resProduct()
    {
        return $this->belongsTo(ResProduct::class);
    }
}
