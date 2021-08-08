@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            {{--            <div class="container mt-5">--}}
            <div class="row">
                <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                    <div class="col-12">
                        <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Edit Service</h3>
                    </div>
                    @include('backend.admin.layouts.message')

                    <form action="{{route('editServiceAction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$serviceData->id}}">
                        <div class="row g-6">
                            <div class="col-md-6 mt-3">
                                <label for="service">Service</label>
                                <a style="color:red;">{{$errors->first('service')}}</a>
                                <input type="text" name="service" class="form-control" placeholder="First service"
                                       id="service" value="{{$serviceData->service}}">
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary float-end">AddService</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

