@extends('layouts.admin')

@section('title', 'San pham')
@section('page_heading', 'San pham')

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ten san pham</th>
                <th>Gia</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products ?? [] as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['price'] }}</td>
                </tr>
            @empty
                @for($i = 0; $i < 4; $i++)
                    <tr>
                        <td><div class="skeleton" style="width: 30px;"></div></td>
                        <td><div class="skeleton" style="width: 200px;"></div></td>
                        <td><div class="skeleton" style="width: 80px;"></div></td>
                    </tr>
                @endfor
            @endforelse
        </tbody>
    </table>
</div>
@endsection