<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_name',
        'unit_price',
        'total_price',
        'discounts',
        'clients_id',
        'payment_types_id',
    ];

    protected $searchableFields = ['*'];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    public function paymentTypes()
    {
        return $this->belongsTo(PaymentTypes::class);
    }
}
