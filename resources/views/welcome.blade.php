<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <style>
        /* Set a background color for the body */
body {
  background-color: #f2f2f2;
}

/* Style the container */
.container {
  margin-top: 50px;
}

/* Style the card */
.card {
  border: none;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
}

/* Style the card header */
.card-header {
  background-color: #fff;
  border-bottom: none;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  padding-bottom: 0;
  text-align: center;
}

/* Style the card body */
.card-body {
  background-color: #fff;
  border-radius: 5px;
  padding: 20px;
}

/* Style the login and register buttons */
.btn {
  border-radius: 25px;
  font-weight: bold;
  margin-top: 20px;
  padding: 10px 20px;
  text-transform: uppercase;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  color: #fff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  color: #fff;
}

.btn-secondary:hover {
  background-color: #5a6268;
  border-color: #545b62;
}

    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to the Student Portal!</div>

                <div class="card-body">
                    <p>Thank you for choosing our platform to enhance your education.</p>
                    <p>Please login or register to get started.</p>
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-primary mx-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary mx-2">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>