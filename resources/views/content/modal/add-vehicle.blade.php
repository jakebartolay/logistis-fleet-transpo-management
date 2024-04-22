<!-- Edit User Modal -->
<div class="modal fade" id="add-vehicle" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <form action="{{ route('addVehicle') }}" method="post">
                    @csrf
                    <h3>Fill Out Vehicle Information</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="vehicle_id">Vehicle ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="vehicle_id" name="vehicle_id"
                                    placeholder="Vehicle ID" readonly>
                            </div>
                        </div>

                        <div class="col-md-2 mt-4">
                            <button type="button" class="btn btn-primary" id="generate-id">Generate</button>
                        </div>
                        <script>
                            document.getElementById("generate-id").addEventListener("click", function() {
                                // Generate a random 6-digit number
                                var randomId = Math.floor(100000 + Math.random() * 900000);

                                // Set the generated number to the input field
                                document.getElementById("vehicle_id").value = randomId;
                            });
                        </script>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="vehicle_type">Vehicle Type</label>
                            <select class="form-select" name="vehicle_type" id="vehicle_type">
                                <option value="">Select Vehicle Type</option>
                                <option value="Car">Car</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Truck">Truck</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="vehicle_brand">Vehicle Brand</label>
                            <input type="text" class="form-control" name="vehicle_brand">
                        </div>

                        <div class="col-md-3">
                            <label for="year_model">Year Model</label>
                            <input type="text" name="year_model" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="plate_number">Plate Number</label>
                            <input type="text" name="plate_number" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="engine_number">Engine Number</label>
                            <input type="text" name="engine_number" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="chassis_number">Chassis Number</label>
                            <input type="text" class="form-control" name="chassis_number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="load_capacity">Load Capacity</label>
                            <input type="number" name="load_capacity" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn btn-facebook">Add Vehicle</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
