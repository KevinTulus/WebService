<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    .formLogin{
        max-width: 500px;
        margin: 20px auto 0;
    }
</style>
</head>
<body>

<div class="formLogin">
<div style="text-align: center;">
        <h1>API ANGKOTKU</h1>
    </div>

    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="{{route('login')}}" role="tab"
                aria-controls="pills-login" aria-selected="false">Login</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="{{route('register')}}" role="tab"
                aria-controls="pills-register" aria-selected="true">Register</a>
        </li>
    </ul>
    <!-- Pills navs -->
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
                @endforeach
            </ul>
        </div>

        @endif
    </div>
    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form action="{{route ('proses') }}" method="post">
            @csrf
    <!-- Name input -->
    <div class="form-outline mb-4">
        <input name="nama" type="text" id="registerName" class="form-control" value="{{ old('nama') }}" />
        <label class="form-label" for="registerName">Name</label>
    </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input name="email" id="registerEmail" class="form-control" value="{{ old('email') }}" />
            <label class="form-label" for="registerEmail">Email</label>
        </div>
        
        <!-- Password input -->
        <div class="form-outline mb-4">
            <input name="password" type="password" id="registerPassword" class="form-control" />
            <label class="form-label" for="registerPassword">Password</label>
        </div> 
        
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-3">Sign Up</button>
    </form>
</div>
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      
  </div>
</div>


<!-- Pills content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>