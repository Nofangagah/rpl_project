<?php
 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'db_tes' ) or die(mysqli_error($db));


        function remove_junk($str){
                $str = nl2br($str);
                $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
                return $str;
              }
      
              function validate_fields($var){
                global $errors;
                foreach ($var as $field) {
                  $val = remove_junk($_POST[$field]);
                  if(isset($val) && $val==''){
                    $errors = $field ." can't be blank.";
                    return $errors;
                  }
                }
              }
              function real_escape($str){
                global $con;
                $escape = mysqli_real_escape_string($con,$str);
                return $escape;
              }
        
?>



