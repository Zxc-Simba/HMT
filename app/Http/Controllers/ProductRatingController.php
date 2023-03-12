<?php

namespace App\Http\Controllers;

use App\Jobs\CreateLogJob;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRatingController extends Controller
{
    /**
     * Создать отзыв
     *
     * @param Request $request
     */
    public function createReview(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $productRating = new ProductRating();
            $productRating->product_id = $request->product_id;
            $productRating->user_id = $userId;
            $productRating->rating = $request->rating;
            $productRating->review = $request->review;
            dispatch(new CreateLogJob($request));
            $productRating->save();
            return response('OK', 200);
        }
        return abort(401);
    }

    /**
     * Редактировать отзыв
     *
     * @param Request $request
     */
    public function editReview(Request $request)
    {
        if (!Auth::check()) {
            return abort(401);
        }
        $product = ProductRating::find($request->product_rating_id);
        if ($product->user_id === Auth::id()) {
            $product->update($request->all());
            return response('OK', 200);
        }
    }

    /**
     * Удалить отзыв
     *
     * @param int $productRatingId - id отзыва
     */
    public function deleteReview(int $productRatingId)
    {
        if (!Auth::check()) {
            return abort(401);
        }
        $product = ProductRating::find($productRatingId);
        if ($product->user_id === Auth::id()) {
            $product->delete();
            return response('OK', 200);
        }
    }
}
