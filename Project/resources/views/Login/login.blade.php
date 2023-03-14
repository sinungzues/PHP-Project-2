<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>LOGIN</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet" />
</head>

<body class="text-center">
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #f50000;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">
            <img src="../../img/logo.png" alt="Kabupaten Klaten" width="30" class="d-inline-block align-text-top">
            <strong>PEMDA KLATEN</strong>
        </a>
    </header>

    <div class="row justify-content-center">
        <div class="col-lg-3 pt-5 mt-5">
            <main class="form-signin">
                <form action="/login" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal"><strong>LOGIN</strong></h1>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}" />
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" required />
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
                        Login
                    </button>
                </form>
                <small class="d-block text-center mt-3"><a href="/register">Register!</a></small>
            </main>
        </div>
    </div>

</body>

</html>
