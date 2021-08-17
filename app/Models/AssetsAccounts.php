<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetsAccounts extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'asset_name',
        'quantity',
        'supplier',
        'price',
        'asset_types_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'assets_accounts';

    public function assetTypes()
    {
        return $this->belongsTo(AssetTypes::class);
    }
}
