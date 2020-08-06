@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Sales Rep</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{$sale->id}}</td>
                <td>{{$sale->employee->name}}</td>
                <td>{{$sale->customer->full_name}}</td>
                <td>${{$sale->total}}</td>
                <td>{{$sale->date}}</td>
                <td><a href="#">View Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$sales->links()}}
@endsection