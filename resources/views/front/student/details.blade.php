@extends('front.master');

@section('title')
    Student Details
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ asset($student->image) }}" alt="" class="img-fluid w-100" />
                            </div>
                            <div class="col-md-7">
                                <h2>{{ $student->name }}</h2>
                                <p>Email: {{ $student->email }}</p>
                                <p>Phone: {{ $student->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
