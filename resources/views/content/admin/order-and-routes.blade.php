@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Order and Routes')

@include('layouts/notification')

@section('content')
    <div class="row">

        {{-- <div class="col-auto d-flex">
            <h3>Delivery List</h3>
        </div> --}}

        {{-- <div class="row"> --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="dataTables table">
                        <thead class="text-center">
                            <tr>
                                <th><strong> # </strong> </th>
                                <th><strong> Tracking ID </strong></th>
                                <th><strong> Name </strong> </th>
                                <th><strong> Contact # </strong></th>
                                <th><strong> Address </strong></th>
                                {{-- <th><strong> Product </strong></th>
                                <th><strong> Qty </strong></th>
                                <th><strong> Price </strong></th>
                                <th><strong> Date Shipped </strong></th>
                                <th><strong> Date Received </strong></th>

                                <th><strong> Status </strong></th> --}}
                                {{-- <th><strong> Action </strong></th>
                            <th><strong> </strong></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delivery as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->tracking_no }}</td>
                                    <td>{{ $data->contact_person }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->shipping_address }}</td>
                                    {{-- <td>{{ $data->product }}</td>
                                    <td>{{ $data->product_quantity }}</td>
                                    <td>{{ $data->product_price }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date_shipped)->format('M j, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date_received)->format('M j, Y') }}</td> --}}
                                    {{-- 
                                    <td>
                                        @if ($data->status === 'Pending')
                                            <span class="bg-secondary badge">Pending</span>
                                        @elseif ($data->status === 'Payment')
                                            <span class="bg-primary badge">Payment</span>
                                        @elseif ($data->status === 'Procured')
                                            <span class="bg-success badge">Procured</span>
                                        @elseif ($data->status === 'Requested')
                                            <span class="bg-warning badge">Requested</span>
                                        @elseif ($data->status === 'Completed')
                                            <span class="bg-success badge">Completed</span>
                                        @else
                                            <span class="bg-secondary badge">{{ $data->status }}</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td><a class="btn btn-sm btn-primary badge"
                                        href="{{ route('add.schedule', $data->id) }}">Schedule</a></td>
                                <td>
                                    <input type="checkbox" name="example_checkbox" id="example_checkbox">
                                    <label for="example_checkbox"></label>
                                </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $delivery->links() }}
                    </div>
                </div>
            </div>
        </div>

        {{-- <br>

        <div class="col-auto d-flex">
            <h3>Routes List</h3>
        </div> --}}

        {{-- <div class="row"> --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="dataTables table">
                        <thead class="text-center">
                            <tr>
                                <th><strong> Route # </strong> </th>
                                <th><strong> Start </strong></th>
                                <th><strong> Waypoints </strong> </th>
                                <th><strong> End </strong></th>
                                {{-- <th><strong> Distance </strong></th>
                                <th><strong> Status </strong></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($routes as $route)
                                <tr>
                                    <td>{{ $route->id }}</td>
                                    <td>{{ $route->start_point }}</td>
                                    <td>{{ $route->waypoints }}</td>
                                    <td>{{ $route->end_point }}</td>
                                    {{-- <td>{{ $route->distance }}</td>

                                    <td>
                                        @if ($route->status === 'Pending')
                                            <span class="bg-secondary badge">Pending</span>
                                        @elseif ($route->status === 'Payment')
                                            <span class="bg-primary badge">Payment</span>
                                        @elseif ($route->status === 'Procured')
                                            <span class="bg-success badge">Procured</span>
                                        @elseif ($route->status === 'Requested')
                                            <span class="bg-warning badge">Requested</span>
                                        @elseif ($route->status === 'Completed')
                                            <span class="bg-success badge">Completed</span>
                                        @else
                                            <span class="bg-secondary badge">{{ $route->status }}</span>
                                        @endif
                                    </td> --}}
                                    {{-- <td><a class="btn btn-sm btn-primary badge"
                                        href="{{ route('add.schedule', $data->id) }}">Schedule</a></td>
                                <td>
                                    <input type="checkbox" name="example_checkbox" id="example_checkbox">
                                    <label for="example_checkbox"></label>
                                </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $routes->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
