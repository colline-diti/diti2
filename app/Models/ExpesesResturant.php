<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpesesResturant extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['particulars', 'quantity', 'rate', 'ammount'];

    protected $searchableFields = ['*'];

    public function pettyCash()
    {
        return $this->hasOne(PettyCash::class);
    }
}
