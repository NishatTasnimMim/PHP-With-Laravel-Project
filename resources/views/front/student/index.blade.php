@extends('front.master')

@section('title')
    Manage Students
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Manage Students</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="text-success text-center "> {{ Session::has('success') ? Session::get('success') : '' }} </h6>
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>

                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>
                                                <img src="{{ asset($student->image) }}" alt="" style="height:60px" />
                                            </td>
                                            <td>
                                                <a href="{{ route('student.edit', ['id' => $student->id]) }}" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                                <a href="{{ route('student.destroy', ['id' => $student->id]) }}" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm rounded-0">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

