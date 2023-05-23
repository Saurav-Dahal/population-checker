<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
   <div class="row" style="margin-top:100px">
      <div class="col-4"></div>
      <div class="col-4">
          <div class="p-3 border bg-light">
            <h4>Custom | Login</h4><hr>
                <form action="{{ route('auth.check') }}" method="post">
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                          {{ Session::get('success') }}
                        </div>
                    @endif
                    @if(Session::get('fail'))
                        <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                        </div>
                        @endif
        
                    @csrf
                    <div class="form-group" style="margin-bottom:10px;">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group" style="margin-bottom:10px;">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary" style="margin-bottom:10px;">Sign In</button>
                    <p>Don't have an account? <a href="{{ route('register') }}"> Register</a></p>
                </form> 
          </div>      
      </div>
      <div class="col-4"></div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>