@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">

        <section class="content-header">
            <h1>
               Edit Admin User
                <a href="{{route('showAdminUser')}}">
                    <button class="btn btn-info"><i class="fa fa-eye"></i> ShowAdminUsers</button>

                </a>
                <hr>
            </h1>

        </section>
        <section class="content">

            @include('backend.admin.layouts.message')


            <form action="{{route('editAdminUserAction')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden"  name="id" value="{{$adminUserData->id}}">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Name</label>
                        <a style="color:red;">{{$errors->first('name')}}</a>
                        <input type="text" name="name" class="form-control" placeholder="First name"
                               value="{{$adminUserData->name}}" id="name">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="username">Username</label>
                        <a style="color:red;">{{$errors->first('username')}}</a>
                        <input type="text" name="username" class="form-control"
                               placeholder="Enter username" value="{{$adminUserData->username}}"
                               id="username">
                    </div>
                    <div class="form-group  col-md-4">
                        <label for="email">Email</label>
                        <a style="color:red;">{{$errors->first('email')}}</a>
                        <input type="text" name="email" class="form-control" placeholder="email"
                               value="{{$adminUserData->email}}" id="email">
                    </div>


                    <div class="form-group  col-md-4">
                        <label for="image">Image</label>
                        <a style="color:red;">{{$errors->first('image')}}</a>
                        <input type="file" name="image" class="form-control"
                               placeholder="Your image"
                               value="{{$adminUserData->image}}" id="image">
                    </div>


                    <div class="form-group  col-md-6">
                        <label for="role">Admin user Role </label>
                        <a style="color:red;">{{$errors->first('role')}}</a>
                        <select name="role" id="deals" class="form-control"
                                aria-label="Default select example">
                            <option  selected>{{$adminUserData->role}}</option>
                            <option value="super-admin">Super-Admin</option>
                            <option value="developer">Developer</option>
                            <option value="client">Client</option>
                            <option value="sales">Sales</option>
                            <option value="account">Account</option>
                        </select>
                    </div>






                    {{--                    <div class="form-group col-md-3">--}}

                    {{--                        <label> <a style="color:red;">{{$errors->first('role')}}</a>--}}

                    {{--                            <strong>Give permission to role users--}}
                    {{--                                </strong></label><br>--}}
                    {{--                        <label><input type="checkbox" name="role[]" value="super-admin">super-admin</label>--}}
                    {{--                        <label><input type="checkbox" name="role[]" value="admin">admin</label>--}}
                    {{--                        <label><input type="checkbox" name="role[]" value="developer">developer</label>--}}
                    {{--                        <label><input type="checkbox" name="role[]" value="client">client</label>--}}
                    {{--                        <label><input type="checkbox" name="role[]" value="sales">sales</label>--}}

                    {{--                    </div>--}}












                    {{--                                        <div class="col-md-6 mt-3">--}}
                    {{--                                            <label for="role">Admin Role </label>--}}
                    {{--                                            <a style="color:red;">{{$errors->first('role')}}</a>--}}
                    {{--                                            <select name="role"  id="role" class="form-control" aria-label="Default select example">--}}
                    {{--                                                <option disabled selected>Select Payment Method</option>--}}
                    {{--                                                <option value="super-admin">Super_admin</option>--}}
                    {{--                                                <option  value="admin">Admin</option>--}}
                    {{--                                                <option value="editor">Editor</option>--}}
                    {{--                                            </select>--}}
                    {{--                                        </div>--}}


                    <div class="form-group col-md-12">
                        <button class="btn btn-success">AddAdminUser</button>
                    </div>
                </div>
            </form>
            <div class="col-md-4">
                <img src="{{url('uploads/admins/'.$adminUserData->image)}}" class="img-fluid img-thumbnail">
            </div>

        </section>
    </div>


    {{--                </div><!-- /.col -->--}}

    {{--            </div><!-- /.col -->--}}
    {{--    </div><!-- ./box-body -->--}}

    {{--    </div><!-- /.box -->--}}

    {{--    </section><!-- /.content -->--}}


    {{--    </div>--}}


@endsection
