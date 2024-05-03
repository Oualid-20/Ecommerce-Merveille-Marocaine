<?php 
    session_start();
    $pageTitle = "Acceuil";
    include"includes/head.php" ;
    //var_dump($_SESSION);
    
?>

    <!-- déja connecter -->
    <?php  echo isset($_SESSION["message_dejaIN"]) ? $_SESSION["message_dejaIN"] : ""; unset($_SESSION["message_dejaIN"]);?>
</head>

<body>
<?php
    include "includes/navBar.php" ; ?>





    
    <?php include"includes/footer.php" ?>