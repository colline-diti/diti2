<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantRequisition extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['requisition_code', 'status', 'Particulars'];

    protected $searchableFields = ['*'];

    protected $table = 'restaurant_requisitions';

    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class);
    }
}
