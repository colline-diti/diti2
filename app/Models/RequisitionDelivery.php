<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequisitionDelivery extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'item_quantity',
        'delivery_date',
        'remarks',
        'requisition_item_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'requisition_deliveries';

    protected $casts = [
        'delivery_date' => 'date',
    ];

    public function requisitionItem()
    {
        return $this->belongsTo(RequisitionItem::class);
    }
}
