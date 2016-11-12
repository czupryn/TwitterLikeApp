
<form action="../Controller/mainPage.php" id="createTweetForm" method="POST">
    <textarea name="message" form="createTweetForm" placeholder="Type your tweet..." maxlength="60"></textarea>
    <input type="submit"value="submit">
</form>
<?php
//    if(isset($_SESSION['recoveredMessage'])){
//        
//         echo "<textarea name='message' form='createTweetForm' placeholder='Type your tweet...' maxlength='60'>".$_POST['recoveredMessage']."</textarea>";
//            unset($_SESSION['recoveredMessage']);
//            
//        }
//    else{
//        echo "<textarea name='message' form='createTweetForm' placeholder='Type your tweet...' maxlength='60'></textarea>";
//    }
  ?>
