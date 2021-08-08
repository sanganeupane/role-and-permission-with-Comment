@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            {{--            <div class="container mt-5">--}}
            <div class="row">
                <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                    <div class="col-12">
                        <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Invoice</h3>
                        <hr>
                    </div>

                    <form action="{{route('addInvoice')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-6">


                            <div class="col-md-10 mt-3">
                                <label for="company_name">Company Name</label>
                                <a style="color:red;">{{$errors->first('company_name')}}</a>
                                <input type="text" name="company_name" class="form-control"
                                       placeholder="Your  company name " id="company_name"
                                       value="{{old('company_name')}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="name">Name</label>
                                <a style="color:red;">{{$errors->first('name')}}</a>
                                <input type="text" name="name" class="form-control" placeholder="Your  name " id="name"
                                       value="{{old('name')}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="contact">Contact</label>
                                <a style="color:red;">{{$errors->first('contact')}}</a>
                                <input type="number" name="contact" class="form-control"
                                       placeholder="Enter contact number " id="contact" value="{{old('contact')}}">
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="address">Address </label>
                                <a style="color:red;">{{$errors->first('address')}}</a>
                                <input type="text" name="address" class="form-control" placeholder=" Enter  address "
                                       id="address" value="{{old('address')}}">
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="zip_code">Zip Code </label>
                                <a style="color:red;">{{$errors->first('zip_code')}}</a>
                                <input type="number" name="zip_code" class="form-control" placeholder="Enter zip code "
                                       id="zip_code" value="{{old('zip_code')}}">
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="location">Location</label>
                                <a style="color:red;">{{$errors->first('location')}}</a>
                                <input type="text" name="location" class="form-control" placeholder="Enter location"
                                       id="location" value="{{old('location')}}">
                            </div>


                            <div class="col-md-12 mt-3">
                                <label for="descriptions">Descriptions</label>
                                <a style="color:red;">{{$errors->first('descriptions')}}</a>
                                <textarea type="text" name="descriptions" class="form-control"
                                          placeholder="Enter descriptions" id="descriptions"
                                          value="{{old('descriptions')}}"></textarea>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="service"> Service </label>
                                <a style="color:red;">{{$errors->first('service')}}</a>
                                <input type="text" name="service" class="form-control" placeholder="Enter service"
                                       id="service" value="{{old('service')}}">
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="quantity"> Quantity </label>
                                <a style="color:red;">{{$errors->first('quantity')}}</a>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity"
                                       id="quantity" value="{{old('quantity')}}">
                            </div>


                            <div class="col-md-4 mt-3">
                                <label for="rate"> Rate </label>
                                <a style="color:red;">{{$errors->first('rate')}}</a>
                                <input type="number" name="rate" class="form-control" placeholder="Enter rate" id="rate"
                                       value="{{old('rate')}}">
                            </div>


                            <div class="col-12 mt-4">
                                <button class="btn btn-primary float-end">Submit</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
