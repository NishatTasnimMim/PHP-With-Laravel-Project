@extends('front.master')

@section('title')
    Home Page
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">All Students</h2>
                    <div class="row mt-5">
                        @foreach($students as $student)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset($student->image) }}" alt="" style="height: 400px" class="card-img-top"/>
                                <div class="card-body">
                                    <h3>{{$student->name}}</h3>
                                    <p>Number: {{$student->phone}}</p>
                                    <a href="{{ route('student.details', ['id' => $student->id]) }}" class="btn btn-outline-primary float-end rounded-0">View</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
