@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">
            <h1>

                <a href="{{route('addAccounts')}}">
                    <button class="btn btn-success"><i class="fa fa-plus"></i> Add-account</button>
                    <hr>
                </a>
            </h1>

        </section>
        <!-- Main content -->

        <section class="content">
{{--            <div class="row">--}}
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
                                <table class="table table-hover ">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Deal_Amount</th>
                                        <th>Paid_Amount</th>
                                        <th>Payment_Method</th>
                                        <th>Due_Amount</th>

                                        @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="super-admin")|| (\Illuminate\Support\Facades\Auth::user()->role =="account"))
                                            <th>Action</th>
                                        @else
                                        @endif

                                    </tr>

                                    </thead>

                                    <tbody>
                                    @foreach($accountData as $key=>$accounts)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-xs">{{$accounts->name}}</button>
                                            </td>
                                            <td>{{$accounts->created_at->diffForHumans()}}</td>
                                            <td>
                                                <button
                                                    class="btn btn-success btn-xs">{{$accounts->dealamount}}</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-xs">{{$accounts->totalpaid}}</button>
                                            </td>
                                            <td>{{$accounts->payment}}</td>
                                            <td>
                                                <button
                                                    class="btn btn-danger btn-xs">{{$accounts->dealamount-$accounts->totalpaid}}</button>
                                            </td>

                                            {{--                                        <td>{{ $item->available - $item->use }}</td>--}}
                                            @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role =="super-admin")|| (\Illuminate\Support\Facades\Auth::user()->role =="account"))

                                                <td>
                                                    <a href="{{route('editAccount').'/'.$accounts->id}}">
                                                        <button class="btn-xs btn-danger" name="criteria"><i
                                                                class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{route('deleteAccountAction').'/'.$accounts->id}}">
                                                        <button class="btn-xs btn-primary" name="criteria"><i
                                                                class="fa fa-trash"></i>
                                                        </button>

                                                    </a>

                                                </td>
                                            @else

                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $accountData->links() }}
                            </div>
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </section>
    </div>

@endsection
