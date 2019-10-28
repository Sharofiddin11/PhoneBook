@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Department</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('deper.create') }}">Create New Department</a>
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
        <th width = "300px">Name Department</th>
      </tr>

      @foreach ($deperdatas as $deperdata)
        <tr>
          <td><b>{{++$i}}.</b></td>
          <td>{{$deperdata->name}}</td>
          <td>
            <form action="{{ route('deper.destroy', $deperdata->id) }}" method="post">
              <a class="btn btn-sm btn-warning" href="{{route('deper.edit', $deperdata->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

{!! $deperdatas->links() !!}
  </div>
@endsection
