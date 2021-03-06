<?php

/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name User.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package User
 * 
 */
class User {

    private $session = '';

    function __construct() {
        session_start();
    }

    /**
     * 
     * @global type $pdo
     * @param type $username
     * @param type $password
     */
    public function authenticate($username = "", $password = "") {
        global $pdo;
        $submitted_username = '';
        if (!empty($_POST)) {
            $query = "SELECT * FROM wms_users WHERE username = :username";
            $query_params = array(':username' => $_POST['username']);

            try {
                $stmt = $pdo->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
            $login_ok = false;
            $row = $stmt->fetch();
            if ($row) {
                $check_password = hash('sha256', $_POST['password'] . $row['salt']);
                for ($round = 0; $round < 65536; $round++) {
                    $check_password = hash('sha256', $check_password . $row['salt']);
                }

                if ($check_password === $row['password']) {
                    $login_ok = true;
                }
            }
            if ($login_ok) {
                unset($row['salt']);
                unset($row['password']);
                $_SESSION['user'] = $row;
                header("Location: profile");
            } else {
                print("Login Failed.");
                $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
                $willow = new StandAlone();
                $redirect_to_login = $willow->redirect_to_login();
            }
        }
    }

}