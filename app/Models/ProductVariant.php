<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'sku',
        'options',
        'price_cents',
        'compare_at_price_cents',
        'stock_on_hand',
        'stock_reserved',
        'track_inventory',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
            'price_cents' => 'integer',
            'compare_at_price_cents' => 'integer',
            'stock_on_hand' => 'integer',
            'stock_reserved' => 'integer',
            'track_inventory' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function availableStock(): int
    {
        return max(0, $this->stock_on_hand - $this->stock_reserved);
    }
}
