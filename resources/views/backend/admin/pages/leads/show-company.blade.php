@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">
            <h1>

                <a href="{{route('add-company')}}">
                    <button class="btn btn-success"><i class="fa fa-plus"></i> Add-Lead</button>
                    <hr>
                </a>
            </h1>

        </section>
        <form action="">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="text" name="search" class="form-control "
                           placeholder="Search admin users">
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-outline-primary btn-sm" style="margin-top: 6px; margin-left: 0px "><i
                            class="fa fa-search"></i></button>
                </div>

                <div class="form-group col-md-1.2">
                    <select name="search" class="btn btn-outline-success">
                        <option disabled selected>Filter by service</option>
                        @foreach($serviceData as $key=>$service)
                            <option class="btn btn-google "
                                    value="{{$service->service}}">{{$service->service}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-3">
                    <button class="btn btn-outline-primary btn-sm" style="margin-top:3px; margin-left: 1px"><i
                            class="fa fa-filter"></i> filter
                    </button>
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
                <th>Company_Name</th>
                <th>Name</th>
                <th>User_name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone_number</th>
                <th>Service</th>
                <th>Deals</th>
                <th>Follow_up</th>
                <th>Handle</th>
                {{--                                    @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "sales"))--}}

                <th>Action</th>
                {{--                                    @else--}}
                {{--                                    @endif--}}
            </tr>
            </thead>
            <tbody>
            @foreach($companyData as $key=>$company)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$company->companyname}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->username}}</td>
                    <td>{{$company->address}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->phone}}</td>
                    <td>{{$company->service}}</td>
                    <td>{{$company->deals}}</td>
                    <td>{{$company->followup}}</td>
                    <td>{{$company->handle}}</td>
                    <td>


                        @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin")||(\Illuminate\Support\Facades\Auth::user()->role == "sales"))

                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "sales"))

                                <a href="#">
                                    <button class="btn-xs btn-danger" name="criteria"><i
                                            class="fa fa-edit"></i>
                                    </button>
                                </a>

                                <a href="{{route('view-company').'/'.$company->id}}">
                                    <button class="btn-xs btn-success" name="criteria"><i
                                            class="fa fa-eye"></i>
                                    </button>

                                </a>


                            @else
                                <a href="{{route('deleteLeadAction').'/'.$company->id}}">
                                    <button class="btn-xs btn-primary" name="criteria"><i
                                            class="fa fa-trash"></i>
                                    </button>

                                </a>

                                <a href="{{route('editLead').'/'.$company->id}}">
                                    <button class="btn-xs btn-danger" name="criteria"><i
                                            class="fa fa-edit"></i>
                                    </button>
                                </a>

                                <a href="{{route('view-company').'/'.$company->id}}">
                                    <button class="btn-xs btn-success" name="criteria"><i
                                            class="fa fa-eye"></i>
                                    </button>

                                </a>

                            @endif


                        @else


                            <a href="{{route('view-company').'/'.$company->id}}">
                                <button class="btn-xs btn-success" name="criteria"><i
                                        class="fa fa-eye"></i>
                                </button>

                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $companyData->links() }}
    </div>
@endsection
