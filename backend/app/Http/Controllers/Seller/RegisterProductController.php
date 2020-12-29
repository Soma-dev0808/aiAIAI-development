<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RegisterProductController extends Controller
{
    public function __construct() {

    }
    
    public function index() {
        // UI レンダリング
        return view('seller.register_item');
    }

    public function store() {
        // バリデーション
        $data = request()->validate([
            "storeId" => "required",
            "image" => "required"
        ]);

        // Storage内に画像を保存
        $imagePath = request("image")->store("products", "public");

        // 画像リサイズ
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,800);

        // リサイズの保存
        $image->save();

        // UIへ戻る
        return redirect('/user/register-product');
    }
}
