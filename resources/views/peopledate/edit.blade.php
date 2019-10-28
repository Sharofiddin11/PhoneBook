@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit People</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('people.update', $peodata->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        
        <div class="col-md-12">
          <strong>Name people:</strong>
          <input type="text" name="name" class="form-control" placeholder="Name Otdel">
        </div>
        <div class="col-md-12">
          <strong>Phone number</strong>
          <input type="text" name="phone_number" class="form-control" placeholder="Phone number">
        </div>
        <div class="col-md-12">
          <strong>email</strong>
          <input type="text" name="email" class="form-control" placeholder="email">
        </div>
        <div class="col-md-12">
          <strong>address</strong>
          <input type="text" name="address" class="form-control" placeholder="address">
        </div>

        <div class="col-md-12">
          <strong>Name Department of People :</strong>
          <select class="form-control" name="Dep_name">
            @foreach ($deperdatas as $deperdata)    
                  <option>{{$deperdata->name}}   </option>
            @endforeach
          </select>
        </div>
        <br>
        <br>
        <div class="col-md-12">
          <select class="form-control" name="otd_name">
            @foreach ($otdeldates as $otdeldata)    
                  <optgroup label = "{{$otdeldata->name_deper}}"></optgroup>
                  <option>{{$otdeldata->name}}</option>
            @endforeach
          </select>
        </div> 
        <br>
        <br>
        <div class="col-md-12">
          <a href="{{route('otdel.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>

      </div>
    </form>
  </div>
@endsection
