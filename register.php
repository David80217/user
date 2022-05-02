<?php include("config.php"); ?>
<?php include("tailwind.php")?>
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        $check_username = $connection -> query("SELECT * FROM `user` WHERE username = '$username'");
        if($check_username -> num_rows <= 0){
            if($password == $re_password){
                $register_query = $connection -> query("INSERT INTO `user`(`username`, `password`) VALUES ('$username','$password')");
                if($register_query === true){
                    header("location:login.php");
                }
            }else{
                $sms = "Password Don't match";
            }
        }else{
            $sms = "Use A Different Useraname";
        }
    }
}

?>
<div class="flex-col align-center mx-auto w-96 lg:w-60 h-full mt-20">
    <h1 class="text-2xl px-8 py-4 lg:px-4 lg:py-2 text-white font-bold bg-blue-500">Register</h1>
    <form class="grid items-center gap-3 mt-2" action="" method="post">
        <div class="font-semibold text-2xl lg:text-base">Username <input class="p-1 w-96 lg:w-60 border-sm border-b-2 border-blue-200 hover:border-dotted hover:border-blue-400" type="text" name="username" required></div>
        <div class="font-semibold text-2xl lg:text-base">Password <input class="p-1 w-96 lg:w-60 border-sm border-b-2 border-blue-200 hover:border-dotted hover:border-blue-400" type="text" name="password" required></div>
        <div class="font-semibold text-2xl lg:text-base">Re-Password <input class="p-1 w-96 lg:w-60 border-sm border-b-2 border-blue-200 hover:border-dotted hover:border-blue-400" type="text" name="re_password" required></div>
        <div class="flex w-full justify-end"><button class="p-2 px-5 mt-3 text-white hover:opacity-40 font-semibold text-end bg-blue-500 rounded" type="submit">Register</button></div>
        <div class="flex w-full justify-end self-center font-medium text-sm text-gray-300">Login Here <a class="self-center font-medium text-sm text-blue-400 border-b-2 border-blue-500 ml-1" href="login.php"> Click</a></div>
        <div class="text-center text-red-500" ><?php if(isset($sms)){ echo $sms; }?></div>
    </form>
</div>