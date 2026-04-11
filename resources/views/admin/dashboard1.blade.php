@extends('admin.layout.app')

@section('content')

<div class="row g-4">

    {{-- Card 1 --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-box">
            <div class="card-body">
                <h6>Total Users</h6>
                <h3>120</h3>
                <small class="text-success">+12% increase</small>
            </div>
        </div>
    </div>

    {{-- Card 2 --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-box">
            <div class="card-body">
                <h6>Total Orders</h6>
                <h3>75</h3>
                <small class="text-success">+5% increase</small>
            </div>
        </div>
    </div>

    {{-- Card 3 --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-box">
            <div class="card-body">
                <h6>Revenue</h6>
                <h3>₹50,000</h3>
                <small class="text-danger">-2% decrease</small>
            </div>
        </div>
    </div>

    {{-- Card 4 --}}
    <div class="col-md-3">
        <div class="card shadow-sm card-box">
            <div class="card-body">
                <h6>Pending Tasks</h6>
                <h3>8</h3>
                <small class="text-warning">Need attention</small>
            </div>
        </div>
    </div>

</div>

{{-- Table Section --}}
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h5>Recent Users</h5>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mohit</td>
                    <td>mohit@mail.com</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Rahul</td>
                    <td>rahul@mail.com</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>

        </table>

    </div>
</div>

@endsection