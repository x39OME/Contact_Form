<?php
    // Check If User Coming From A Request
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Assign Variables 
        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        // Creating Array Of Errors
        $formErrors = array();
        if (strlen($user) <= 3) {
            $formErrors[] = 'Username Must Be Larger Than <strong>3</strong> Characetrs';
        }
        if (strlen($msg) < 10) {
            $formErrors[] = 'Message can\'t Be Less Then <strong>10</strong> Characetrs';
        }
        // If No Errors Send The Email [ maill(To, Subject, Message, Headers, Parameters) ]

        $headers = 'From:' . $mail . '\r\n';
        $myEmail = 'essamabdullah@outlook.sa';
        $subject = 'Contact Form' ; 

        if (empty($formErrors)) {

            mail($myEmail, $subject, $msg, $headers);

            $user = '';
            $mail = '';
            $cell = '';
            $msg  = '';

            $success = '<div class="alert alert-success"> We Have Recieved Your Message</div>';
        }
    }
?>

<!DOCTYPE Html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Contact Form </title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.css"/>
        <link rel="stylesheet" href="css/contact.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" >
        <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        -->
    </head>
    <body>
        
        <!-- Start Form 1 -->
        <div class="container">
            <h1 class="text-center">Contact Me</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <?php if(! empty($formErrors)){ ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php
                            foreach($formErrors as $error){
                                echo $error . '<br/>';
                            }
                    ?>
                </div>
                    <?php } ?>
                    <?php if (isset($success)) { echo $success; }?>
                <div class="form-group">
                    <input class="username form-control" type="text" name="username" 
                           placeholder="Please Type Your Username" 
                           value="<?php if (isset($user)) {echo $user; }?>"/>
                    <i class="fa fa-user fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert" >
                        Email Can't Be Empty
                    </div>
                </div>
                <!--<?php/*
                    if(isset($userError)){
                        echo $userError;
                    }
                */?>-->
                <div class=" email form-group">
                    <input class=" email form-control" type="email" name="email" 
                           placeholder="Please Type A Valid Email"
                           value="<?php if (isset($mail)) {echo $mail; }?>"/>
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="asterisx">*</span>
                    <div class="alert alert-danger custom-alert" >
                        Username Must Be Larger Than <strong>3</strong> Characetrs'
                    </div>
                </div>
                <input class="form-control" type="text" name="cellphone" 
                       placeholder="Please Type Your Cell Phone"
                       value="<?php if (isset($cell)) {echo $cell; }?>"/>
                <i class="fas fa-mobile-alt fa-fw"></i>
                
                <textarea class="message form-control" name="message" placeholder="Your Message!" ><?php if (isset($msg)) {echo $msg; }?></textarea>
                <div class="alert alert-danger custom-alert" >
                    Message can't Be Less Then <strong>10</strong> Characetrs
                </div>
                <!--<?php /*
                    if(isset($msgError)){
                        echo $msgError;
                    }
                */?>-->
                <input class="btn btn-secondary" type="submit" value="Send Message"/>
                <i class="fas fa-paper-plane fa-fw send-icon"></i>
            </form>
        </div>
        
        <!-- End Form 1 -->
        
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
