@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

            <h1>
                View details
            </h1>
            <hr>
        </section>
        @include('backend.admin.layouts.message')


        <section class="content">
            <div class="row">
                {{--                <div class="box-body">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="col-md-12">--}}

                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                        <tr>
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
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$viewCompanyData->companyname}}</td>
                            <td>{{$viewCompanyData->name}}</td>
                            <td>{{$viewCompanyData->username}}</td>
                            <td>{{$viewCompanyData->address}}</td>
                            <td>{{$viewCompanyData->email}}</td>
                            <td>{{$viewCompanyData->phone}}</td>
                            <td>{{$viewCompanyData->service}}</td>
                            <td>{{$viewCompanyData->deals}}</td>
                            <td>{{$viewCompanyData->followup}}</td>
                            <td>{{$viewCompanyData->handle}}</td>

                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <br>
                    <br>
                    <h4>view Comments</h4>
                    <hr>
                    <hr>
                    <div>


                        {{--                                    <h4>{{$leadData->postedBy->name}}</h4>--}}
                        {{--                                    {{$leadData->comment}}<br><br>--}}
                        {{--                                    Leads:- {{$leadData->leadId->name}}<br>--}}
                        {{--                                    <hr>--}}
                        {{--                            --}}




                        {{--                                    {{ $viewCommentData->links() }}--}}

                        <div class="row">
                            @foreach($viewCompanyData->leadId as $leadData)
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$leadData->postedBy->username}}</h5>
                                            <p class="card-text">{{$leadData->comment}}</p>
                                            <button
                                                class="btn btn-primary btn-sm">{{$leadData->postedBy->role}}
                                            </button>
                                            <text> {{$leadData->created_at->diffForHumans()}}</text>

                                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="super-admin")||($leadData->posted_by===\Illuminate\Support\Facades\Auth::user()->id))

                                            <a href="{{route('deleteCommentAction').'/'.$leadData->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>
                                            @else
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>

        </section>

    </div>
    <div class="container-fluid" id="container-wrapper">

        <div class="row">
            <div class="form-group">

                <form action="{{route('addCommentAction')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="card" style="margin-top: 30px">

                            <label for="comment"> Comment </label>
                            <a style="color:red;">{{$errors->first('comment')}}</a>
                            <textarea style="height:150px; width:400px" type="text" name="comment"
                                      class="form-control"
                                      placeholder="your comment here..."
                                      value="{{old('comment')}}" id="comment"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="lead_id" id="lead_id" value="{{$viewCompanyData->id}}" id="lead_id">
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Comment</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection
