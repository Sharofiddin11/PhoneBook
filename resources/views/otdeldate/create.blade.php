@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Otdel</h3>
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

    <form action="{{route('otdel.store')}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <strong>Name Otdel :</strong>
          <input type="text" name="name" class="form-control" placeholder="Name Otdel">
        </div>
    <!--    <div class="col-md-12">
          <strong>Name of department :</strong>
          <input type="text" name="name_deper" class="form-control" placeholder="Name of department">
        </div> -->

        <div class="col-md-12">
          <select class="form-control" name="name_deper">
            @foreach ($deperdatas as $deperdata)    
                  <option>{{$deperdata->name}}   </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
@endsection
