<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>SignUp Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/jquery31.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/validation.js')}}"></script>

    {{-- sweet alert messages --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="box">

        {{-- <img src="icon.png"> --}}

        {{-- @include('testimonial::messages.message') --}}
        <div class="page">
            <div id="errorMsg"></div>
            <div class="content">
                @include('testimonial::messages.message')
                <form class="signup" action="#" name="signupForm" id="signupform" method="POST">
                    @csrf
                    <input type="email" name="email" id="logName" placeholder="email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif

                    <input type="text" name="username" id="logusername" placeholder="username" value="{{old('username')}}">
                    @if($errors->has('username'))
                    <div class="text-danger">{{ $errors->first('username') }}</div>
                    @endif

                    <input type="password" name="password" id="logPassword" placeholder="Password" value="{{old('password')}}">
                    @if($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                    {{-- <div id="check">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember me</label>
                    </div> --}}
                    <br><br>
                    <input type="submit" value="Signup">
                    Alredy have an account? <a href="{{route('testimonial.signin')}}">Signin</a>
                </form>
            </div>
        </div>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="index.js"></script> --}}
</body>
<script>
  $(document).ready(function (e) {
    $("#signupform").submit(function (e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url : "{{route('testimonial.usersignup')}}",
            data: $(this).serialize(),
            success: function (response){
                if(response == '1'){
                    
                    Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'User registered successfully',
                        }).then(function () {
                            // Redirect or perform other actions after success
                             window.location.href = "{{ route('testimonial.signup') }}";
                        });
                } else {
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'User registration failed',
                        });
                }
            }
        })
    })
  });
    </script>
</html>