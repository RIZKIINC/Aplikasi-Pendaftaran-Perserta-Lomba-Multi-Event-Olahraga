<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data Karyawan</title>
</head>

<body>
    <div class="container">
        <div class="mt-5 mb-5">
            <h3 class="display-4">Preview Pendaftaran {{ $mds[0]->group_name}}</h3>
        </div>
        <a href="{{ URL::to('cetak_pdf/' . $mds[0]->id_map_district_sport) }}" class="btn btn-primary">Export Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Group</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Cabang Olahraga</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mds as $item)
                    <tr>
                        <td>{{ $item->group_name }}</td>
                        <td>{{ $item->nama_kecamatan }}</td>
                        <td>{{ $item->sport_name }}</td>
                        <td>{{ $item->status_map_district }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($participants as $item)
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="30%">Nama Peserta</td>
                    <td width="1%">:</td>
                    <td>{{ $item->participant_name }}</td>
                </tr>
                <tr>
                    <td>Tempat/Tgl. Lahir</td>
                    <td width="1%">:</td>
                    <td>{{ $item->participant_dob }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td width="1%">:</td>
                    <td>{{ $item->participant_gender }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td width="1%">:</td>
                    <td>{{ $item->participant_address }}</td>
                </tr>
                <tr>
                    <td>Domisili</td>
                    <td width="1%">:</td>
                    <td>{{ $item->participant_domicile }}</td>
                </tr>
                <tr>
                    <td>No. KTP</td>
                    <td width="1%">:</td>
                    <td>{{ $item->no_ktp }}</td>
                </tr>
                <tr>
                    <td>No. KK</td>
                    <td width="1%">:</td>
                    <td>{{ $item->no_kk }}</td>
                </tr>
                <tr>
                    <td>No. Akte</td>
                    <td width="1%">:</td>
                    <td>{{ $item->no_akte }}</td>
                </tr>
                <tr>
                    <td>No. Ijazah</td>
                    <td width="1%">:</td>
                    <td>{{ $item->no_ijazah }}</td>
                </tr>
            </table>
            <hr class="solid">
        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
