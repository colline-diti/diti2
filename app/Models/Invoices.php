<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoices extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['clients_id', 'tax_rates_id'];

    protected $searchableFields = ['*'];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    public function taxRates()
    {
        return $this->belongsTo(TaxRates::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
