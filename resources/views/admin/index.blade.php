<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1>HALOWW ADMIN</h1>
    <h2>{{ Auth::user()->name }}</h2>
    <a href="/logout">Logout</a>

    <div class="col-lg-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kelola Data User</h4>
                {{-- <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for users names.." class=" col-6 form-control mt-2"> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-striped text-dark" id="ordersTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Akun</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Phone</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($user as $i => $d)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->phone }}</td>
                                    <td>{{ $d->role }}</td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
