@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_heading', 'Tong quan')

@section('content')
    <div class="card">
        <h1>Chao mung den Admin Dashboard</h1>
        <p>San pham: {{ $stats['products'] }}</p>
        <p>Danh muc: {{ $stats['categories'] }}</p>
    </div>
    <div class="card">
        <a href="{{ route('admin.flash-demo') }}" class="btn">Test Flash Message</a>
    </div>
@endsection