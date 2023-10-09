<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/jquery31.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/validation.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    
</head>

<body>
    <div class="box">

        {{-- <img src="icon.png"> --}}
        <div class="page">
            {{-- <div class="header">
                <a id="login" class="active" href="#login">login</a>
                <a id="signup" href="#signup">signup</a>
            </div> --}}
            {{-- <div id="errorMsg"></div> --}}
            <div class="content">
                <form class="login" action="#" name="loginForm" id="signinform" method="POST">
                    @csrf
                    <input type="text" name="email" id="logName" placeholder="Username or Email">
                    <input type="password" name="password" id="logPassword" placeholder="Password">
                    <div id="check">
                        <input type="checkbox" id="remember" name="checkbox">
                        <label for="remember">Remember me</label>
                    </div>
                    <br><br>
                    <input type="submit" value="Login">
                    <a href="#">Forgot Password?</a>
                    <br>
                    Don't have an account? <a href="{{route('testimonial.signup')}}">Signup</a>

                </form>
            </div>
        </div>
    </div>
</body>
<script>
      $(document).ready(function (e) {
    $("#signinform").submit(function (e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url : "{{route('testimonial.userlogin')}}",
            data: $(this).serialize(),
            success: function (response){
                if(response == '1'){
                    
                    Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'User login successfully',
                        }).then(function () {
                            // Redirect or perform other actions after success
                             window.location.href = "{{ route('user.testimonial') }}";
                        });
                } else {
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'invalid credentials failed',
                        });
                }
            }
        })
    })
  });
    </script>
</html>