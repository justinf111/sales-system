@extends('layouts.app')

@section('content')
    <div class="flex flex-col mb-10">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 bg-white">
                <form action="/dashboard" method="post">
                    @csrf
                    <div class="flex p-4">
                        <div class="flex items-center md:mr-6">
                            <label class="flex-shrink-0 block uppercase tracking-wide text-gray-700 text-xs font-bold mr-2" for="grid-first-name">
                                Start Date
                            </label>
                            <input name="start_date" value="{{ request('start_date') }}" class="rounded-md border-gray-100 border shadow-sm w-full py-2 px-4 focus:outline-none " type="text">
                        </div>
                        <div class="flex items-center md:mr-6">
                            <label class="flex-shrink-0 block uppercase tracking-wide text-gray-700 text-xs font-bold mr-2" for="grid-first-name">
                                End Date
                            </label>
                            <input name="end_date" value="{{ request('end_date') }}" class="rounded-md border-gray-100 border shadow-sm w-full py-2 px-4 focus:outline-none" type="text">
                        </div>
                        <input class="px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500  transition duration-150 ease-in-out md:py-0 md:text-lg md:px-6 focus:outline-none" type="submit">
                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200 bg-white">
                <bar-chart class="p-8 pt-4" :chartdata="{{collect($chartData)->toJson()}}" />
            </div>
        </div>
    </div>
@endsection
