<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-md">
    <br>
    <h1 align="center">Data Users</h1>
    <br>
    <table class="table table-striped">
        <thead>
            <tr align="center">
                <th> No </th>
                <th> Username </th>
                <th> Password </th>
                <th> Email </th>
                <th> Role </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($cetak as $d)
                <td align="center">{{$loop->iteration}} </td>
                <td>{{$d->username}} </td>
                <td align="center"> {{$d->password}} </td>
                <td> {{$d->email}} </td>
                <td> {{$d->role}} </td>
            </tr>
        @endforeach

        <script type="text/javascript">
            window.print();
        </script>
        </tbody>
    </table>

    Tanggal Print : {{$hariini}}

</div>
    
</body>
</html>
