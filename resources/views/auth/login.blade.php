@extends('layouts.base')
@section('content')
    <div class="container-fluid p-0">
        <div class="row background-div">
            <div class="gradient-background"></div> <!-- Gradient Background Layer -->
            <div class="top-left-image"></div> <!-- Top-left Image Layer -->

            <!-- Left Side Div with Background Image and Gradient (Left to Right) -->
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                <!-- Welcome Text -->
                <img src="assets/img/shllogo.png" alt="Welcome Image" class="welcome-image welcome-text">
                <h3 class="text-white text-center welcome-text">Login into</h3>
                <h3 class="text-white text-center welcome-text">your account</h3>

            </div>

            <!-- Right Side Form (Increased Size) -->
            <div class="col-md-6 d-flex justify-content-center align-items-center login-custom">
                <form action="{{ route('login') }}" class="p-3 rounded shadow bg-white small-form" method="post"
                    accept-charset="utf-8">
                    @csrf
                    <h2 class="form-signin-heading">Welcome, User!</h2>
                    <p class="form-signin-text">Please log in</p>
                    <div class=" left-addon">
                        <div class="col-md-12  ml-auto">
                            <label for="username" class="col-form-label fw-bold">Username</label>
                            <i class="fa-solid fa-globe"></i>
                            <input type="email" name="email" class="form-control" id="username"
                                placeholder="Enter your username">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="left-addon">
                        <div class="col-md-12 ml-auto position-relative">
                            <label for="password" class="col-form-label fw-bold">Password</label>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Enter your password">
                            <p class="form-signin-text">I forgot my password </p>


                            <!-- Eye icons inside the input field -->
                            <span class="field-icon toggle-password">
                                <!-- Show Eye (red) -->
                                <i class="fas fa-eye-slash" onclick="togglePassword()" id="eye-icon"
                                    style="color:gray; display:none;"></i>
                                <!-- Hide Eye Slash (blue) -->
                                <i class="far fa-eye" onclick="togglePassword()" id="eye-slash-icon"
                                    style="color:gray;"></i>
                            </span>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary login-button">Login</button>
                        <!-- <button type="reset" class="btn btn-secondary">Clear</button> -->
                    </div>
                </form>

            </div>

        </div>
    </div>
    <style>
        /* Left Side with Gradient */
        .login-button {
            border: 1px solid transparent;
            box-shadow: unset;
        }

        .background-div {
            height: 100vh;
            /* Full height */
            position: relative;
            /* Needed for positioning the image */
            color: white;
            overflow: hidden;
            /* To hide overflow */
        }

        /* Gradient Background */
        .gradient-background {
            background-color: #191970;
            /* For browsers that do not support gradients */
            background-image: linear-gradient(#191970, green);
            /* background: linear-gradient(0deg, rgba(16,185,129,1) 0%, rgba(37,65,112,1) 100%); */
            position: absolute;
            /* Positioning */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            /* Behind the image */
        }

        /* Small Top-left Image Styling */
        .top-left-image {
            background: url('assets/img/circle-removebg-preview.png') no-repeat;
            /* Small image */
            background-size: contain;
            /* Keep the original size of the image */
            position: absolute;
            /* Positioning */
            top: 0px;
            /* Adjust as needed */
            left: 0px;
            /* Adjust as needed */
            width: 650px;
            /* Adjust width */
            height: 100vh;
            /* Adjust height */
            z-index: 2;
            /* Ensure this image is above the gradient */
        }

        /* Increased Form Width */
        .small-form {
            /* width: 600px;
              border: 1px solid #ddd;
              background-color: white;
              position: relative;
              z-index: 2;
              padding: 48px !important; */
            width: 438px;
            border: 1px solid #ddd;
            background-color: white;
            position: relative;
            z-index: 2;
            /* padding: 48px !important; */
            PADDING: 45px 43px !important;
        }

        /* Additional form styling */
        form {
            border-radius: 10px;
        }

        /* Z-index for Welcome Text */
        .welcome-text {
            position: relative;
            z-index: 2;
            /* Ensure this text appears above other elements */
        }

        /* Styling for the paragraph */
        .welcome-paragraph {
            font-size: 1.1rem;
            /* Slightly larger font size */
            line-height: 1.5;
            /* Better line spacing */
            text-align: center;
            /* Centered text */
            max-width: 600px;
            /* Limit the width */
            margin: 20px auto;
            /* Center with margin */
        }

        /* Image Styling */
        .welcome-image {
            width: 100%;
            /* Responsive image */
            max-width: 400px;
            /* Maximum width */
            margin: 20px auto;
            /* Centering with margin */
            display: block;
            /* Ensure it's block-level */
        }

        .font-one {
            color: black;
        }

        .col-form-label {
            color: black;
        }
    </style>

    <script>
        function togglePassword() {
            debugger
            let passwordInput = document.getElementById("password");
            let eyeIcon = document.getElementById("eye-icon");
            let eyeSlashIcon = document.getElementById("eye-slash-icon");

            if (passwordInput.type === "password") {
                // Show password and swap icons
                passwordInput.type = "text";
                eyeIcon.style.display = "inline";
                eyeSlashIcon.style.display = "none";
            } else {
                // Hide password and swap icons
                passwordInput.type = "password";
                eyeIcon.style.display = "none";
                eyeSlashIcon.style.display = "inline";
            }
        }
    </script>
@endsection
