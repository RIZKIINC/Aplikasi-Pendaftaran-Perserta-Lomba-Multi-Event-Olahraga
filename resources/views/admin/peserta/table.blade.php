<!DOCTYPE html>
<html>

<head>
    <title>Table PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            word-wrap: break-word;
            /* Added word wrapping */
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <table style="table-layout: fixed; width: 100%;">
        <colgroup>
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
            <col style="width: 10%;">
        </colgroup>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Event</th>
                <th>Kecamatan</th>
                <th>Nama</th>
                <th>NKK</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>Akta</th>
                <th>Alamat</th>
                <th>No. Olahraga</th>
                <th>Domisili</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td><img src="{{ public_path('uploads/'.$row->foto) }}" alt="Foto"></td>
                <td>{{ $row->nama_event_cabor }}</td>
                <td>{{ $kecamatan->where('id', $row->kecamatan_id)->first()->namakecamatan }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->nomor_kk }}</td>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->ttl }}</td>
                <td><img src="{{ public_path('uploads/'.$row->akta) }}" alt="Akta"></td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->no_olahraga }}</td>
                <td>{{ $row->domisili }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.onload = function() {
            // Open print dialog as a pop-up window
            window.print();
        };
    </script>
</body>

</html>