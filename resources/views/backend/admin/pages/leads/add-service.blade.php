@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            {{--            <div class="container mt-5">--}}
            <div class="row">
                <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                    <div class="col-12">
                        <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Add Service</h3>
                    </div>
                    @include('backend.admin.layouts.message')

                    <form action="{{route('addServiceAction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-6">
                            <div class="col-md-6 mt-3">
                                <label for="service">Service</label>
                                <a style="color:red;">{{$errors->first('service')}}</a>
                                <input type="text" name="service" class="form-control" placeholder="First service"
                                       id="service" value="{{old('service')}}">
                            </div>

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary float-end">AddService</button>
                            </div>
                        </div>
                    </form>





                    <hr>

                    <div class="row g-6">

                        <h3>show service</h3>
                        <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Services</th>

                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($serviceData as $key=>$service)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$service->service}}</td>

                                    <td>

                                            <a href="{{route('editService').'/'.$service->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>

                                            <a href="{{route('deleteServiceAction').'/'.$service->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    {{$serviceData->links()}}
                    </div>

                </div>
            </div>
        </section>
    </div>

@endsection
