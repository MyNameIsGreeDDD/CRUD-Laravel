@extends('layout')
@section('title','Обновить продукт '.$product->product)
@section('content')
    <form method="POST" action="{{route('products.update',$product)}}">
        @csrf
        @method( 'PUT')
        <div class="row">
            <div class="col">
                <input name="product" type="text" class="form-control"
                       placeholder="{{$product->product}}"
                       aria-label="product">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Обновить</button>
            </div>
        </div>
    </form>
@endsection
