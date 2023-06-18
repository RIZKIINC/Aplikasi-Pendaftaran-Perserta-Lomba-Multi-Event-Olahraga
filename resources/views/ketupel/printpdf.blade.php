<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Data Peserta</title>
</head>

<body>
    <div class="container">
        <div class="mt-5 mb-5">
            <h3 class="display-4">Data Pendaftaran Group {{ $mds[0]->group_name}}</h3>
        </div>
        <div class="col">
            <div class="row" style="outline:1px solid #000">
                <table class="table">
                    @foreach ($mds as $item)
                        <tr>
                            <td width="30%">Nama Group</td>
                            <td width="1%">:</td>
                            <td>{{ $item->group_name }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Kecamatan</td>
                            <td width="1%">:</td>
                            <td>{{ $item->nama_kecamatan }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Cabang Olahraga</td>
                            <td width="1%">:</td>
                            <td>{{ $item->sport_name }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Status</td>
                            <td width="1%">:</td>
                            <td>{{ $item->status_map_district }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="row">
                <h6>
                    <strong style="font-size: 1rem; margin-top: 3rem;">DATA PESERTA</strong>
                </h6>
            </div>
            <div class="row" style="outline:1px solid #000">
                @foreach ($participants as $item)
                    <table class="table-form" border="0" width="100%" cellpadding="1" cellspacing="1">
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
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
