@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">

        <section class="content-header">
            <h1>
                Add leads Details
                <a href="{{route('show-company')}}">
                    <button class="btn btn-info"><i class="fa fa-eye"></i> Show-Leads</button>

                </a>
                <hr>
            </h1>

        </section>
        <section class="content">
            <div class="row">
                {{--                <div class="col-md-12">--}}
                {{--                    <div class="box-body">--}}
                {{--                        <div class="row">--}}
                {{--                            <div class="col-md-8">--}}
                @include('backend.admin.layouts.message')


                <form action="{{route('addCompanyAction')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="companyname">Company Name</label>
                            <a style="color:red;">{{$errors->first('companyname')}}</a>
                            <input type="text" name="companyname" class="form-control"
                                   placeholder="companyname"
                                   value="{{old('companyname')}}" id="companyname">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <a style="color:red;">{{$errors->first('name')}}</a>
                            <input type="text" name="name" class="form-control"
                                   placeholder="Enter name" value="{{old('name')}}"
                                   id="name">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <a style="color:red;">{{$errors->first('address')}}</a>
                            <input type="text" name="address" class="form-control"
                                   placeholder="Enter address" value="{{old('address')}}"
                                   id="address">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="username">Username</label>
                            <a style="color:red;">{{$errors->first('username')}}</a>
                            <input type="text" name="username" class="form-control"
                                   placeholder="Enter username" value="{{old('username')}}"
                                   id="username">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <a style="color:red;">{{$errors->first('email')}}</a>
                            <input type="text" name="email" class="form-control"
                                   placeholder="Enter your E-mail" value="{{old('email')}}"
                                   id="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone</label>
                            <a style="color:red;">{{$errors->first('phone')}}</a>
                            <input type="text" name="phone" class="form-control" placeholder="phone"
                                   value="{{old('phone')}}" id="phone">
                        </div>

                        {{--                                        <div class="form-group">--}}
                        {{--                                            <label for="service">Service-Type</label>--}}
                        {{--                                            <a style="color:red;">{{$errors->first('service')}}</a>--}}
                        {{--                                            <input type="service" name="service" class="form-control"--}}
                        {{--                                                   placeholder="enter service" value="{{old('service')}}"--}}
                        {{--                                                   id="service">--}}
                        {{--                                        </div>--}}
                        {{--                                        --}}
                        {{--                                        --}}


                        <div class="form-group col-md-5">
                            <label for="service">Service Type </label>
                            <a style="color:red;">{{$errors->first('service')}}</a>
                            <select name="service" id="service" value="" class="form-control"
                                    aria-label="Default select example">
                                <option disabled selected>---------Select service--------------</option>

                                @foreach($serviceData as $key=>$service)

                                    <option value="{{$service->service}}">{{$service->service}}</option>

                                @endforeach

                            </select>
                        </div>


                        {{--                                        <div class="form-group">--}}
                        {{--                                            <label for="deals">Deal-Stage</label>--}}
                        {{--                                            <a style="color:red;">{{$errors->first('deals')}}</a>--}}
                        {{--                                            <input type="deals" name="deals" class="form-control"--}}
                        {{--                                                   placeholder="Confirm deals" value="{{old('deals')}}"--}}
                        {{--                                                   id="deals">--}}
                        {{--                                        </div>--}}


                        <div class="form-group col-md-5">
                            <label for="deals">Deal-Stage </label>
                            <a style="color:red;">{{$errors->first('deals')}}</a>
                            <select name="deals" id="deals" class="form-control"
                                    aria-label="Default select example">
                                <option disabled selected>---------Select Deal stage----------</option>
                                <option value="communicationstage">Communication stage</option>
                                <option value="Followup">Follow up</option>
                                <option value="dealclosed">Deal closed</option>
                                <option value="dealcancelled">Deal cancelled</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="followup">Follow-up-date</label>
                            <a style="color:red;">{{$errors->first('followup')}}</a>
                            <input type="date" name="followup" class="form-control"
                                   placeholder="follow up"
                                   value="{{old('followup')}}" id="followup">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="handle">Handle_By</label>
                            <a style="color:red;">{{$errors->first('handle')}}</a>
                            <input type="text" name="handle" value="{{old('handle')}}"
                                   placeholder="handleBy" class="form-control" id="handle">
                        </div>


                        <div class="form-group col-md-8 ">
                            <button class="btn btn-primary">AddLeads</button>
                        </div>
                    </div>
                </form>

            </div>
        </section><!-- /.content -->


    </div>


@endsection
