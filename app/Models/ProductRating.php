<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductRating extends Model
{
    use HasFactory;

    /**
     * Получить пользователя создавшего отзыв
     *
     * @return belongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить продукт на котором отсавлен отзыв
     *
     * @return belongsTo
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
