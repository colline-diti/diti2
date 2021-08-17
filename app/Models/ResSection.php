<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResSection extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['section_name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'res_sections';

    public function stockDischarges()
    {
        return $this->hasMany(StockDischarge::class);
    }
}
