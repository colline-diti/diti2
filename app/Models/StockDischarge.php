<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockDischarge extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quantity_issued',
        'stock_table_id',
        'unit_id',
        'res_section_id',
        'return_date',
        'remarks',
        'issued_by',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'stock_discharges';

    protected $casts = [
        'return_date' => 'date',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function resSection()
    {
        return $this->belongsTo(ResSection::class);
    }

    public function stockTable()
    {
        return $this->belongsTo(StockTable::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
