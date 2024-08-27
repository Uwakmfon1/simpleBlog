@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-3xl font-bold">Dashboard</h1>
        <br>
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body text-xl font-bold">Signed Up Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div><a href="{{ route('fetchTotalUsers') }}" class="font-bold"> {{ count( $totalUsers ) }}</a></div>

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="ml-12">
            <table class="table-auto space-x-4">
                <thead >
                    <tr class="border-red-500  space-x-4">
                        <th>User ID</th>
                        <th class="mr-4">Name</th>
                        <th>Email Address</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($totalUsers as $totalUser)
                    <tr class="space-x-4">
                        <td>{{ $totalUser->id }}</td>
                        <td>{{ $totalUser->first_name }} {{ $totalUser->last_name }}</td>
                        <td>{{ $totalUser->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endsection
    </div>
