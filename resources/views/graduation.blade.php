<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-xmFkyg5vYB9erFipkaXcPMLzLHevFgLIz4IEYzY4+iM3JqE4nPFFX9V03bXaGkIv" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
    href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* nav-bar styling */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #0689bb;
    color: #fff;
    height: 60px;
    padding: 0 20px;
}

.navbar-left {
    flex: 1;
    text-align: left;
}

.navbar-center {
    flex: 5;
    text-align: center;
}

.navbar-right {
    flex: 1;
    text-align: center;
}


.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: #fff;
    text-decoration: none;
}

.navbar-links {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

.navbar-links li {
    margin-right: 20px;
}

.navbar-links li:last-child {
    margin-right: 0;
}

.navbar-links a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

/* main container styling */
.container {
    padding: 20px;    
}

.alert {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: .75rem 1.25rem;
    margin-bottom: 20px;
    border-radius: .25rem;
}

.alert-success {
    background-color: #d1e7dd;
    border-color: #badbcc;
    color: #0c5460;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

th {
    background-color: #333;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #fff;
    border: 1px solid #ced4da;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}

.btn-primary:focus, .btn-primary.focus {
    box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5);
}

.btn-primary.disabled, .btn-primary:disabled {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
.show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #0062cc;
    border-color: #005cbf;
}


    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <a href="#" class="navbar-brand">Student Portal</a>
        </div>
        <div class="navbar-center">
            <ul class="navbar-links">
                <li><a href="{{ route('dashboard') }}">Courses</a></li>
                <li><a href="{{ route('graduation') }}">Graduation</a></li>
                <li><a href="{{ route('profile') }}">View Profile</a></li>
            </ul>
        </div>
        <div class="navbar-right">
        <ul class="navbar-links">
        <li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" style="display:none;"></button>
                </form>
                <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Graduation</h1>
        @if($graduation_status == 2)
            <b style="color:green">You are Eligible to Graduate</b>
        @else
            <b style="color:red">You are not Eligible to Graduate</b>
            <p>You have pending invoices to pay</p>
            <br>
            <h3 style="color:blue;">Pending Invoices:</h3>
            @foreach($invoices as $invoice)
                @if($invoice->status == 'UNPAID')
                <p><b>Invoice Reference:</b> {{ $invoice->invoice_ref }}</p>
                <p><b>Invoice Amount:</b> {{ $invoice->amount }}</p>
                <br>
                @endif
            @endforeach
        @endif
        
    </div>
    
</body>
</html>
