<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Login to Dashboard</h1>

            <hr>
            @include('backend.admin.layouts.message')

            <form action="loginDashbord" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <a style="color:red;">{{$errors->first('email')}}</a>
                    <input type="text" name="email" class="form-control" placeholder="email" value="{{old('email')}}"  id="email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <a style="color:red;">{{$errors->first('password')}}</a>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}"  id="password">
                </div>
                <br>
                <div class ="form-group">
                    <button class="btn btn-danger">Sign_in</button>
                </div>
            </form>


        </div>
    </div>
</div>

</body>
</html>
