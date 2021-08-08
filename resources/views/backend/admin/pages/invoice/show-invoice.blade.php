@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">
            <h1>

                <a href="{{route('invoice')}}">
                    <button class="btn btn-info"><i class="fa fa-plus"></i> Invoice</button>
                    <hr>
                </a>
            </h1>

        </section>
        @include('backend.admin.layouts.message')


        <section class="content">
            <div class="row">
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Company_name</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Zip_code</th>
                            <th>Location</th>
                            <th>Descriptions</th>
                            <th>Service</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($invoiceData as $key=>$invoice)
                            <tr>

                                <td>{{++$key}}</td>
                                <td>{{$invoice->company_name}}</td>
                                <td>{{$invoice->name}}</td>
                                <td>{{$invoice->contact}}</td>
                                <td>{{$invoice->address}}</td>
                                <td>{{$invoice->zip_code}}</td>
                                <td>{{$invoice->location}}</td>
                                <td>{!!$invoice->descriptions!!}</td>
                                <td>{{$invoice->service}}</td>
                                <td>{{$invoice->quantity}}</td>
                                <td>{{$invoice->rate}}</td>

                                <td>

                                    @if( auth()->check() && (\Illuminate\Support\Facades\Auth::user()->role == "super-admin"))

                                        <a href="{{route('editInvoice').'/'.$invoice->id}}">
                                            <button class="btn-xs btn-danger" name="criteria"><i
                                                    class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <a href="{{route('deleteInvoiceAction').'/'.$invoice->id}}">
                                            <button class="btn-xs btn-primary" name="criteria"><i
                                                    class="fa fa-trash"></i>
                                            </button>

                                        </a>

                                        <a href="">
                                            <button class="btn-xs btn-primary" name="criteria"><i
                                                    class="fa fa-eye"></i>
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
                    {{ $invoiceData->links() }}
                </div>

            </div>

        </section>

    </div>


@endsection
