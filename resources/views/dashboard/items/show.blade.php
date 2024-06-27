@extends('layouts.dashboard')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Show Item Details </h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>{{ $row->name }}</th>
                </tr>
                <tr>
                    <th>Category</th>
                    <th>{{ $row->category->name }}</th>
                </tr>
                
                <tr>
                    <th>Sale Price</th>
                    <th>{{ $row->sale_price }}</th>
                </tr>
                <tr>
                    <th>Pay Price</th>
                    <th>{{ $row->pay_price }}</th>
                </tr>
               
                <tr>
                    <th>Image</th>
                    <th>
                        <img class="img-thumbnail" width="100px" src="{{ $row->image }}">
                    </th>
                </tr>
               
                
            </tbody>
        </table>
    </div>

    <div class="card-body">
      @foreach ($row->getMedia('product-images') as $image) 
           
            <img class="img-thumbnail" width="100px" src="{{ $image->getUrl() }}">
    
    @endforeach

    </div>
</div>
@endsection
