@extends('layouts.admin')

@section('title', 'Danh muc')
@section('page_heading', 'Danh muc')

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ten danh muc</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories ?? [] as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['name'] }}</td>
                </tr>
            @empty
                @for($i = 0; $i < 3; $i++)
                    <tr>
                        <td><div class="skeleton" style="width: 30px;"></div></td>
                        <td><div class="skeleton" style="width: 160px;"></div></td>
                    </tr>
                @endfor
            @endforelse
        </tbody>
    </table>
</div>
@endsection