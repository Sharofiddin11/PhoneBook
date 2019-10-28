@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Peoples</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('people.create') }}">Add New Peoples</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th width = "300px">Name peoples</th>
        <th width = "300px">Phone number</th>
        <th width = "300px">email</th>
        <th width = "300px">address</th>
        <th width = "300px">Department name</th>
        <th width = "300px">Otdel name</th>
      </tr>

      @foreach ($peodatas as $peodata)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$peodata->name}}</td>
          <td>{{$peodata->phone_number}}</td>
          <td>{{$peodata->email}}</td>
          <td>{{$peodata->address}}</td>
          <td>{{$peodata->Dep_name}}</td>
          <td>{{$peodata->otd_name}}</td>

          <td>
            <form action="{{ route('people.destroy', $peodata->id) }}" method="post">
              <a class="btn btn-sm btn-warning" href="{{route('people.edit', $peodata->id)}}">Edit</a>

              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $peodatas->links() !!}
  </div>
@endsection
