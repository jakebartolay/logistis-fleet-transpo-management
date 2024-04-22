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
    <h4>Create Schedule</h4>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">Create Schedule</div>
                    <div class="card-body">
                        <form action="{{ route('saveSchedule') }}" method="POST" class="browser-default-validation">
                            @csrf
                            <div id="placeInfo">

                                @php
                                    $selectedOrderIds = [];
                                @endphp

                                <div class="mb-3">
                                    <label for="order" class="form-label">Select Order(s)</label>
                                    <select id="order" name="order[]" class="form-select" onchange="showOrder()">
                                        <option value="">Select an Order</option>
                                        @foreach ($delivery as $data)
                                            @if (!in_array($data->id, $selectedOrderIds))
                                                <option value="{{ $data->id }}">Order {{ $data->id }} -
                                                    {{ $data->contact_person }} - {{ $data->shipping_address }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div id="selectedOrders">
                                            <!-- Selected orders will be displayed here -->
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var selectedOrders = [];
                                    var selectedOrderIds = [];

                                    function showOrder() {
                                        var selectBox = document.getElementById("order");
                                        var selectedOption = selectBox.options[selectBox.selectedIndex];
                                        var selectedValue = selectedOption.text;
                                        var selectedId = selectedOption.value;

                                        // Check if the order has already been selected
                                        if (!selectedOrderIds.includes(selectedId)) {
                                            selectedOrders.push(selectedValue);
                                            selectedOrderIds.push(selectedId);

                                            // Clear the previously displayed orders
                                            document.getElementById("selectedOrders").innerHTML = "";

                                            // Display all selected orders
                                            for (var i = 0; i < selectedOrders.length; i++) {
                                                var orderDiv = document.createElement("div");
                                                orderDiv.classList.add("selected-order", "d-flex", "justify-content-between", "align-items-center");

                                                var orderText = document.createElement("span");
                                                orderText.innerHTML = selectedOrders[i];
                                                orderDiv.appendChild(orderText);

                                                var cancelButton = document.createElement("button");
                                                cancelButton.innerHTML = "x";
                                                cancelButton.classList.add("btn", "btn-danger", "btn-sm");
                                                cancelButton.setAttribute("onclick", "cancelOrder(" + i + ")");
                                                orderDiv.appendChild(cancelButton);

                                                document.getElementById("selectedOrders").appendChild(orderDiv);
                                            }

                                            // Remove the selected option from the dropdown
                                            selectedOption.remove();
                                        } else {
                                            alert("This order has already been selected.");
                                        }
                                    }

                                    function cancelOrder(index) {
                                        var orderId = selectedOrderIds[index];
                                        var orderText = selectedOrders[index];
                                        var selectBox = document.getElementById("order");
                                        var option = document.createElement("option");
                                        option.value = orderId;
                                        option.text = orderText;
                                        selectBox.appendChild(option);

                                        selectedOrders.splice(index, 1);
                                        selectedOrderIds.splice(index, 1);

                                        document.getElementById("selectedOrders").innerHTML = "";

                                        for (var i = 0; i < selectedOrders.length; i++) {
                                            var orderDiv = document.createElement("div");
                                            orderDiv.classList.add("selected-order", "d-flex", "justify-content-between", "align-items-center");

                                            var orderText = document.createElement("span");
                                            orderText.innerHTML = selectedOrders[i];
                                            orderDiv.appendChild(orderText);

                                            var cancelButton = document.createElement("button");
                                            cancelButton.innerHTML = "X";
                                            cancelButton.classList.add("btn", "btn-danger", "btn-sm");
                                            cancelButton.setAttribute("onclick", "cancelOrder(" + i + ")");
                                            orderDiv.appendChild(cancelButton);

                                            document.getElementById("selectedOrders").appendChild(orderDiv);
                                        }
                                    }
                                </script>




                                <div class="mb-3">
                                    <label for="route" class="form-label">Select Route</label>
                                    <select id="route" name="route" class="form-select">
                                        @foreach ($routes as $route)
                                            <option value="{{ $route->id }}">{{ $route->route_name }} -
                                                {{ $route->status }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="multicol-language">Assign Operator</label>

                                    <select id="operator" class="select2 form-select">
                                        @if ($operators->isNotEmpty())
                                            @foreach ($operators as $operator)
                                                <option value="{{ $operator->id }}">{{ $operator->vehicle_type }} -
                                                    {{ $operator->firstname }} {{ $operator->lastname }}</option>
                                            @endforeach
                                        @else
                                            <option selected>No operator found</option>
                                        @endif
                                    </select>

                                </div>


                                <div class="mb-3">
                                    <label for="shipment_date">Shipment Date</label>
                                    <input type="date" name="shipment_date" class="form-control" id="shipment_date"
                                        required required>
                                </div>

                                <script>
                                    // Get the current date in the format "YYYY-MM-DD"
                                    var currentDate = new Date().toISOString().split('T')[0];

                                    // Set the max attribute to the current date
                                    document.getElementById('shipment_date').setAttribute('min', currentDate);
                                </script>


                            </div>
                            <!-- Submit Button -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-2" id="saveSchedule">
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
    <div class="d-inline-block ml-3">
        <a href="order-and-routes" target="_blank">See Orders and Routes</a>
    </div>

    {{-- <!-- Add Schedule Modal -->
    <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Assign Operator</h3>
                        <p class="text-muted">Please assign operator</p>
                    </div>
                    <form id="addNewCCForm" class="row g-3">
                        <div class="col-12">
                            <label class="col-sm-3 col-form-label" for="multicol-language">Operator</label>
                            <div class="col-sm-9">
                                <select id="operator" class="select2 form-select">
                                    @if ($operators->isNotEmpty())
                                        @foreach ($operators as $operator)
                                            <option value="{{ $operator->id }}">{{ $operator->vehicle_type }} -
                                                {{ $operator->firstname }} {{ $operator->lastname }}</option>
                                        @endforeach
                                    @else
                                        <option selected>No operator found</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary btn-md me-sm-3 me-1 badge">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-md btn-reset badge"
                                data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


@endsection
