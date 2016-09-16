<?php
if ($_GET['randomId'] != "3c2wmMwZxdzHIPz2fdr17PtR96PqZSKJceVzsMyhelin0gpXcO2ENWHIKdim1lYR") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
