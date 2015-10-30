<?php


/**
* 
*/
Class Connection {
	
private $host;
private $host_user;
private $host_pass;
private $db_name;
public  $db;

    function __construct(){
		# code...

		try {

		$this->host 			= 'localhost';
		$this->host_user 		= 'ani';
		$this->host_pass 		= 'vAHDlwrk3y7q';
		$this->db_name 			= 'ani';

		//Main Connection script
		$this->db = new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->host_user, $this->host_pass);
		$this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$this->db->setAttribute( PDO::ATTR_EMULATE_PREPARES, 0 );
		$this->db->exec("SET CHARACTER SET utf8");

		} catch (PDOException $err){

            echo "harmless error message if the connection fails";
            $err->getMessage() . "<br/>";
            die();  //  terminate connection

		}

	}

	public function base_url(){

		echo 'http://localhost/tutionibd/';

	}

	public function string_sanitize($value) {
	
	    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
	    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

	    return str_replace($search, $replace, $value);
	
	}

	public function sanitize($value){

		return $this->string_sanitize(htmlentities(trim($value)));
	
	}

	public function error($error) {

		echo '<div class="alert alert-danger">
                                    <strong>Error!</strong>
                                    '.$error.'
                                    </div>';

	}

	public function news_alert($msg){

		echo '<center> <div class="isa_info rads">
                        <i class="fa fa-info-circle"></i>
                        '.$msg.'
                    </div>
              </center>';

	}

	public function user_error($message){

		echo '<div class="isa_warning rads">
				     <i class="fa fa-warning"></i>
				     '.$message.'
				</div>';
	}

	public function  user_succeess($messasge){

		echo '<div class="isa_success rads">
				       <i class="fa fa-check"></i>
				       '.$messasge.'
				  </div>';

	}

	public function success($mesasge){

		echo '<div class="alert alert-success">
                                        <strong>Succees!</strong>
                                        '.$mesasge.'
                                    </div>';
	}

	public function redirect($link){

		header('Location:'.$link);
	}

	public function login_kick(){

		if (empty($_SESSION['ajob_user_id']) === true) {
			# code...
			$this->redirect('login_frontpage.php');
		}

	}

	public function index_kick(){

		if (empty($_SESSION['ajob_user_id']) === false) {
			# code...
			$this->redirect('login.php');
		}
	}

	public function edit_kick($id){

		if (empty($id) === true) {
			# code...
			$this->redirect('index.php');
		}

	}

	public function email($to,$subject,$message){

		mail($to, $subject, $message);

	}

	public function in_string ($stringtocheck){
    
		$forbiddennames = array('#','%','^','\'','"','$','!','`','~',' ','@');

    foreach ($forbiddennames as $name) {
        if (stripos($stringtocheck, $name) !== FALSE) {
            return true;
        }
    }

	}

	public function clean_comma_string($string){

		preg_replace('/,{2,}/', ',', trim($string, ','));
	}

	public function checkBin($binNumber) {

		$query = $this->db->prepare("SELECT COUNT(`auto_id`) FROM `bin` WHERE `bin_number` = :binNumber");
		$query->bindParam(':binNumber',$binNumber);
		$query->execute();
		return $query->fetchColumn();
	}

	public function addBin($binNumber,$name,$address) {

		$query = $this->db->prepare("INSERT INTO `bin` SET `bin_number` = :binNumber , `name` = :name , `address` = :address");
		$query->bindParam(':binNumber',$binNumber);
		$query->bindParam(':name',$name);
		$query->bindParam(':address',$address);
		$query->execute();
	}

	public function getBinInfo($binNumber){

		$query = $this->db->prepare("SELECT `name` , `address` FROM `bin` WHERE `bin_number` = :binNumber LIMIT 1");
		$query->bindParam(':binNumber',$binNumber);
		$query->execute();
		return $query->fetchAll();
	}

	public function hitCount(){

		$query = $this->db->query("SELECT count from count limit 1");
		$number = $query->fetchColumn();
		$newNumber = (int)$number+1;
		$query = $this->db->prepare("UPDATE `count` SET `count` = :number WHERE `count` = :oldNumber");
		$query->bindParam(':number',$newNumber);
		$query->bindParam(':oldNumber',$number);
		$query->execute();
	}

	public function httpRequest($binNumber){

			$post = 'txtSearch='.$binNumber;
			$url = "http://www.nbr.gov.bd/getbinfield.php";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL , $url);
			curl_setopt($ch, CURLOPT_POST , true);
			curl_setopt($ch, CURLOPT_POSTFIELDS , $post);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return $response = curl_exec($ch);
			curl_close($ch);

	}

	
	
}

?>