@extends('layout')
@section('title','Создать продукт')
@section('content')


    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="row">
            <div class="col">
                <input name="product" type="text" class="form-control"
                       placeholder="product"
                       aria-label="product">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </form>
@endsection
