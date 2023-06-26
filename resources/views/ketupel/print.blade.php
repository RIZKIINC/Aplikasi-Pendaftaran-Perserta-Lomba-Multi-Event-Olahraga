<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .custom-table td:nth-child(1) {
            width: 1%;
        }

        .custom-table td:nth-child(2) {
            width: 15%;
        }

        .custom-table td:nth-child(3) {
            width: 35%;
        }

        .custom-table td:nth-child(4) {
            width: 15%;
        }

        .custom-table td:nth-child(5) {
            width: 34%;
        }

        .custom-table-2 td:nth-child(1) {
            width: 1%;
        }

        .custom-table-2 td:nth-child(2) {
            width: 15%;
        }

        .custom-table-2 td:nth-child(3) {
            width: 84%;
        }

        .custom-table-3 td:nth-child(1) {
            width: 1%;
        }

        .custom-table-3 td:nth-child(2) {
            width: 49%;
        }

        .custom-table-3 td:nth-child(3) {
            width: 1%;
        }

        .custom-table-3 td:nth-child(4) {
            width: 49%;
        }
    </style>
    <title>Data Kecamatan</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="5">Format Pendaftaran Peserta (F1)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kecamatan</td>
                            <td>: {{$profile->nama_kecamatan}}</td>
                            <td>Kode Kecamatan</td>
                            <td>: {{$profile->nama_kecamatan}}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nama Camat</td>
                            <td>: {{$profile->nama_camat}}</td>
                            <td>No HP</td>
                            <td>: {{$profile->telp_camat}}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Alamat Kantor Camat</td>
                            <td>: {{$profile->alamat}}</td>
                            <td>Kode Pos</td>
                            <td>: {{$profile->kodepos}}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Telepon/Email</td>
                            <td>: {{$profile->email}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table custom-table-2">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="5">Contact Person</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>Nama</td>
                            <td>: {{$cp->nama_kontak}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Jabatan</td>
                            <td>: {{$cp->jabatan_kontak}}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Telepon/Email</td>
                            <td>: {{$cp->telp_kontak}} / {{$cp->email_kontak}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table custom-table-3">
                    <thead>
                        <tr>
                            <th class="text-center" colspan="4">Cabor yang Diikuti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cabor as $index => $caborItem)
                        @if ($index % 2 === 0)
                        <tr>
                            @endif
                            <td>{{$loop->iteration}}</td>
                            <td>{{$caborItem}}</td>
                            @if ($index % 2 !== 0 || $loop->last)
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        // Function to print the page
        function printPage() {
            window.print(); // Print the page
            setTimeout(function() {
                var id = "{{$id_kecamatan}}";
                id = id.replace("[", "").replace("]", ""); // Remove square brackets
                var redirectUrl = "/ketupel/detail/" + id;
                window.location.href = redirectUrl; // Redirect to the dashboard after printing
            }, 500); // Delay in milliseconds before redirecting (adjust as needed)
        }

        // Call the printPage function when the page is loaded
        window.onload = printPage;
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>