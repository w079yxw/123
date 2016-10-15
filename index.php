<?php
session_start();
require_once('model/database.php');
require_once('model/member_db.php');
require_once('model/user_db.php');

//get the action to be performed
$action = filter_input(INPUT_POST, 'action');
//include('view/home_view.php');
if ($action == NULL) {
    echo "hello";
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL ||$action == 'login' ) {
        $action = 'home_view';
       // include('view/home_view.php');
        
    } 
    else if ($action == 'create_new_user') {
          include('view/new_user_form.php');
     }
      
    
      
}
    else if (!isset($_SESSION['is_valid_user'])) {
       $action = 'login';
        }
 
else if ($action == 'test') {
          echo "hellp";
     }


//The main switchboard for site navigation
switch ($action){
    //take the user to the main menu
    case 'login':
        echo "123";
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (is_valid_user_login($username, $password)) {
            $_SESSION['is_valid_user'] = true;
            if (is_valid_admin_login($username)){
                $_SESSION['is_valid_admin'] = true;
            }
            //check the role and navigate to a new menu here
            include('home_view.php');
        } else {
            $login_message = 'You must login to continue';
            include ('view/login.php');
        }
        break;
    case 'home_view':
        //echo"123";
        include('view/home_view.php');
        echo get_member(5);
        break;
    case 'member_view':
        include('view/directory/members/member_view.php');
        break;
    case 'group_view':
        include('view/directory/groups/group_view.php');
        break;
    case 'view_messages_view':
        include('view/messages/view_messages_view.php');
        break;
    case 'send_messages_view':
        include('view/messages/send_messages_view.php');
        break;
    case 'profile_view':
        include('view/profiles/manage_user_profiles.php');
        break;
    case 'logout':
        include('view/logout.php');
        break;
    case 'new_user':
        echo "hit";
       // $name = "123";
        $username = filter_input(INPUT_POST, 'username');
       echo $username;
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        if (password1 != password2){
            echo "Passwords do not match, try again.";
            break;
        }
        if(is_unique_username($username)){
            add_user($username, $password);
        } else {
            echo ("Username is taken. Try again.");
        }
        echo 'New user added. Login to continue.';
        break;
}


?>

