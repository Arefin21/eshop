<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductWish extends Model {
    use HasFactory;
    protected $fillable = ['product_id', 'user_id'];

    public function product(): BelongsTo {
        return $this->belonsTO(Product::class);
    }
}
