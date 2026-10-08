<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    public const TYPE_ADJUSTMENT = 'adjustment';
    public const TYPE_RESERVATION = 'reservation';
    public const TYPE_RELEASE = 'release';
    public const TYPE_SALE = 'sale';
    public const TYPE_RETURN = 'return';

    protected $fillable = [
        'product_variant_id',
        'type',
        'quantity',
        'stock_after',
        'reference_type',
        'reference_id',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'stock_after' => 'integer',
        ];
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
