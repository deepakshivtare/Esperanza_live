<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>

    <style>
        Body {
            font-family: Calibri, Helvetica, sans-serif;
            background-image: url("./img/about.jpg");
        }

        #button {
            background-color: #6262e2;
            width: 100%;
            color: rgb(255, 255, 255);
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
        }


        input[type=text],
        input[type=password] {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            display: inline-block;
            border: 2px solid rgb(126, 0, 128);
            box-sizing: border-box;
        }

        #button:hover {
            opacity: 0.7;
        }

        .cancelbtn {
            background-color: #6262e2;
            width: 100%;
            color: rgb(255, 255, 255);
            padding: 15px;
            margin: 10px 0px;
            border: none;
            cursor: pointer;
            width: auto;
            padding: 10px 18px;
            margin: 10px 5px;
            align-items: center;
            text-decoration: none;
            text-align: center;
        }


        .container {
            padding: 30px;
            background-color: rgb(254, 254, 254);
            border-radius: 30px;
            width: 20rem;
            height: 25rem;
            display: flex;
            flex-direction: column;

            justify-content: space-around;

        }

        #login {
            display: flex;
            justify-content: center;
        }
    </style>

</head>

<body>
    <center>
        <h1> Esperanza Login Form </h1>
    </center>
    <form id="login">
        <div class="container">
            <label>Username : </label>
            <input type="text" placeholder="Enter email" name="email" id="email">
            <label>Password : </label>
            <input type="password" id="password" placeholder="Enter Password" name="password">
            <input id="button" type="button" value="Login" onclick="redirectToHome();">
            <div><input type="checkbox" checked="checked"> Remember me </div>
            <form action="../forms/signup.html">
                <a href="../forms/signup.html" class="cancelbtn">
                    Create an account </a>
            </form>

            <a href="#"> Forgot password? </a>
        </div>
    </form>


    
</body>

</html>