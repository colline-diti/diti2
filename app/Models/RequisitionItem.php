<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequisitionItem extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'restaurant_requisition_id'];

    protected $searchableFields = ['*'];

    protected $table = 'requisition_items';

    public function requisitionDeliveries()
    {
        return $this->hasMany(RequisitionDelivery::class);
    }

    public function restaurantRequisition()
    {
        return $this->belongsTo(RestaurantRequisition::class);
    }
}
