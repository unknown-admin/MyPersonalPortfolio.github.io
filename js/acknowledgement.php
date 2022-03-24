<?php

$name = filter_input(INPUT_POST,  'name');
$number = filter_input(INPUT_POST, 'number');
$email = filter_input(INPUT_POST, 'email');
$description = filter_input(INPUT_POST, 'description');

if(!empty($name)){
    if(!empty($number)){
        if(!empty($email)){
            if(!empty($description)){
                $host = "localhost";
                $dbusername = "root";
                $password = "";
                $dbname = "acknowledgement";


                $conn = new mysqli ($host,$dbusername,$password,$dbname);

                if(mysqli_connect_error()){
                    die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO acknowledge(name,number,email,description) values ('$name','$number','$email','$description')";
                    if($conn->query($sql)){
                        echo "new record inserted successfully";
                      }
                      else{
                          echo "Error: ".sql ."</br>". $conn->error;
                      }
                      $conn->close();
                    }
                }
            else{
                echo "Write Something";
                die();
            }

        }
        else{
            echo "Email should not be empty";
            die();
        }

    }
    else{
        echo "Number should not be empty";
        die();
    }

}
else{
    echo "Name should be empty";
    die();
}

?>