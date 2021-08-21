<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['unit_name', 'unit_description'];

    protected $searchableFields = ['*'];

    public function stockTables()
    {
        return $this->hasMany(StockTable::class);
    }

    public function stockDischarges()
    {
        return $this->hasMany(StockDischarge::class);
    }
}
