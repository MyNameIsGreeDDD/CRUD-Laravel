@extends('layout')
@section('title','Продукты')
@section('content')
    @can('is-seller')
        <a class="btn btn-primary" role="button" href="{{ route('products.create') }}">Добавить продукт</a>
    @endcan
    @can('not-seller')
        <a href="{{route('users.setRole',Auth::user())}}"> Cтать продавцом</a>
    @endcan

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">Продукты</th>
            <th scope="col">Имя продовца</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    <a href="{{route('products.show', $product->user_id)}}">{{ $product->product }}</a>
                </td>
                <td>
                    <a>{{ $product->getUserNameById($product->user_id) }}</a>
                </td>
                <td>

                    @can('update-delete-product',$product)
                        <form method="POST" action="{{route('products.destroy',$product)}}">
                            <a type="button" class="btn btn-warning"
                               href="{{route('products.edit', $product->user_id)}}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    @endcan

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
