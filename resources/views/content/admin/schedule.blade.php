@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Delivery Schedule')

@section('vendor-style')
    @vite(['resources/assets/vendor/libs/animate-css/animate.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.scss'])
@endsection

@section('vendor-script')
    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])
@endsection

@section('page-style')


@endsection

@section('content')

    <div class="row">
        <div class="col-auto d-flex">
            <h3>Delivery List</h3>
        </div>
        {{-- <div class="col d-flex justify-content-end" style="height:50px;">
            <a href=sorted-out class="btn btn-sm btn-primary">Sorted Out</a>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-lg-12">
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
                                <th><strong> Product </strong></th>
                                <th><strong> Qty </strong></th>
                                <th><strong> Price </strong></th>
                                <th><strong> Date Shipped </strong></th>
                                <th><strong> Date Received </strong></th>

                                <th><strong> Status </strong></th>
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
                                    <td>{{ $data->product }}</td>
                                    <td>{{ $data->product_quantity }}</td>
                                    <td>{{ $data->product_price }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date_shipped)->format('M j, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->date_received)->format('M j, Y') }}</td>

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
                                    </td>
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
    </div>
    <br>
    <h4>Create Schedule</h4>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Create Schedule</div>
                    <div class="card-body">
                        <form id="routeForm" action="/save-route" method="POST" class="browser-default-validation">
                            @csrf
                            <div id="placeInfo">


                                <div class="mb-3">
                                    <label for="order" class="form-label">Select Order(s):</label>
                                    <select id="order" name="order[]" class="form-select">
                                        <option value="order1">Order 1</option>
                                        <option value="order2">Order 2</option>
                                        <option value="order3">Order 3</option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        // Store selected options
                                        var selectedOptions = [];

                                        // Handle change event of the select element
                                        $('#order').change(function() {
                                            // Get selected option value
                                            var selectedValue = $(this).val();

                                            // Check if the option is already selected
                                            if (selectedOptions.includes(selectedValue)) {
                                                // If already selected, remove it from the array
                                                var index = selectedOptions.indexOf(selectedValue);
                                                selectedOptions.splice(index, 1);
                                            } else {
                                                // If not selected, add it to the array
                                                selectedOptions.push(selectedValue);
                                            }

                                            console.log(selectedOptions);
                                        });
                                    });
                                </script>


                                <div class="mb-3">
                                    <label for="route" class="form-label">Select Route:</label>
                                    <select id="route" name="route" class="form-select">
                                        <option value="route1">Route 1</option>
                                        <option value="route2">Route 2</option>
                                        <option value="route3">Route 3</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="driver" class="form-label">Select Driver:</label>
                                    <select id="driver" name="driver" class="form-select">
                                        <option value="driverA">Driver A</option>
                                        <option value="driverB">Driver B</option>
                                        <option value="driverC">Driver C</option>
                                    </select>
                                </div>



                                {{-- <div class="searchInput mb-3">
                                    <label for="loc3">ID:</label>
                                    <input type="text" name="searchbox" class="form-control" placeholder="Delivery ID"
                                        required>
                                </div> --}}


                                {{-- <div class="searchInput mb-3">
                                    <label for="loc3">Operator ID:</label>
                                    <input type="text" name="searchbox" class="form-control" placeholder="Driver Name"
                                        required>
                                </div> --}}


                                {{-- <div class="mb-3">
                                    <label for="route-name">Route Name:</label>
                                    <input type="text" name="route-name" id="route-name" class="form-control"
                                        placeholder="Enter a route name" required>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc1">Start:</label>
                                    <input type="text" name="searchbox" class="form-control"
                                        placeholder="Set start location" id="loc1" required>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc2">Waypoints: (Required)</label>
                                    <input type="text" name="searchbox" class="form-control"
                                        placeholder="Enter some waypoints" id="loc2">
                                    <div>
                                        <ul id="waypointsInfo" class="list-group list-group-timeline"></ul>
                                    </div>
                                </div>

                                <div class="searchInput mb-3">
                                    <label for="loc3">End:</label>
                                    <input type="text" name="searchbox" class="form-control"
                                        placeholder="Set end location" id="loc3" required>
                                </div> --}}

                                <div class="searchInput mb-3">
                                    <label for="shipment-date">Shipment Date:</label>
                                    <input type="date" name="shipment-date" class="form-control" id="shipment-date"
                                        required required>
                                </div>

                                <script>
                                    // Get the current date in the format "YYYY-MM-DD"
                                    var currentDate = new Date().toISOString().split('T')[0];

                                    // Set the max attribute to the current date
                                    document.getElementById('shipment-date').setAttribute('min', currentDate);
                                </script>


                            </div>
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2" id="saveRouteButton">
                                    <span class="tf-icons ti-xs ti ti-device-floppy me-1"></span>Save Schedule
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="card col-lg-8">
                <div class="card-header">Schedule List</div>
                <div class="card-body">

                    <table class="dataTables table">

                        <thead class="text-center">
                            <tr>
                                <th>Orders</th>
                                <th>Route</th>
                                <th>Driver</th>
                                <th>Shipment Date</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>


                    </table>

                    {{-- <a href="{{ url('/all-sched') }}">Show all schedule</a> --}}
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>




@endsection
