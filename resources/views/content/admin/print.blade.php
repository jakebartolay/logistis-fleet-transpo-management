<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver's Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <img src="{{ asset('assets\img\logo\bbox-express-logo.png') }}" alt="logo" width="45" height="45"
            style="margin-top: 2px;" />
        <div style="display: flex; margin-left: 10px;">
            <h2>Bbox Express</h2>
        </div>
    </div>

    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <h1>Driver's Information</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive card-datatable">
                            <table class="table datatable-invoice border-top">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact No.</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        {{-- <th scope="col">Status</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drives as $driver)
                                        <tr>
                                            <th>{{ $driver->id }}</th>
                                            <td>{{ $driver->firstname }} {{ $driver->lastname }}</td>
                                            <td>{{ $driver->phone }}</td>
                                            <td>{{ $driver->address }}</td>
                                            <td>{{ $driver->email }}</td>
                                            {{-- <td>
                                                @if ($driver->status === 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @elseif ($driver->status === 'inactive')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Unknown</span>
                                                @endif
                                            </td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
