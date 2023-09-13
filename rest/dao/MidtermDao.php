<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {

    public function __construct(){
        parent::__construct();
    }

    /** TODO
    * Implement DAO method used add new investor to investor table and cap-table
    */
    public function investor(){

    }

    /** TODO
    * Implement DAO method to validate email format and check if email exists
    */
    public function investor_email($email){
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'Invalid email format';
        }
        $stmt = $this->conn->prepare("SELECT first_name, last_name FROM investors WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $firstName = $result['first_name'];
            $lastName = $result['last_name'];
            return "Investor $firstName $lastName uses this email address";
        } else {
            return 'Investor with this email does not exist in the database';
        }

    }

    

    /** TODO
    * Implement DAO method to return list of investors according to instruction in MidtermRoutes.php
    */
    public function investors(){
        

    }

}
?>
