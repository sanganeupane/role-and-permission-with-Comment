@extends('backend.admin.master.master')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <section class="content-header">

{{--            <div class="container mt-5">--}}
                <div class="row">
                    <div class="col-md-9 offset-md-1 border p-4 shadow bg-light">
                        <div class="col-12">
                            <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Accounts Form</h3>
                        </div>

                        <form action="{{route('addAccountsAction')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-6">
                                <div class="col-md-6 mt-3">
                                    <label for="name">Name</label>
                                    <a style="color:red;">{{$errors->first('name')}}</a>
                                    <input type="text" name="name" class="form-control" placeholder="First Name" id="name" value="{{old('name')}}">
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="date">Date</label>
                                    <a style="color:red;">{{$errors->first('name')}}</a>
                                    <input type="date" name="date" class="form-control" placeholder="Date" id="date" value="{{old('date')}}">
                                </div>


                                <div class="col-md-6 mt-3">
                                    <label for="dealamount">Total Deal Amount </label>
                                    <a style="color:red;">{{$errors->first('dealamount')}}</a>
                                    <input type="number" name="dealamount" class="form-control" placeholder="Enter Deal Amount" id="dealamount" value="{{old('dealamount')}}">
                                </div>



                                <div class="col-md-6 mt-3">
                                    <label for="totalpaid">Total Paid Amount </label>
                                    <a style="color:red;">{{$errors->first('totalpaid')}}</a>
                                    <input type="number" name="totalpaid" class="form-control" placeholder="Enter Total Paid Amount" id="totalpaid" value="{{old('totalpaid')}}">
                                </div>




                                <div class="col-md-6 mt-3">
                                    <label for="payment">Payment Methods </label>
                                    <a style="color:red;">{{$errors->first('payment')}}</a>
                                    <select name="payment"  id="payment" class="form-control" aria-label="Default select example">
                                        <option disabled selected>Select Payment Method</option>
                                        <option value="e-sewa">E-sewa</option>
                                        <option  value="cash">Cash</option>
                                        <option value="BankTransfer">Bank-Transfer</option>
                                    </select>
                                    </div>


                                <div class="col-12 mt-4">
                                    <button class="btn btn-primary float-end">Submit</button>
                                    <button class="btn btn-outline-secondary float-end me-2">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>

@endsection
