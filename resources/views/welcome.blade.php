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
            padding-top: 100px;
        }
 
        .pd {
            padding-bottom: 100px;
            padding-top: 30px;
        }
 
    </style>
    <title>Doa harian</title>
 
 
</head>
 
<body>
 
    <div class="container text-center pading">
        <h1 >Doa Harian</h1>
        <a  href="{{route('post')}}">Post Data</a>
    </div>
        <div class="container pd">
            <table  class="table table-success table-striped" class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th  scope="col">doa</th>
                        <th scope="col">Ayat</th>
                        <th scope="col">Latin</th>
                        <th scope="col">Artinya</th>
                    </tr>
                </thead>
                <tbody class="text-left">
                    @foreach($data as $d)
                    <tr>
                        <th scope="row">{{$d['id']}}</th>
                        <td>{{$d['doa']}}</td>
                        <td>{{$d['ayat']}}</td>
                        <td>{{$d['latin']}}</td>
                        <td>{{$d['artinya']}}</td>
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