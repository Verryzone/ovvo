<?php 
    class database {
        var $host = 'localhost';
        var $username = 'root';
        var $password = '';
        var $db = 'ovvo';

        function __construct(){
            $this -> koneksi = mysqli_connect(
                $this -> host,
                $this -> username,
                $this -> password,
                $this -> db
            );
        }

        function update_last_login($id) {
            $woo = '' .$id;
        }

        function login($username, $password) {
           $query = mysqli_query($this -> koneksi, "SELECT * FROM user_right WHERE username = '$username' AND password = '$password'");
           $data = $query -> fetch_array();
           $jml = $query -> num_rows;

           if($jml == 1) {
            setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
            setcookie('username', $data['id'], time() + (60 * 60 * 24 * 5), '/');
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $username;
            $_SESSION['type'] = $username;
            $_SESSION['is_login'] = true;

            $this -> update_last_login($data['id']);
            return true;
           } else {
                return false;
           }

           
        }

        function logout() {
            $_SESSION['is_login'] = false;
            session_start();
            session_unset();
            session_destroy();
            setcookie('username', '', 0, '/');
            setcookie('id', '', 0, '/');
            session_destroy();
 
         }
            
    }
?>