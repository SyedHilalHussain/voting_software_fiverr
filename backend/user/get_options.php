<?php
require_once('../database.php');
class API extends DBConnection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function __destruct()
    {
        parent::__destruct();
    }
    function getCategory()
    {
        // Fetch Community options based on the selected Category
        if (isset($_POST['communityId'])) {
            $communityId = $_POST['communityId'];
            $community_query = $this->conn->query("SELECT DISTINCT category.*
            FROM problem p
            JOIN category ON category.category_id = p.category_id
            WHERE p.community_id = $communityId;
            
            ");
    
            $options = '<option value="">Select Category</option>';
            while ($row = mysqli_fetch_assoc($community_query)) {
                $options .= '<option value="' . $row['category_id'] . '">' . $row['category'] . '</option>';
            }
    
            echo $options;
        }
    }
    
    function getuser()
    {
        // Fetch User options based on the selected Community
        if (isset($_POST['categoryId'])) {
            $categoryId = $_POST['categoryId'];
            $communityId = $_POST['communityId'];
            $user_query = $this->conn->query("SELECT * FROM user
            JOIN problem p ON user.user_id = p.user_id
            WHERE p.category_id = $categoryId and p.community_id = $communityId");
    
            $options = '<option selected>Select User</option>';
            while ($row = mysqli_fetch_assoc($user_query)) {
                $options .= '<option value="' . $row['user_id'] . '">' . $row['name'] . '</option>';
            }
    
            echo $options;
        }
    }
    
    function getproblem()
    {
        // Fetch Problem options based on the selected User
        if (isset($_POST['userId'])) {
            $userId = $_POST['userId'];
            $communityId=$_POST['communityId'];
            $categoryId=$_POST['categoryId'];
            $votinguserId = $_POST['votinguserId'];
            $problem_query = $this->conn->query("SELECT * 
            FROM problem
            WHERE user_id = $userId
              AND category_id = $categoryId
              AND community_id = $communityId
              AND problem_id NOT IN (
                SELECT problem_id
                FROM vote
                WHERE user_id = $votinguserId
              );
            ");
        
            $options = '<option selected value ="" >Select Problem</option>';
            while ($row = mysqli_fetch_assoc($problem_query)) {
                $options .= '<option value="' . $row['problem_id'] . '">' . $row['problem'] .'</option>';
            }
    
            echo $options;
        }
    }
  
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$api = new API();
switch ($action) {
    case ('getCategory'):
        echo $api->getCategory();
        break;
    case ('getuser'):
        echo $api->getuser();
        break;
    case ('getproblem'):
        echo $api->getproblem();
        break;
    default:
        echo json_encode(array('status' => 'failed', 'error' => 'unknown action'));
        break;
}



