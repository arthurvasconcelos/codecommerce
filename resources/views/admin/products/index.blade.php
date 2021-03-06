@extends('admin.template')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-default">New product</a>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Recommend</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ str_limit($product->description, $limit=100, $end = '...') }}</td>
                        <td>$ {{ $product->price }}</td>
                        <td>
                            @if($product->featured)
                                <i class="glyphicon glyphicon-ok"></i>
                            @else
                                <i class="glyphicon glyphicon-remove"></i>
                            @endif
                        </td>
                        <td>
                            @if($product->recommend)
                                <i class="glyphicon glyphicon-ok"></i>
                            @else
                                <i class="glyphicon glyphicon-remove"></i>
                            @endif
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', ['id'=>$product->id]) }}"
                               title="View product: {{ $product->name }}"
                               class="glyphicon glyphicon-eye-open"></a> |
                            <a href="{{ route('admin.products.images', ['id'=>$product->id]) }}"
                               title="Go to images"
                               class="glyphicon glyphicon-picture"></a> |
                            <a href="{{ route('admin.products.edit', ['id'=>$product->id]) }}"
                               title="Edit product: {{ $product->name }}"
                               class="glyphicon glyphicon-edit"></a> |
                            <a href="{{ route('admin.products.destroy', ['id'=>$product->id]) }}"
                               title="Delete product: {{ $product->name }}"
                               class="glyphicon glyphicon-trash"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}
    </div>
@endsection