@extends('layouts.app')

@section('content')
    <form action="/dashboard" method="get">
        <input type="text" name="start_date" value="{{ request('start_date') }}">
        <input type="text" name="end_date" value="{{ request('end_date') }}">
        <input type="submit">
    </form>
    <bar-chart :chartdata="{{collect($chartData)->toJson()}}" />
@endsection