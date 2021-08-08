@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">
            <h1>

                <a href="{{route('addAdminUser')}}">
                    <button class="btn btn-success"><i class="fa fa-plus"></i> Add-admin-user</button>
                    <hr>
                </a>
            </h1>


        </section>
        <!-- Main content -->

        <section class="content">
            <div class="row">
{{--                <div class="box-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-8">--}}
                            @include('backend.admin.layouts.message')
                <div class="table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Image</th>
{{--                                    <th>User_Type</th>--}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adminUserData as $key=>$users)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$users->name}}</td>
                                        <td>{{$users->username}}</td>
                                        <td>{{$users->email}}</td>
                                        <td>{{$users->role}}</td>
                                        <td>
                                            <img src="{{url('uploads/admins/'.$users->image)}}" width="28px" alt="">
                                        </td>
{{--                                        <td>--}}
{{--                                            <form action="{{route('updateAdminType')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="criteria" value="{{$users->id}}">--}}
{{--                                                @if($users->admin_type=='admin')--}}
{{--                                                    <button name="admin" class="btn btn-info"><i class="fa fa-user">--}}
{{--                                                            admin</i>--}}
{{--                                                    </button>--}}
{{--                                                @elseif($users->admin_type=='super-admin')--}}
{{--                                                    <button name="super-admin" class="btn btn-danger"> sp.admin<i--}}
{{--                                                            class="fa fa-users"></i></button>--}}
{{--                                                @elseif($users->admin_type=='user')--}}
{{--                                                    <button name="user" class="btn btn-primary"> user <i--}}
{{--                                                            class="fa fa-users"></i></button>--}}
{{--                                                @elseif($users->admin_type=='editor')--}}
{{--                                                    <button name="editor" class="btn btn-success"> editor <i--}}
{{--                                                            class="fa fa-users"></i></button>--}}
{{--                                                @endif--}}
{{--                                            </form>--}}
{{--                                        </td>--}}


                                        <td>
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" name="criteria" value="{{$users->id}}">

                                                @if($users->status==1)
                                                    <button class="btn-xs btn-success" name="active"><i
                                                            class="fa fa-check"></i></button>

                                                @else
                                                    <button class="btn-xs bnt btn-danger" name="inactive"><i
                                                            class="fa fa-times"></i></button>

                                                @endif
                                            </form>
                                        </td>
                                        <td>

                                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin"))

                                                <a href="{{route('editAdminUser').'/'.$users->id}}">
                                                    <button class="btn-xs btn-danger" name="criteria"><i
                                                            class="fa fa-edit"></i>
                                                    </button>
                                                </a>

                                                <a href="{{route('deleteAdminAction').'/'.$users->id}}">
                                                    <button class="btn-xs btn-primary" name="criteria"><i
                                                            class="fa fa-trash"></i>
                                                    </button>

                                                </a>


                                            @else

                                                <a href="">
                                                    <button class="btn-xs btn-primary" name="criteria"><i
                                                            class="fa fa-eye"></i>
                                                    </button>

                                                </a>

                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                                                        {{ $adminUserData->links() }}
                        </div>

                    </div>
{{--                </div>--}}
{{--            </div>--}}

        </section>
    </div>

@endsection
