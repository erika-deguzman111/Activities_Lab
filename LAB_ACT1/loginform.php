<!DOCTYPE html>
<html>
<head>
<style>

.container{
    width:40%;
    margin:0 auto;
}


#div_login{
    border: 1px solid gray;
    border-radius: 3px;
    width: 470px;
    height: 270px;
    box-shadow: 0px 2px 2px 0px  pink;
    margin: 0 auto;
}

#div_login h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
    background-color: Gray;
    color: white;
    font-family: Calibri;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
}

#div_login .textbox{
    width: 96%;
    padding: 7px;
}

#div_login input[type=submit]{
    padding: 7px;
    width: 100px;
    background-color: pink;
    border: 0px;
    color: black;
}
</style>
    <body>
        <div class="container">
            <form name="Login" method="post" action="welcome.html">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username " />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="submit" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>


</body>
</html>


<?php

if(isset($_POST['submit'])){
$USER= $_POST['txt_uname'];
$PASS= $_POST['txt_pwd'];

if ($USER==("ADMIN")&& $PASS==("123")){
    header("location:welcome.html");
    exit();
}
  else
            echo "Invalid username and password";
        }
  
?>