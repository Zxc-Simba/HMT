<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductRatingResource;
use App\Http\Resources\RatingListResource;
use App\Models\Product;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Получить рейтинг товара
     *
     * @param int $productId - id товара
     * @return ProductRatingResource
     */
    public function getProductById(int $productId)
    {
        $product = Product::find($productId);
        return new ProductRatingResource($product);
    }

    /**
     * Получить рейтинг товара
     *
     * @param int $minRating - минимальный рейтинг товара
     * @param string $sort - тип сортировки
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getProductRatingList(int $minRating, string $sort)
    {
       $productRating = ProductRating::where('rating', '>=', $minRating)->orderBy('rating', $sort)->get();
       return RatingListResource::collection($productRating);
    }

    /**
     * Получить список отзывов авторизованного пользователя
     *
     * @return void
     */
    public function getAuthUserRatings()
    {
        $userAuthId = Auth::id();
        $reviews = ProductRating::where('user_id', $userAuthId)->get();
        return $reviews;
    }
}
