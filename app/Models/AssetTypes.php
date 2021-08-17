<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetTypes extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'asset_types';

    public function allAssetsAccounts()
    {
        return $this->hasMany(AssetsAccounts::class);
    }
}
