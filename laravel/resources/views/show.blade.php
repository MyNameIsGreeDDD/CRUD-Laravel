@extends('layout')
@section('title','Продукт'.$product->product)
@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('products.index') }}">Вернуться к продукту</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Продукт: {{$product->product}}</li>
            <li class="list-group-item">Имя продовца: {{$product->getUserNameById($product->user_id)}}</li>
        </ul>
    </div>
    @can(['is-seller','update-delete-product'],$product)
        <form method="POST" action="{{route('products.destroy',$product)}}">
            <a type="button" class="btn btn-warning"
               href="{{route('products.edit', $product->user_id)}}">Редактировать</a>
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    @endcan
    <a> Купить</a>
@endsection
