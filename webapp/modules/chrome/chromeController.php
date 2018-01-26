<?php

class chrome {
    function action_init() {
       
       $images = array();
       $images[] = 'https://www.html5rocks.com/static/images/tutorials/easy-hidpi/chrome1x.png';
       $images[] = 'https://www.html5rocks.com/static/images/tutorials/easy-hidpi/chrome1x.png';
       $images[] = 'https://www.html5rocks.com/static/images/tutorials/easy-hidpi/chrome1x.png';
       
       $images[] = 'https://www.html5rocks.com/static/images/tutorials/easy-hidpi/chrome1x.png';
       
        $smarty=new Sugar_Smarty();
        $smarty->assign("images",$images);
        $tpl  = 'webapp/modules/chrome/tpl/chrome.html';
        echo $smarty->fetch($tpl);
       die;
    }
    function validateSessionId($sessionId) {
        $info = session_id($sessionId);
        if(empty($_SESSION)) {
            return false;
        } 
        return true;
    }
    function action_validateSession() {
        $sessionId  = $_REQUEST['imgpic_session_id'];
        $info = session_id($sessionId);
        $result = array("status"=>"pass");
        if(empty($_SESSION)) {
            $result['status'] = "fail";
        }
        
        echo json_encode($result);
        die;
    }

    function doLogin()  {
        global $db;
        $user = $_REQUEST['imgpic_user_name'];
        $pass = $_REQUEST['imgpic_password'];
        
        if($user && $pass) {
            $sql = "select id,user_name from users where deleted=0 and user_name = '".$user."' and user_hash=md5('".$pass."') and status='Active' ";
           
            $query  = $db->query($sql);
            $count = $query->num_rows;
            if($count>=1) {
                $row = $db->fetchByAssoc($query);
                $_SESSION['uid'] = $row['id'];
                $_SESSION['username'] = $row['user_name'];
                $response['session_id'] = session_id();
                $response['status'] = "pass";
                $response['message'] = "";
                return true;
            }

            
        }
        return false;
    }
    function action_login() {
        global $db;
        
        $user = $_REQUEST['imgpic_chorme_username'];
        $pass = $_REQUEST['imgpic_chrome_password'];
        
        $response = array("status"=>"fail","message"=>"username or password is incorrect","session_id"=>"");
      
       

        
        if($user && $pass) {
            $sql = "select id,user_name from users where deleted=0 and user_name = '".$user."' and user_hash=md5('".$pass."') and status='Active' ";
           
            $query  = $db->query($sql);
            $count = $query->num_rows;
            if($count>=1) {
                $row = $db->fetchByAssoc($query);
                $_SESSION['uid'] = $row['id'];
                $_SESSION['username'] = $row['user_name'];
                $response['session_id'] = session_id();
                $response['status'] = "pass";
                $response['password'] = $pass;
                $response['username'] = $user;

                $response['message'] = "";
            }

            
        }
        echo json_encode($response);
        
        
        die;
    }

    function getUserBoards($uid) {
        global $db;
        $sql = "select b.id,b.name from rc_board_users_c bu 
                inner join rc_board b on bu.rc_board_usersrc_board_idb  = b.id and b.deleted=0
                where bu.rc_board_usersusers_ida='".$uid."' and  bu.deleted=0";
        $qry = $db->query($sql);
        $boards = array();
        while($row=$db->fetchByAssoc($qry)) {
            $boards[$row['id']] = $row['name'];
        }
        return $boards;        
    }

    function action_getUserBoards() {
        global $db;
        $sessionId = $_REQUEST['imgpic_session_id'];
        $isSession = $this->doLogin();
        $result = array("status"=>"fail","boards"=>array());
        if($isSession) {
            $result['html'] = '';
            $uid = $_SESSION['uid'];
            $result['boards'] = $this->getUserBoards($uid);
            $result['status'] = "pass";
            if(empty($result['boards'])) {
                $result['html'] = "<tr><td>you dont have any boards. Please create boards by log in imgpic site.</td></tr>";
            }
            foreach($result['boards'] as $key=>$name) {
                $result['html'] .= '<tr><td>'.$name.'</td><td><button type="button" onclick="imgpicExtSaveBoard(this,\''.$key.'\')">Save</button></td></tr>';
            }
        }
        echo json_encode($result);
        die;
    }


    function action_saveImageToBoard() {
        global $sugar_config;
        $result = array("status"=>"fail");
        $sessionId = $_REQUEST['imgpic_session_id'];
        
        $isSession = $this->doLogin();
        if($isSession) {
                require_once 'webapp/modules/ip_user/ip_userController.php';
                $ipUser = new ip_user();
                $string = $_REQUEST['imgsrc'];
                if(!empty($string)){
                    $ext = getExtension($string);
                    if(in_array($ext,$sugar_config['valid_img_ext'])) {
                        $ipUser->uploadImageToAWS();
                        $result['status'] = "pass";
                    }
                }
        }
        echo json_encode($result);
        die;
    }
}
?>