<?php include("config.php"); ?>
<?php include("tailwind.php"); ?>
<?php
session_start();
$friends = $connection -> query("SELECT `user_id`, `username`, `password` FROM `user`");

?>
<body>
    <div class="container mx-auto grid justify-center">
        <div class="flex my-4">
            <h1 class="text-5xl flex text-gray-500 gap-4"><div class="w-16 h-16 bg-gray-500 rounded-full self-center px-2"></div><span class="self-center"> | <?php echo $_SESSION["username"]; ?></span></h1><a class="self-center ml-4 font-medium text-md text-red-400 border-b-2 border-red-400 relative top-4" href="logout.php">Log Out</a>
        </div>
    </div>
</bodyborder-4 >