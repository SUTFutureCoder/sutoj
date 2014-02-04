<?php 
class Contest{
	private $contest_id;
	private $title;
	private $start_time;
	private $end_time;
	private $pre_start_time;
	private $pre_end_time;
	private $defunct;
	private $pre;
	private $fresh;
	private $problem_sum;
	private $pre_problem_sum;
	private $pri;
	private $problem_max;
	private $balloon;
	private $gold;
	private $silver;
	private $copper;
	private $fresh_gold;
	private $fresh_silver;
	private $fresh_copper;
	
	public function __construct($c_id, $title, $s_t, $e_t, $p_s_t, $p_e_t, $defunct, $pre, $fresh, $p_s, $p_p_s, $pri){
		$this -> contest_id = $c_id;
		$this -> title = $title;
		$this -> start_time = $s_t;
		$this -> end_time = $e_t;
		$this -> pre_start_time = $p_s_t;
		$this -> pre_end_time = $p_e_t;
		$this -> defunct = $defunct;
		$this -> pre = $pre;
		$this -> fresh = $fresh;
		$this -> problem_sum = $p_s;
		$this -> pre_problem_sum = $p_p_s;
		$this -> pri = $pri;
	}
	
	public function getC_id(){
		return $this -> contest_id;
	}
	
	public function setC_id($C_id){
		$this -> contest_id = $C_id;
	}
	
	public function getTitle(){
		return $this -> title;
	}
	
	public function setTitle($Title){
		$this -> title = $Title;
	}
	
	public function getS_time(){
		return $this -> start_time; 	
	}
	
	public function setS_time($S_time){
		$this -> start_time = $S_time;
	}

	public function getE_time(){
		return $this -> end_time;
	}

	public function setE_time($E_time){
		$this -> end_time = $E_time;
	}	
	
	public function getP_S_time(){
		return $this -> pre_start_time;
	}
	
	public function setP_S_time($P_S_time){
		$this -> pre_start_time = $P_S_time;
	}

	public function getP_E_time(){
		return $this -> pre_end_time;
	}
	
	public function setP_E_time($P_E_time){
		$this -> pre_end_time = $P_E_time;
	}
	
	public function getDef(){
		return $this -> defunct;
	}
	
	public function setDef($Def){
		$this -> defunct = $Def;
	}
	
	public function getPre(){
		return $this -> pre;
	}
	
	public function setPre($Pre){
		$this -> pre = $Pre;
	}
	
	public function getFresh(){
		return $this -> fresh;
	}
	
	public function setFresh($Fresh){
		$this -> fresh = $Fresh;
	}
	
	public function getP_sum(){
		return $this -> problem_sum;
	}
	
	public function setP_sum($P_sum){
		$this -> problem_sum = $P_sum;
	}
	
	public function getP_P_sum(){
		return $this -> pre_problem_sum;
	}
	
	public function setP_P_sum($P_P_sum){
		$this -> pre_problem_sum = $P_P_sum;
	}
	
	public function getPri(){
		return $this -> pri;
	}
	
	public function setPri($Pri){
		$this -> pri = $Pri;
	}
	
	public function getP_max(){
		$sql = "SELECT MAX(problem_id) FROM problem";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> problem_max = $row[0];
		return $this -> problem_max;
	}
	
	public function setP_max($P_max){
		$this -> problem_max = $P_max;
	}
	
	public function getBal(){
		$sql = "SELECT `color` FROM  `balloon`";
		$result = mysql_query($sql);
		$i = 0;
		while($row = mysql_fetch_array($result)){
			$this -> balloon[$i] = $row[color];
			$i++;			
		}
		return $this -> balloon;
	}
	
	public function getGold(){
		$sql = "SELECT `gold` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> gold = $row['gold'];
		return $this -> gold;
	}
	
	public function getSilver(){
		$sql = "SELECT `silver` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> silver = $row['silver'];
		return $this -> silver;
	}
	
	public function getCopper(){
		$sql = "SELECT `copper` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> copper = $row['copper'];
		return $this -> copper;
	}
	
	public function getF_gold(){
		$sql = "SELECT `fresh_gold` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> fresh_gold = $row['fresh_gold'];
		return $this -> fresh_gold;
	}
	
	public function getF_silver(){
		$sql = "SELECT `fresh_silver` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> fresh_silver = $row['fresh_silver'];
		return $this -> fresh_silver;
	}
	
	public function getF_copper(){
		$sql = "SELECT `fresh_copper` FROM contest WHERE contest_id = 0";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$this -> fresh_copper = $row['fresh_copper'];
		return $this -> fresh_copper;
	}

}


?>
