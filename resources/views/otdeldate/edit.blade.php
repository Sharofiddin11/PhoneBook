@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Otdel</h3>
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

    <form action="{{route('otdel.update', $otdeldate->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Name Otdel :</strong>
          <input type="text" name="name" class="form-control" value="{{$otdeldate->name}}">
        </div>
        <div class="col-md-12">
          <strong>Name Department of Otdel :</strong>
          <select class="form-control" name="name_deper">
            @foreach ($deperdatas as $deperdata)    
                  <option>{{$deperdata->name}}   </option>
            @endforeach
          </select>
        </div>
        <br>
        <br>
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
