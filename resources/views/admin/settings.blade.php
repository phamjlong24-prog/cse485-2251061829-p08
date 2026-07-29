@"
@extends('layouts.admin')

@section('title', 'Cai dat')
@section('page_heading', 'Cai dat he thong')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        <label>Ten cua hang</label><br>
        <input type="text" name="shop_name" value="{{ old('shop_name', 'MiniShop') }}"><br><br>
        <button class="btn" type="submit">Luu</button>
    </form>
</div>
@push('scripts')
<script>console.log('settings page loaded');</script>
@endpush
@endsection
"@ | Set-Content -Path resources\views\admin\settings.blade.php -Encoding UTF8