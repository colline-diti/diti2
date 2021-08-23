<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxRates extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['tax_name', 'rate'];

    protected $searchableFields = ['*'];

    protected $table = 'tax_rates';

    public function allInvoices()
    {
        return $this->hasMany(Invoices::class);
    }
}
