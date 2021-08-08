@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">
            <h1>

                <a href="{{route('addClient')}}">
                    <button class="btn btn-success"><i class="fa fa-plus"></i> AddClient</button>
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
                            <div class="container-fluid" id="container-wrapper">

                                <form action="">
                                    <div class="row">
                                        <div class="form-group">
                                            @csrf
                                            <input type="text" name="search" class="form-control"
                                                   placeholder="Search admin users">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Search</button>
                                        </div>

                                    </div>

                                </form>
                            </div>


                            @include('backend.admin.layouts.message')
                            <div class="table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Website_Name</th>
                                        <th>Site_url</th>
                                        <th>Cpanel_username</th>
                                        <th>Dashboard_link</th>
                                        <th> Dashboard_Username</th>


                                        <th>Action</th>
                                        {{--                                    @else--}}
                                        {{--                                    @endif--}}

                                    </tr>

                                    </thead>

                                    <tbody>
                                    @foreach($clientData as $key=>$client)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$client->website}}</td>
                                            <td>{{$client->site_url}}</td>
                                            <td>{{$client->cpanel_username}}</td>
                                            <td>{{$client->dashobord_link}}</td>
                                            <td>{{$client->dashobord_username}}</td>

                                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="super-admin")
                                        || (\Illuminate\Support\Facades\Auth::user()->role =="client")
                                        || (\Illuminate\Support\Facades\Auth::user()->role =="developer"))

                                                <td>
                                                    @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="developer"))

                                                        <a href="">
                                                            <button class="btn-xs btn-danger" name="criteria"><i
                                                                    class="fa fa-edit"></i>
                                                            </button>

                                                        </a>
                                                    @else
                                                        <a href="{{route('editClient').'/'.$client->id}}">
                                                            <button class="btn-xs btn-danger" name="criteria"><i
                                                                    class="fa fa-edit"></i>
                                                            </button>

                                                        </a>
                                                        <a href="{{route('deleteClientAction').'/'.$client->id}}">
                                                            <button class="btn-xs btn-primary" name="criteria"><i
                                                                    class="fa fa-trash"></i>
                                                            </button>

                                                        </a>
                                                    @endif

                                                </td>
                                        </tr

                                        @else

                                        @endif

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{ $clientData->links() }}
                        </div>

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </section>
    </div>

@endsection
