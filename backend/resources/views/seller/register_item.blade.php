@extends('layouts.app')

@section('content')
<section class="l-content-expanded" id="upload-image">
    <h1 class="h1_title">商品画像アップロード</h1>
    <form action="/user/register-product/1" enctype="multipart/form-data" method="POST">
        {{-- <form action="/register-item/{{ $user->id }}" enctype="multipart/form-data" method="POST"> --}}
        @csrf

        <div class="upload-image-container pt-5 pb-5">
            <div class="store-selection mb-3">
                <label for="storeId" class="col-form-label seletcion-title">出品店の選択</label>
                <select name="storeId" id="storeId" class="upload-selection">
                    <option value="">---</option>
                    <option value="1">出品店１</option>
                    <option value="2">出品店２</option>
                    <option value="3">出品店３</option>
                    <option value="4">出品店４</option>
                </select>

                @error('storeId')
                <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="image-section">
                {{-- 画像アップロード用Vueコンポーネント --}}
                <upload-image></upload-image>

                @error('image')
                <strong>{{ $message }}</strong>
                @enderror
            </div>

            <div class="row pt-4">
                <button class="btn save-button">画像を保存する</button>
            </div>
        </div>
    </form>
</section>
@endsection