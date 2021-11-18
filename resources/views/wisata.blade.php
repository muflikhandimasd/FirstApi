<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .pading {
            padding-top: 20px;
        }

        .pd {
            padding-bottom: 100px;
            padding-top: 30px;
        }

    </style>
    <title>Get Wisata</title>


</head>

<body>

    <div class="container text-center pading">
        <h1>Get Wisata</h1>
    </div>
    <div class="container pd">
        <table class="table table-success table-striped" class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama wisata</th>
                    <th scope="col">Buka</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                </tr>
            </thead>
            <tbody class="text-left">
                @foreach ($data as $wisata)
                    <tr>
                        <td><img src="{{ $wisata['image'] }}" width="100px" alt="Icon Wisata"></td>
                        <td scope="col">{{ $wisata['kategori_id'] }}</td>
                        <td scope="col">{{ $wisata['nama_wisata'] }}</td>
                        <td scope="col">{{ $wisata['waktu_buka'] }}</td>
                        <td scope="col">{{ $wisata['kota'] }}</td>
                        <td scope="col">{{ $wisata['provinsi'] }}</td>
                        <td scope="col">{{ $wisata['latitude'] }}</td>
                        <td scope="col">{{ $wisata['longitude'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
