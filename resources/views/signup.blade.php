<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <section class="vh-100" style="background-color: #fcfcfc;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-13">
              <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded border border-primary-subtle border-5" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 justify-content-center align-items-center d-flex ps-3">
                    <img src="img/signin.png"
                      alt="login form" class="img-fluid " style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="/register" method="POST">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Sign-up</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign for your account</h5>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example17">Username</label>
                          <input type="text" name="name" id="form2Example17" placeholder="Username" 
                          class="form-control form-control-lg @error('name') is-invalid @enderror" required value="{{old('name')}}"/>
                          @error('name')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                          <label class="form-label" for="form2Example17">Email</label>
                        <input type="email" name="email" id="form2Example17" placeholder="Email" 
                        class="form-control form-control-lg @error('email') is-invalid @enderror" required value="{{old('email')}}"/>
                        @error('email')
                        <div class="invalid-feedback">
                          {{$message}}
                        </div>
                        @enderror
                      </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example27">Password</label>
                          <input type="password" name="password" id="form2Example27" placeholder="Password" 
                          class="form-control form-control-lg @error('password') is-invalid @enderror" required/>
                          @error('password')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
      
                        <div class="pt-1  mb-4" >
                          <button data-mdb-button-init data-mdb-ripple-init style="width:100%" class="btn btn-primary btn-lg btn-block" type="submit">Sign up</button>
                        </div>
      
                        <a class="small text-muted" href="#!">Forgot password?</a>
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have acount? <a href="/login"
                            style="color: #393f81;">Sign in</a></p>
                        <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>