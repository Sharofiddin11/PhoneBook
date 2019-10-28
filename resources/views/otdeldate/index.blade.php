@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Otdels</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('otdel.create') }}">Create New otdel</a>
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
        <th width = "300px">Name Otdels</th>
        <th width = "300px">Name Departments</th>
      </tr>

      @foreach ($otdeldates as $otdeldata)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$otdeldata->name}}</td>
          <td>{{$otdeldata->name_deper}}</td>
          <td>
            <form action="{{ route('otdel.destroy', $otdeldata->id) }}" method="post">
              <a class="btn btn-sm btn-warning" href="{{route('otdel.edit', $otdeldata->id)}}">Edit</a>

              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $otdeldates->links() !!}
  </div>
@endsection
