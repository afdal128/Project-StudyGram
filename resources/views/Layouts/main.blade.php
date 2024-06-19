<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid" data-bs-theme="dark">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary sticky ">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100" style="height: 100%">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="img/SG.png" width="50" height="50" class="rounded-circle m-2 float-start" alt=""><br>
                        <span class="fs-5 d-none d-sm-inline">StudyGram</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                        <li class="nav-item ">
                            <a href="/" class="nav-link {{($title === "home") ? 'active' : ''}} align-middle px-0">
                                <i class="bi bi-house-fill"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="/activity" class="nav-link  {{($title === "activity") ? 'active' : ''}} px-0  align-middle">
                                <i class="bi bi-bell-fill"></i> <span class="ms-1 d-none d-sm-inline">Activity</span></a>
                        </li>
                    </ul>
                        <hr>
                        <div class="dropdown pb-sm-auto pb-4">
                            <a href="/login" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-sm-inline mx-1">User</span>
                            </a>
                            <form action="/logout" method="post">
                                @csrf
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                    <li><button type="submit" class="dropdown-item">Sign out</button></li>
                                </ul>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col">
                    @yield('container')
            </div>
        </div>
    </div>
    @yield('modal')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>