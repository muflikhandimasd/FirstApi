<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://img.icons8.com/office/16/000000/goal--v1.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Laravel Project</title>
</head>

<style>
    @media (max-width: 600px) {
        .jarak {
            padding-top: 40px;
            padding-bottom: 100px;
        }

        .jarakk {
            padding-top: 40px;
        }
    }

    .ancor {
        text-decoration: none;
        color: black;
    }

    .card {
        border: none;
    }

    .card:hover {
        color: black;
        /* box-shadow: 5px 10px #474a4ecf; */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .latar {
        background: linear-gradient(90deg, #F6F8FD 29px, transparent 1%) center, linear-gradient(#F6F8FD 29px, transparent 1%) center, #bfc5d3;
        background-size: 30px 30px;
    }

    .gambar {
        width: 80px !important;
        padding-top: 100px;
        padding-bottom: 30px;
    }

    .scroll {
        overflow-y: hidden;
    }

    .scroll-modal {
        height: 450px;
        overflow-x: hidden;
    }

</style>


<body class="container latar">
    <div class="text-center">
        <a href="https://sharing-laravel-project.herokuapp.com/">
            <img class="gambar" src="https://img.icons8.com/clouds/100/000000/pi.png">
        </a>
    </div>


    <div class="d-flex justify-content-center align-items-center" style="padding-bottom: 100px;">
        <div class="row text-center">

            <div class="col d-flex justify-content-center">
                <a class="ancor" href="https://sharing-laravel-project.herokuapp.com/post-data">
                    <div class="card latar" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1595319100920-5da5c235107a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=868&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text">Data Post</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col jarakk d-flex justify-content-center">
                <a class="ancor" href="https://sharing-laravel-project.herokuapp.com/kategori">
                    <div class="card latar" style="width: 18rem;">
                        <img height="193px"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9EXmyJyx8RhKDVPHRUsFuwxPlBwQNUNpVoqku2Zj0FKZWpTRKq_n7rdpsub8zs7QWvwI&usqp=CAU"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text">Data Kategori</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col jarak d-flex justify-content-center">
                <a class="ancor" href="https://sharing-laravel-project.herokuapp.com/">
                    <div class="card latar" style="width: 18rem;">
                        <img src="https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=871&q=80"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text">Home</h5>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
