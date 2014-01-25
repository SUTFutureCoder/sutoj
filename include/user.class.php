<?php 
//CopyRight SUTOJ user.class.php BY:*Chen 
class User{
	private $team_id;
	private $user_id;
	private $team_number1;
	private $team_member1;
	private $team_number2;
	private $team_member2;
	private $team_number3;
	private $team_member3;
	private $team_telephone;
	private $freshman_contest;
	private $submit;
	private $solved;
	private $defunct;
	private $ip;
	private $accesstime;
	private $volume;
	private $language;
	private $reg_time;
	private $nick;
	private $authorizee;
	
	public function __construct($t_id, $u_id, $t_n1, $t_m1, $t_n2, $t_m2, $t_n3, $t_m3, $t_tel, $f_test, $sub, $sol, $def, $ip, $acc, $vol, $lan, $r_time, $nic, $aut){
	
	if(!$t_id || !$u_id)
		throw new Exception('致命错误-1阶段1队伍编号获取失败');
	if(!$t_n1 || !$t_m1)
		throw new Exception('致命错误-1阶段2队伍基础信息获取失败');
	if(!$t_tel || !$ip || !$acc || !$lan || !$r_time || !$nic)
		throw new Exception('致命错误-1阶段3队伍附加信息获取失败');
		
	$this -> team_id = $t_id;
	$this -> user_id = $u_id;
	$this -> team_number1 = $t_n1;
	$this -> team_member1 = $t_m1;
	$this -> team_number2 = $t_n2;
	$this -> team_member2 = $t_m2;
	$this -> team_number3 = $t_n3;
	$this -> team_member3 = $t_m3;
	$this -> team_telephone = $t_tel;
	$this -> freshman_contest = $f_test;
	$this -> submit = $sub;
	$this -> solved = $sol;
	$this -> defunct = $def;
	$this -> ip = $ip;
	$this -> accesstime = $acc;
	$this -> volume = $vol;
	$this -> language = $lan;
	$this -> reg_time = $r_time;
	$this -> nick = $nic;
	$this -> authorizee = $aut;
	}
	
	public function getT_id(){
		return $this -> team_id;}
	
	public function getU_id(){
		return $this -> user_id;}
	
	public function getT_n1(){
		return $this -> team_number1;}
		
	//public function setT_n1($t_n1){
	//	$this -> team_number1 = $t_n1;}
		
	public function getT_m1(){
		return $this -> team_member1;}
		
	//public function setT_m1($t_m1){
	//	$this -> team_member1 = $t_m1;}
		
	public function getT_n2(){
		return $this -> team_number2;}
		
	public function setT_n2($t_n2){
		$this -> team_number2 = $t_n2;}
		
	public function getT_m2(){
		return $this -> team_member2;}
		
	public function setT_m2($t_m2){
		$this -> team_member2 = $t_m2;}
		
	public function getT_n3(){
		return $this -> team_number3;}
		
	public function setT_n3($t_n3){
		$this -> team_number3 = $t_n3;}
	
	public function getT_m3(){
		return $this -> team_member3;}
		
	public function setT_m3($t_m3){
		$this -> team_member3 = $t_m3;}
		
	public function getT_tel(){
		return $this -> team_telephone;}
		
	public function setT_tel($t_tel){
		$this -> team_telephone = $t_tel;}
	
	public function getF_test(){
		return $this -> freshman_contest;}
		
	public function getSub(){
		return $this -> submit;}
		
	public function getSol(){
		return $this -> solved;}
		
	public function getDef(){
		return $this -> defunct;}
		
	public function getIp(){
		return $this -> ip;}
		
	public function getAcc(){
		return $this -> accesstime;}
		
	public function getVol(){
		return $this -> volume;}
		
	public function getLan(){
		return $this -> language;}
		
	public function getR_time(){
		return $this -> reg_time;}
		
	public function getNic(){
		return $this -> nick;}
		
	public function setNic($nic){
		$this -> nick = $nic;}
		
	public function getAut(){
		return $this -> authorizee;}
		
	public function setAut($aut){
		$this -> authorizee = $aut;}
	
}




?>
