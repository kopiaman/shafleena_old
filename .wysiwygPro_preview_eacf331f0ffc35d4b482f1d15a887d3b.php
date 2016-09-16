<?php
if ($_GET['randomId'] != "h7BLP6GFD_ldRhFthPwTcVOzsYloBt0qcIUvHw1NSVVcbnAqQ66UYLctrJm92aRQ") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
