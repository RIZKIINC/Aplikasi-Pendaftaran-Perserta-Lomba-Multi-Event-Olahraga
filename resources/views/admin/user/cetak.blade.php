
    
</body>
</html>

<!DOCTYPE html>
<body>
    <br>
    <h1 align="center">Data User</h1>
    <br>
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Role</th>
      </tr>
    </thead>
    <tbody>
        @foreach($cetak as $d)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$d->username}} </td>
                <td> {{$d->password}} </td>
                <td> {{$d->email}} </td>
                <td> {{$d->role}} </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  <script type="text/javascript">
            window.print();
        </script>
        </tbody>
</body>
</html>
<br><br>
Tanggal Print : {{$hariini}}


<style>
	html {
        margin : 0 30px;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    }

    th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    }

    th {
    background-color: #f2f2f2;
    }

    tr:nth-child(even) {
    background-color: #f9f9f9;
    }

    tr:hover {
    background-color: #e9e9e9;
    }

</style>
