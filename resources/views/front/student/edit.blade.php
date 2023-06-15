@extends('front.master')

@section('title')
    Edit Student
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit Student</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="text-success text-center "> {{ Session::has('success') ? Session::get('success') : '' }} </h6>
                            <form action="{{ route('student.update', ['id' => $student->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Student Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Student Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Student Mobile</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4">Student Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control">
                                        <img src="{{ asset($student->image) }}" alt="" style="height: 60px"/>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit"  class="btn btn-success" value="Update Student" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
