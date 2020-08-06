@extends('layouts.app')

@section('content')
    <div class="flex flex-col mb-10">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 bg-white">
                <form action="/sales" method="post">
                    @csrf
                    <div class="flex p-4">
                        <div class="flex items-center md:mr-6">
                            <label class="flex-shrink-0 block uppercase tracking-wide text-gray-700 text-xs font-bold mr-2" for="grid-first-name">
                                Customers
                            </label>
                            <select name="customers" class="rounded-md border-gray-100 border shadow-sm w-full py-2 px-4 focus:outline-none">
                                <option value="">Please select a customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}" {{request('customers') == $customer->id ? 'selected' : ''}}>{{$customer->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center md:mr-6">
                            <label class="flex-shrink-0 block uppercase tracking-wide text-gray-700 text-xs font-bold mr-2" for="grid-first-name">
                                Employees
                            </label>
                            <select name="employees" class="rounded-md border-gray-100 border shadow-sm w-full py-2 px-4 focus:outline-none">
                                <option value="">Please select a employee</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" {{request('employees') == $employee->id ? 'selected' : ''}}>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input class="px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500  transition duration-150 ease-in-out md:py-0 md:text-lg md:px-6 focus:outline-none" type="submit">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Sales Rep
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Products
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Total
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sales as $sale)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-s text-sm leading-5 text-gray-900">
                                    {{$sale->employee->name}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                                    {{$sale->customer->full_name}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                                    {{$sale->products->pluck('name')->implode(',')}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                                    ${{$sale->total}}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                                    {{$sale->date->format('d-m-Y')}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    {{$sales->links('pagination::tailwind')}}
                </div>
            </div>
        </div>
    </div>

@endsection
