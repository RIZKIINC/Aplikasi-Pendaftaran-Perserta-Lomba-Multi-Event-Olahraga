<!DOCTYPE html>
<body>
    <br>
    <h1 align="center">Data Cabor</h1>
    <br>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th> Cabor</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{$d->cabor}} </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</body>
</html>

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
