<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        th {
            border: 1px solid black;
        }

        .custom-table th:nth-child(1) {
            width: 1%;
        }

        .custom-table th:nth-child(2) {
            width: 49%;
        }

        .custom-table th:nth-child(3) {
            width: 15%;
        }

        .custom-table th:nth-child(4) {
            width: 35%;
        }

        .custom-table td:nth-child(1) {
            width: 1%;
            vertical-align: middle;
        }

        .custom-table td:nth-child(2) {
            width: 10%;
        }

        .custom-table td:nth-child(3) {
            width: 39%;
        }

        .custom-table td:nth-child(4) {
            width: 15%;
            vertical-align: middle;
        }

        .custom-table td:nth-child(5) {
            width: 35%;
            vertical-align: middle;
        }
    </style>
    <title>Data Peserta</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-5">
                <div class="row pb-2">
                    <div class="col-6">
                        Kecamatan : {{$profile->nama_kecamatan}}
                    </div>
                    <div class="col-6">
                        Cabang Olanhraga : {{$profile->sport_name}}
                    </div>
                </div>
                <table class="table table-sm custom-table">
                    @foreach ($peserta as $item)
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th colspan="2" class="text-center">Identitas</th>
                            <th class="text-center">Nomor/Kelas/Regu</th>
                            <th class="text-center">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" rowspan="9">{{$loop->iteration}} </td>
                            <td>Nama</td>
                            <td>{{$item->participant_name}}</td>
                            <td class="text-center" rowspan="9">{{$item->id_map_district_sport}}</td>
                            <td rowspan="9" class="text-center"> <img src="https://www.w3schools.com/images/lamp.jpg" width="150" height="200" alt="Participant Photo">
                            </td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>{{$item->participant_dob}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>hhahahaa</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$item->participant_address}}</td>
                        </tr>
                        <tr>
                            <td>Rumah</td>
                            <td>{{$item->participant_domicile}}</td>
                        </tr>
                        <tr>
                            <td>No KTP</td>
                            <td>{{$item->no_ktp}}</td>
                        </tr>
                        <tr>
                            <td>No KK</td>
                            <td>{{$item->no_kk}}</td>
                        </tr>
                        <tr>
                            <td>No Akte</td>
                            <td>{{$item->no_akte}}</td>
                        </tr>
                        <tr>
                            <td>No Ijazah</td>
                            <td>{{$item->no_ijazah}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <hr class="solid">
            </div>
        </div>
    </div>
    </div>

    <script>
        // Function to print the page
        function printPage() {
            window.print(); // Print the page
            setTimeout(function() {
                var id = "{{$data->id}}";
                id = id.replace("[", "").replace("]", ""); // Remove square brackets
                var redirectUrl = "/ketupel/show_peserta/" + id;
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