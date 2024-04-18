<!-- Edit User Modal -->
<div class="modal fade" id="add-vehicle" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <form action="">
                    <h3>Fill Out Vehicle Information</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="vehicle-id">Vehicle ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="vehicle-id" name="vehicle-id"
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
                                document.getElementById("vehicle-id").value = randomId;
                            });
                        </script>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="vehicle-type">Vehicle Type</label>
                            <select class="form-select" name="vehicle-type" id="vehicle-type">
                                <option value="">Select Vehicle Type</option>
                                <option value="car">Car</option>
                                <option value="motorcycle">Motorcycle</option>
                                <option value="truck">Truck</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="vehicle-brand">Vehicle Brand</label>
                            <input type="text" class="form-control" name="vehicle-brand">
                        </div>



                        <div class="col-md-3">
                            <label for="year-model">Year Model</label>
                            <input type="text" name="year-model"class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label for="plate-number">Plate Number</label>
                            <input type="text" name="plate-number" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="engine-no">Engine Number</label>
                            <input type="text" name="engine-no" class="form-control">

                        </div>

                        <div class="col-md-3">
                            <label for="chassis-no">Chassis Number</label>
                            <input type="text" class="form-control" name="chassis-no">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="load-capacity"Load Capacity>Load Capacity</label>
                            <input type="number" name="load-capacity" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">Available</option>
                                <option value="">Unavailable</option>

                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="vehicle-image">Vehicle Image</label>
                            <input type="file" class="form-control" name="Vehicle Image"
                                placeholder="Upload Vehicle Photo">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn btn-facebook">Add Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edit User Modal -->
