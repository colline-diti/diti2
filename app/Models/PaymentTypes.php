<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentTypes extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['payment_name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'payment_types';
}
