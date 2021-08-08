@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            {{--            <div class="container mt-5">--}}
            <div class="row">
                <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                    <div class="col-12">
                        <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Edit Client registratioin form</h3><hr>
                    </div>

                    <form action="{{route('editClientAction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$clientData->id }}">


                        <div class="row g-6">
                            <div class="col-md-6 mt-3">
                                <label for="website">Website Name</label>
                                <a style="color:red;">{{$errors->first('website')}}</a>
                                <input type="text" name="website" class="form-control" placeholder="Your website name . com" id="website" value="{{$clientData->website}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="site_url">Site url </label>
                                <a style="color:red;">{{$errors->first('site_url')}}</a>
                                <input type="text" name="site_url" class="form-control" placeholder="Url   Ex:http://127.0.0.1:8000 " id="site_url" value="{{$clientData->site_url}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="cpanel_username">Cpanel Uername  </label>
                                <a style="color:red;">{{$errors->first('cpanel_username')}}</a>
                                <input type="text" name="cpanel_username" class="form-control" placeholder="Enter Cpanel username" id="cpanel_username" value="{{$clientData->cpanel_username}}">
                            </div>




                            <div class="col-md-6 mt-3">
                                <label for="dashobord_link">Dashboard link </label>
                                <a style="color:red;">{{$errors->first('dashobord_link')}}</a>
                                <input type="text" name="dashobord_link" class="form-control" placeholder="Enter dashobord_link" id="dashobord_link" value="{{$clientData->dashobord_link}}">
                            </div>





                            <div class="col-md-6 mt-3">
                                <label for="dashobord_username"> Dashboard username </label>
                                <a style="color:red;">{{$errors->first('dashobord_username')}}</a>
                                <input type="text" name="dashobord_username" class="form-control" placeholder="Enter dashobord username" id="dashobord_username" value="{{$clientData->dashobord_username}}">
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
