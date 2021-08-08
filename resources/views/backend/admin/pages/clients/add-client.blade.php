@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            {{--            <div class="container mt-5">--}}
            <div class="row">
                <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                    <div class="col-12">
                        <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Client registratioin form</h3><hr>
                    </div>

                    <form action="{{route('addClientAction')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-6">
                            <div class="col-md-6 mt-3">
                                <label for="website">Website Name</label>
                                <a style="color:red;">{{$errors->first('website')}}</a>
                                <input type="text" name="website" class="form-control" placeholder="Your website name . com" id="website" value="{{old('website')}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="site_url">Site url </label>
                                <a style="color:red;">{{$errors->first('site_url')}}</a>
                                <input type="text" name="site_url" class="form-control" placeholder="Url   Ex:http://127.0.0.1:8000 " id="site_url" value="{{old('site_url')}}">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="cpanel_username">Cpanel Uername  </label>
                                <a style="color:red;">{{$errors->first('cpanel_username')}}</a>
                                <input type="text" name="cpanel_username" class="form-control" placeholder="Enter Cpanel username" id="cpanel_username" value="{{old('cpanel_username')}}">
                            </div>



                            <div class="col-md-6 mt-3">
                                <label for="cpanel_password">Cpanel Password  </label>
                                <a style="color:red;">{{$errors->first('cpanel_password')}}</a>
                                <input type="password" name="cpanel_password" class="form-control" placeholder="Enter Cpanel password" id="cpanel_password">
                            </div>




                            <div class="col-md-6 mt-3">
                                <label for="dashobord_link">Dashboard link </label>
                                <a style="color:red;">{{$errors->first('dashobord_link')}}</a>
                                <input type="text" name="dashobord_link" class="form-control" placeholder="Enter dashobord_link" id="dashobord_link" value="{{old('dashobord_link')}}">
                            </div>





                            <div class="col-md-6 mt-3">
                                <label for="dashobord_username"> Dashboard username </label>
                                <a style="color:red;">{{$errors->first('dashobord_username')}}</a>
                                <input type="text" name="dashobord_username" class="form-control" placeholder="Enter dashobord username" id="dashobord_username" value="{{old('dashobord_username')}}">
                            </div>






                            <div class="col-md-6 mt-3">
                                <label for="dashboard_password"> Dashboard Password </label>
                                <a style="color:red;">{{$errors->first('dashboard_password')}}</a>
                                <input type="password" name="dashboard_password" class="form-control" placeholder="Enter dashobord password" id="dashboard_password">
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
