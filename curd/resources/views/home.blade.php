<!doctype html>
<html lang="en">

<head>
    <title>CURD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/agar-60571_1280.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div id="head">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="Please enter your name" value="{{ old('name') }}">
                            <small id="helpId" class="form-text text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="text" class="form-control" name="password" id="password"
                                aria-describedby="helpId" placeholder="Please enter your password">
                            <small id="helpId" class="form-text text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="class">class</label>
                            <input type="text" class="form-control" name="class" id="class" aria-describedby="helpId"
                                placeholder="Please enter your class">
                            <small id="helpId" class="form-text text-danger">
                                @error('class')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                    @if (session()->has('status'))
                    <div class="er alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
                <div class="col-sm-6 table-responsive-sm">
                    <table class="table table-hover table-bordered">
                        <thead class="table-primary ">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($data as $val )
                            <tr>
                                <td scope="row">{{ $val->id }}</td>
                                <td>{{ Str::substr($val->name, 0, 7) }}</td>
                                <td>{{ $val->password }}</td>
                                <td>{{ $val->class }}</td>
                                <td>
                                    <div class="center btn-group">
                                        <a href="{{ url('/update', $val->id) }}" class="btn btn-info btn-sm ">Update</a>
                                        <a href="{{ url('/delete', $val->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/all.js') }}"></script>

</body>

</html>
