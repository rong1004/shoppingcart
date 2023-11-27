<?php
    $q_score = $_POST['quality'];
    $feedback_txt = $_POST['suggestion'];
    include '../../config/connection.php';

    $sql = "INSERT INTO feedback VALUES (NULL,'$q_score','$feedback_txt')";
    if(mysqli_query($connect, $sql)){
        echo 'Thank you for your feedback. We\'ll appreciate!';
        
        ?>
        <script> location.replace("../../thankyoupage.php"); </script>
      
       <?php
    } else{
        die("Something terrible happened. Please try again. ");
?>
        <script> location.replace("feedback.php"); </script>
      
       <?php
    }
    
    
    mysqli_close($connect);
    ?>
    history.back()