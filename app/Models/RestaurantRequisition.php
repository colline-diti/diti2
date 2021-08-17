<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantRequisition extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'item_name',
        'quantity',
        'dateofDelivery',
        'status',
        'Particulars',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'restaurant_requisitions';
}
