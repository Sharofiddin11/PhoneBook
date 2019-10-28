<!DOCTYPE html>
<html>
<head>
<title>PhoneBook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .container {
                position: relative;
                top: 130px;
            }
        </style>
</head>
<body>
   @if (Route::has('login'))   
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="container">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group" style = "left: 150px;">
                <input type="text" class="form-control" name="q" placeholder="Search users"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            Search
                        </button>
                    </span>
                  <select name = "ST" class="form-control" style = "width: 170px;">

                    @if(isset($details))
                        <option>{{$query}}</option>
                        @foreach($deperdatas as $deperdata)    
                              @if($deperdata->name != $query) 
                                  <option>{{$deperdata->name}}</option>
                              @endif
                        @endforeach
                    @else
                        <option>Chose department</option>
                        @foreach($deperdatas as $deperdata)    
                              <option>{{$deperdata->name}}</option>
                        @endforeach
                    @endif
                  </select>

                  <select name = "ST1" class="form-control" style = "width: 125px;">
                        <option>Chose otdel</option>
                        {{$pt = "-1"}}
                        @foreach($otdeldates as $otdeldate)   
                              @if($pt != $otdeldate->name_deper)
                                  <optgroup label = "{{$otdeldate->name_deper}}"></optgroup> 
                              @endif
                              <option>{{$otdeldate->name}}</option>
                              {{$pt = $otdeldate->name_deper}}
                        @endforeach
                  </select>

               <!--- <a href="{{ url('/deper') }}" class="form-control" style = "width: 100px">Department</a>
                <a href="{{ url('/search_otdel') }}" class="form-control" style = "width: 60px">Otdel</a>
                -->
            </div>
        </form>
        <div class="container">
            @if(isset($details))
            <h2>Search result:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Otdel</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $user)
                    <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->phone_number}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->address}}</td>
                          <td>{{$user->Dep_name}}</td>
                          <td>{{$user->otd_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @elseif(isset($message))
            <p>{{ $message }}</p>
            @endif
        </div>

</body>
</html>