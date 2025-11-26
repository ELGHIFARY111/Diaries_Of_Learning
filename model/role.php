<?php
function cek_role(){
    if ($_SESSION['user_role'] == 'superadmin') {
        return True;
    }else{
        return False;
    }
}

?>