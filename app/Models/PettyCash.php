<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PettyCash extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'details',
        'debit',
        'credit',
        'expeses_resturant_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'petty_cashes';

    public function expesesResturant()
    {
        return $this->belongsTo(Expeses_Resturant::class);
    }
}
