<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Menu_model extends CI_Model
{
	public function create($name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{
		date_default_timezone_set('Asia/Calcutta');
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		//print_r($data);

		$query=$this->db->insert( 'menu', $data );
		$menuid=$this->db->insert_id();
		if(! empty($menuaccess)) {
			foreach($menuaccess as $row)
			{
				$data  = array(
					'menu' => $menuid,
					'access' => $row,
				);
				$query=$this->db->insert( 'menuaccess', $data );
			}
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewmenu()
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon`,`menu`.`order` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent`
		ORDER BY `menu`.`order` ASC";

		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['menu']=$this->db->get( 'menu' )->row();
		$query['menuaccess']=array();
		$menu_arr=$this->db->query("SELECT `access` FROM `menuaccess` WHERE `menu`='$id' ")->result();
		foreach($menu_arr as $row)
		{
			$query['menuaccess'][]=$row->access;
	    }

		return $query;
	}

	public function edit($id,$name,$description,$keyword,$url,$linktype,$parentmenu,$menuaccess,$isactive,$order,$icon)
	{
		$data  = array(
			'description' =>$description,
			'name' => $name,
			'keyword' => $keyword,
			'url' => $url,
			'linktype' => $linktype,
			'parent' => $parentmenu,
			'isactive' => $isactive,
			'order' => $order,
			'icon' => $icon,
		);
		$this->db->where( 'id', $id );
		$this->db->update( 'menu', $data );

		$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
		if(! empty($menuaccess)) {
		foreach($menuaccess as  $row)
		{
			$data  = array(
				'menu' => $id,
				'access' => $row,
			);
			$query=$this->db->insert( 'menuaccess', $data );

		} }
		return 1;
	}
	function deletemenu($id)
	{
		$query=$this->db->query("DELETE FROM `menu` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `menuaccess` WHERE `menu`='$id'");
	}
	public function getmenu()
	{
		$query=$this->db->query("SELECT * FROM `menu`  ORDER BY `id` ASC" )->result();
		$return=array(
		"" => ""
		);

		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		return $return;
	}
	function viewmenus()
	{
        $accesslevel=$this->session->userdata( 'accesslevel' );
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu2`.`name` as `parentmenu`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		LEFT JOIN `menu` as `menu2` ON `menu2`.`id` = `menu`.`parent`
        INNER  JOIN `menuaccess` ON  `menuaccess`.`menu`=`menu`.`id`
		WHERE `menu`.`parent`=0 AND `menuaccess`.`access`='$accesslevel'
		ORDER BY `menu`.`order` ASC";

		$query=$this->db->query($query)->result();
		return $query;
	}
	function getsubmenus($parent)
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`description` as `description`,`menu`.`keyword` as `keyword`,`menu`.`url` as `url`,`menu`.`linktype` as `linktype`,`menu`.`icon` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";

		$query=$this->db->query($query)->result();
		return $query;
	}
	function getpages($parent)
	{
		$query="SELECT `menu`.`id` as `id`,`menu`.`name` as `name`,`menu`.`url` as `url` FROM `menu`
		WHERE `menu`.`parent` = '$parent'
		ORDER BY `menu`.`order` ASC";

		$query2=$this->db->query($query)->result();
		$url = array();
		foreach($query2 as $row)
		{
			$pieces = explode("/", $row->url);

			if(empty($pieces) || !isset($pieces[1]))
			{
				$page2="";
			}
			else
				$page2=$pieces[1];

			$url[]=$page2;
		}
		//print_r($url);
		return $url;
	}

    function sendquestiontousers($questionid)
    {
        $allusers=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=4")->result();
        foreach($allusers as $user)
        {
            $userid=$user->id;
            $email=$user->email;
            $hashvalue=base64_encode ($userid."&hq");
            $link="<a href='http://www.localhost/hq/index.php/user/ghghghh/$hashvalue'>Click here </a>";

            $this->load->library('email');
            $this->email->from('dhavalwohlig@gmail.com', 'HQ');
            $this->email->to($email);
            $this->email->subject('HQ');

            $message = "<html>

                            <body>
                                <div style='text-align:center;   width: 50%; margin: 0 auto;'>
                                    <h4 style='font-size:1.5em;padding-bottom: 5px;color: #e82a96;'>HQ</h4>
                                    <p style='font-size: 1em;padding-bottom: 10px;'>Click Link To Answer:</p>
                                    <p style='font-size: 1em;padding-bottom: 10px;'>$link</p>
                                </div>
                                <div style='text-align:center;position: relative;'>
                                    <p style=' position: absolute; top: 8%;left: 50%; transform: translatex(-50%); font-size: 1em;margin: 0; letter-spacing:2px; font-weight: bold;'>
                                        Thank You
                                    </p>
                                </div>
                            </body>

                        </html>";
            $this->email->message($message);
            $this->email->send();
        }
    }

    function getweightofpillarsbyuser($userid)
    {
        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragebyuserid=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`
			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`user`='$userid'")->row();
            $row->pillaraveragebyuserid=$pillaraveragebyuserid->totalweight;
        }

//        $teamquery=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
//        $teamid=$teamquery->team;
//        $allteamusers=$this->db->query("SELECT * FROM `user` WHERE `team`='$teamid'")->result();
//        $totalusersinteam=count($allteamusers);
//
//        $alluseridsofteam="(";
//        foreach($allteamusers as $key=>$value)
//        {
//            if($key==0)
//            {
//                $alluseridsofteam.=$value->id;
//            }
//            else
//            {
//                $alluseridsofteam.=",".$value->id;
//            }
//        }
//        $alluseridsofteam=")";
//
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyteam=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`user` IN $alluseridsofteam ")->row();
//            $totalweight=($pillaraveragebyteam->totalweight)/$totalusersinteam;
//            $row->pillaraveragebyteam=$totalweight;
//        }
//
//
//        $allorganizationusers=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=4")->result();
//        $totalusersinorganization=count($allorganizationusers);
//
//        $alluseridsoforganization="(";
//        foreach($allorganizationusers as $key=>$value)
//        {
//            if($key==0)
//            {
//                $alluseridsoforganization.=$value->id;
//            }
//            else
//            {
//                $alluseridsoforganization.=",".$value->id;
//            }
//        }
//        $alluseridsoforganization=")";
//
//
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyorganization=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid'")->row();
//            $totalweight=($pillaraveragebyorganization->totalweight)/$totalusersinorganization;
//            $row->pillaraveragebyorganization=$totalweight;
//        }
        return $query;
    }


    function drawpillarjson($check,$departmentid,$teamid,$organization,$branchid)
    {
        if($check=="")
        {
        $check=3;
        }
        $where="";

        if($check==1)
        {
            $where=" AND `user`.`department`='$departmentid'";
        }
        else if($check==2)
        {
            $where=" AND `user`.`team`='$teamid'";
        }
        else if($check==3)
        {
            $where="";
        }
        else if($check==4)
        {
            $where=" AND `user`.`branch`='$branchid'";
        }


        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragevalues=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
			WHERE `hq_useranswer`.`pillar`='$pillarid' $where")->row();
            $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
        }

        return $query;
    }

    public function checkselect($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch){
        $selectarray=array("$gender", "$maritalstatus", "$designation","$department","$spanofcontrol","$experience","$salary","$branch");
        $selectarray=array_values($selectarray);
        $abc=array();

        foreach($selectarray as $key => $value){
            if(count($abc) <2){
            array_push($abc,$value);
                if(count($abc)==2){
                    echo count($abc);
                }
            }
        }
        return count($abc);
    }
    

    function drawpillarjsononhrdashboaard1($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch)
    {
         //SPAN OF CONTROL
        if($spanofcontrol== '0-5'){
            $spanofcontrol1='0';
            $spanofcontrol2='5';
        }
        else if($spanofcontrol== '6-10'){
            $spanofcontrol1='6';
            $spanofcontrol2='10';
        }
        else if($spanofcontrol== '11-15'){
            $spanofcontrol1='11';
            $spanofcontrol2='15';
        }
        else if($spanofcontrol== '16-20'){
            $spanofcontrol1='16';
            $spanofcontrol2='20';
        }
        else if($spanofcontrol== '20-25'){
            $spanofcontrol1='20';
            $spanofcontrol2='25';
        }
        else if($spanofcontrol== '25'){
            $spanofcontrol1='25';
            $spanofcontrol2='';
        }

        // FOR EXPERIRENCE

        if($experience== '0-2'){
            $experience1='0';
            $experience2='2';
        }
        else if($experience== '3-5'){
            $experience1='3';
            $experience2='5';
        }
        else if($experience== '6-8'){
            $experience1='6';
            $experience2='8';
        }
        else if($experience== '8'){
            $experience1='8';
            $experience2='';
        }
          
          // FOR SALARY
          
             if($salary== '0-2'){
               
            $salary1=0;
            $salary2=2;
        }
        else if($salary== '2-4'){
           
            $salary1=2;
            $salary2=4;
        } 
          else if($salary== '5-7'){
             
            $salary1=5;
            $salary2=7;
        }
        else if($salary== '8-10'){
            $salary1=8;
            $salary2=10;
        }
        else if($salary== '11-13'){
            $salary1=11;
            $salary2=13;
        } 
        else if($salary== 14-16){
            $salary1=14;
            $salary2=16;
        }
        else if($salary== 17-19){
            $salary1=17;
            $salary2=19;
        }
        else if($salary== 19){
           
            $salary1=19;
            $salary2='';
        }
          
        $where="";
           if ($salary != "") {
            if($salary2 !='' ){
        $fromsal=intval($salary1."00000");
        $tosal=intval($salary2."00000");
            $where .= "AND (`user`.`salary` BETWEEN '$fromsal' AND '$tosal') ";
            }
            else{
             $where .= "AND `user`.`salary` > 1900000 ";
            }

        }
           if ($experience != "") {
            if($experience2==''){
                 $where .= "AND `user`.`noofyearsinorganization` > $experience1 ";
            }
            else
            {
                $where .= " AND (`user`.`noofyearsinorganization` BETWEEN '$experience1' AND '$experience2')";
            }

        }
        if ($gender != "") {
            $where .= "AND  `user`.`gender`='$gender' ";
        }
        if ($maritalstatus != "") {
            $where .= "AND  `user`.`maritalstatus`='$maritalstatus' ";
        }
        if ($designation != "") {
            $where .= "AND  `user`.`designation`='$designation' ";
        }
        if ($department != "") {
            $where .= "AND `user`.`department`='$department' ";
        }
        if ($spanofcontrol != "") {
            if($spanofcontrol2==''){
                 $where .= "AND `user`.`spanofcontrol` > '$spanofcontrol1' ";
            }
            else
            {
                $where .= "AND (`user`.`spanofcontrol` BETWEEN '$spanofcontrol1' AND '$spanofcontrol2') ";
            }

        }
      
        if ($branch != "") 
        {
            $where .= "AND `user`.`branch`='$branch' ";
        }
        $where = " $where ";

        $arr = 0;
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,1")->row();
        $row1  = $testquery;
            $testid=$row1->id;
            
        $checkpack=$this->db->query("SELECT * FROM `user`")->row();
        $checkpackage=$checkpack->package;
        if($checkpackage==4){
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `id` ASC")->result();
        }
        else{
            $query=$this->db->query("SELECT * FROM `hq_pillar` WHERE `id` != 11 ORDER BY `id` ASC")->result();
        }
        
            
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid' $where")->row();
                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
            $arr = $query;
      
        return $arr;
    }
    function getpillarforpie()
    {
        $arr = array();
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,2")->result();
        foreach($testquery as $row1)
        {
            $testid=$row1->id;
              $checkpack=$this->db->query("SELECT * FROM `user`")->row();
        $checkpackage=$checkpack->package;
        if($checkpackage==4){
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `id` ASC")->result();
        }
        else{
            $query=$this->db->query("SELECT * FROM `hq_pillar` WHERE `id` != 11 ORDER BY `id` ASC")->result();
        }
//            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
//                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
//                $testexpectedweight=$testexpectedweights->weight;
//                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();

                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
            }
            array_push($arr,$query);
        }

        return $arr;
    }  
    function drawpillarjsononhrdashboaard()
    {
        $arr = array();
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,2")->result();
        foreach($testquery as $row1)
        {
            $testid=$row1->id;
              $checkpack=$this->db->query("SELECT * FROM `user`")->row();
        $checkpackage=$checkpack->package;
        if($checkpackage==4){
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `id` ASC")->result();
        }
        else{
            $query=$this->db->query("SELECT * FROM `hq_pillar` WHERE `id` != 11 ORDER BY `id` ASC")->result();
        }
//            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();

                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
            array_push($arr,$query);
        }

        return $arr;
    }


    function drawpillarjsonold($check,$departmentid,$teamid,$organization,$branchid)
    {
        if($check=="")
        {
        $check=3;
        }
        $where="";
        $fromjoin="";
        $select="";
        if($check==1)
        {
            $select=",`hq_department`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_department` ON `hq_department`.`id`=`user`.`department`";
            $where=" AND `user`.`department`='$departmentid'";
        }
        else if($check==2)
        {
            $select=",`hq_team`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_team` ON `hq_team`.`id`=`user`.`team`";
            $where=" AND `user`.`team`='$teamid'";
        }
        else if($check==3)
        {
            $select=",`hq_pillar`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_pillar` ON `hq_pillar`.`id`=`hq_useranswer`.`pillar`";
            $where="";
        }
        else if($check==4)
        {
            $select=",`hq_branch`.`expectedweight` AS `expectedweight`";
            $fromjoin=" LEFT OUTER JOIN `hq_branch` ON `hq_branch`.`id`=`user`.`branch`";
            $where=" AND `user`.`branch`='$branchid'";
        }


        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
        foreach($query as $row)
        {
			$pillarid = $row->id;
			$pillaraveragevalues=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight` $select
FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id` $fromjoin
			WHERE `hq_useranswer`.`pillar`='$pillarid' $where")->row();
            $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
        }

        return $query;
    }

    public function getoptionbyquestion($question) {
        $query=$this->db->query("SELECT `id`,`optiontext` as `name` FROM `hq_options` WHERE `question`='$question'")->result();
        return $query;
    }
    public function getquestionbytest($id,$pillar) {
        $query = "SELECT `testquestion`.`id` as `textquestionid`, `testquestion`.`test`,`testquestion`. `question` as `id` ,`hq_question`.`text` as `name`
FROM `testquestion` LEFT OUTER JOIN `hq_question` ON `hq_question`.`id`=`testquestion`.`question`
WHERE `testquestion`.`test`='$id' AND `hq_question`.`pillar`='$pillar' ";
        $question = $this->db->query($query)->result();
        return $question;
    }
    public function getpincodebyoption($option) {
        $query=$this->db->query("SELECT `id`,`optiontext` as `name` FROM `hq_option` WHERE `question`='$option'")->result();
        return $query;
    }




    function getgeneratedjsonold()
    {
        $jsondata=new stdClass();
        $jsondata->credits=new stdClass();
        $jsondata->credits->enabled=false;

        $arr = array();
//        $arr->credits=new stdClass();
//        $arr->credits->enabled=false;

        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC LIMIT 0,2")->result();
        foreach($testquery as $row1)
        {
            $testid=$row1->id;
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();

                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
            array_push($arr,$query);
        }
//        print_r($arr);
        $categoryvalue="";
        $pillarvalue="";
        $expectedvalue="";
        $actualvalue="";
        foreach($arr as $value1)
                    {
                        foreach($value1 as $key=>$value)
                        {
                            if($key==0)
                            {
                                $categoryvalue.=$value->name;
                                $pillarvalue.=$value->weight;
                                $expectedvalue.=$value->testexpectedweight;
                                $actualvalue.=$value->pillaraveragevalues;
                            }
                            else
                            {
                                $categoryvalue.=",".$value->name;
                                $pillarvalue.=",".$value->weight;
                                $expectedvalue.=",".$value->testexpectedweight;
                                $actualvalue.=",".$value->pillaraveragevalues;
                            }
                        }
                    }
        echo $categoryvalue." <-cat<br>";
        echo $pillarvalue." <-pillar<br>";
        echo $expectedvalue." <-expected<br>";
        echo $actualvalue." <-actualt<br>";


//        $jsondata->chart=new stdClass();
//        $jsondata->chart->type='column';
//
//        $jsondata->title=new stdClass();
//        $jsondata->title->text='Pillar Wise Average';
//
//        $jsondata->xAxix=new stdClass();
//        $jsondata->xAxix->categories=[23,50,30];
//        $jsondata->xAxix->crosshair=true;
//
//        $jsondata->yAxis=new stdClass();
//        $jsondata->yAxis->min=0;
//        $jsondata->yAxis->title=new stdClass();
//        $jsondata->yAxis->title->text='Score';
//
//        $jsondata->tooltip=new stdClass();
//        $jsondata->tooltip->headerFormat='<span style="font-size:10px">{point.key}</span><table>';
//        $jsondata->tooltip->pointFormat='<tr><td style="color:{series.color};padding:0">{series.name}: + </td><td style="padding:0"><b>{point.y:.1f} </b></td></tr>';
//        $jsondata->tooltip->footerFormat='</table>';
//        $jsondata->tooltip->shared=true;
//        $jsondata->tooltip->useHTML=true;
//
//        $jsondata->plotOptions=new stdClass();
//        $jsondata->plotOptions->column=new stdClass();
//        $jsondata->plotOptions->column->pointPadding=0.2;
//        $jsondata->plotOptions->column->borderWidth=0;
//
//        $jsondata->series=array();
//
//        $obj=new stdClass();
//        $obj->name="Pillar";
//        $obj->data=[10,20,30];
//
//        array_push($jsondata->series,$obj);
//
//        $obj=new stdClass();
//        $obj->name="Expected";
//        $obj->data=[22,33,44];
//
//        array_push($jsondata->series,$obj);
//
//        $obj=new stdClass();
//        $obj->name="Actual";
//        $obj->data=[11,22,33];
//
//        array_push($jsondata->series,$obj);

//        return $jsondata;
    }


  public function emailer($htmltext,$subject,$toemail,$toname){
        try {
    $mandrill = new Mandrill();
    $message = array(
        'html' => $htmltext,
        'text' => 'Happiness Quotient',
        'subject' => $subject,
        'from_email' => "info@willnevergrowup.com",
        'from_name' => "Will Never Grow Up",
        'to' => array(
            array(
                'email' => $toemail,
                'name' => $toname,
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => ''),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content'
            )
        ),
        'merge_vars' => array(
            array(
                'rcpt' => 'recipient.email@example.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        )
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = 'example send_at';
    $result = $mandrill->messages->send($message, $async, $ip_pool);
//     print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )

    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
//    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
    }



    function getgeneratedjson($limitvalue)
    {
//        if($limitvalue==2)
//        {
//
//        }
        $limit=" LIMIT $limitvalue,1";
        $arr = array();
        $testquery=$this->db->query("SELECT * FROM `test` ORDER BY `id` DESC")->row();

            $testid=$testquery->id;
            $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
            foreach($query as $row)
            {
                $pillarid = $row->id;
                $testexpectedweights=$this->db->query("SELECT `testpillarexpected`.`pillar`,`testpillarexpected`.`test`,IFNULL(`testpillarexpected`.`expectedvalue`,0) as `weight`,`test`.`name` as `testname` FROM `testpillarexpected` LEFT OUTER JOIN `test` ON `test`.`id`=`testpillarexpected`.`test`  WHERE `test`='$testid' AND `pillar`='$pillarid'")->row();
                $testexpectedweight=$testexpectedweights->weight;
                $testname=$testexpectedweights->testname;
                $pillaraveragevalues=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) AS `totalweight`
    FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option` LEFT OUTER JOIN `user` ON `hq_useranswer`.`user`=`user`.`id`
                WHERE `hq_useranswer`.`pillar`='$pillarid' AND `hq_useranswer`.`test`='$testid'")->row();

                $row->pillaraveragevalues=$pillaraveragevalues->totalweight;
                $row->testname=$testname;
                $row->testexpectedweight=$testexpectedweight;
            }
        $arr=$query;

        $categoryvalue=array();
        $pillarvalue=array();
        $expectedvalue=array();
        $actualvalue=array();
        foreach($arr as $key=>$value)
         {
                    array_push($categoryvalue,$value->name);
                    array_push($pillarvalue,floatval($value->weight));
                    array_push($expectedvalue,floatval($value->testexpectedweight));
                    array_push($actualvalue,floatval($value->pillaraveragevalues));
         }


                        $jsondata=new stdClass();
                        $jsondata->credits=new stdClass();
                        $jsondata->credits->enabled=false;

                        $jsondata->chart=new stdClass();
                        $jsondata->chart->type='column';

                        $jsondata->title=new stdClass();
                        $jsondata->title->text='Pillar Wise Average Of '.$testname;

                        $jsondata->xAxis=new stdClass();
                        $jsondata->xAxis->categories=$categoryvalue;
                        $jsondata->xAxis->crosshair=true;

                        $jsondata->yAxis=new stdClass();
                        $jsondata->yAxis->min=0;
                        $jsondata->yAxis->title=new stdClass();
                        $jsondata->yAxis->title->text='Score';

                        $jsondata->tooltip=new stdClass();
                        $jsondata->tooltip->headerFormat='<span style="font-size:10px">{point.key}</span><table>';
                        $jsondata->tooltip->pointFormat='<tr><td style="color:{series.color};padding:0">{series.name}:  </td><td style="padding:0"><b>{point.y:.1f} </b></td></tr>';
                        $jsondata->tooltip->footerFormat='</table>';
                        $jsondata->tooltip->shared=true;
                        $jsondata->tooltip->useHTML=true;

                        $jsondata->plotOptions=new stdClass();
                        $jsondata->plotOptions->column=new stdClass();
                        $jsondata->plotOptions->column->pointPadding=0.2;
                        $jsondata->plotOptions->column->borderWidth=0;

                        $jsondata->series=array();

                        $obj=new stdClass();
                        $obj->name="Pillar";
                        $obj->data=$pillarvalue;

                        array_push($jsondata->series,$obj);

                        $obj=new stdClass();
                        $obj->name="Expected";
                        $obj->data=$expectedvalue;

                        array_push($jsondata->series,$obj);

                        $obj=new stdClass();
                        $obj->name="Actual";
                        $obj->data=$actualvalue;

                        array_push($jsondata->series,$obj);


//        echo $categoryvalue." <-cat<br>";
//        echo $pillarvalue." <-pillar<br>";
//        echo $expectedvalue." <-expected<br>";
//        echo $actualvalue." <-actualt<br>";

        return $jsondata;
    }






//    function getweightofpillarsbyteam($userid)
//    {
//        $teamquery=$this->db->query("SELECT * FROM `user` WHERE `id`='$userid'")->row();
//        $teamid=$teamquery->team;
//        $query=$this->db->query("SELECT * FROM `hq_pillar` ORDER BY `order` ASC")->result();
//        foreach($query as $row)
//        {
//			$pillarid = $row->id;
//			$pillaraveragebyuserid=$this->db->query("SELECT IFNULL(SUM(`hq_options`.`weight`),0) AS `totalweight`
//FROM `hq_useranswer`  LEFT OUTER JOIN `hq_options` ON `hq_options`.`id`=`hq_useranswer`.`option`  LEFT OUTER JOIN `user` ON `user`.`id`=`hq_useranswer`.`user`
//			WHERE `hq_useranswer`.`pillar`='$pillarid' AND `user`.`team`='$teamid'")->row();
//            $row->pillaraveragebyteam=$pillaraveragebyteam->totalweight;
//        }
//        return $query;
//    }
public function uploadImage(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $filename="image";
        $image="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $image=$uploaddata['file_name'];


        }
        return $image;

    }
    public function blockBackend()
    {
        $query=$this->db->query("UPDATE `user` SET `isblock`=1 WHERE `accesslevel` IN (1,2,3)");
        if($query)
            return true;
        else
            return false;
    }
    public function unBlockCompany()
    {
        $query=$this->db->query("UPDATE `user` SET `isblock`=0 WHERE `accesslevel` IN (1,2,3)");
        if($query)
            return true;
        else
            return false;
    }
    
        function getinterlinkage($gender,$maritalstatus,$designation,$department,$spanofcontrol,$experience,$salary,$branch)
    {
        //SPAN OF CONTROL
        if($spanofcontrol== '0-5'){
            $spanofcontrol1='0';
            $spanofcontrol2='5';
        }
        else if($spanofcontrol== '6-10'){
            $spanofcontrol1='6';
            $spanofcontrol2='10';
        }
        else if($spanofcontrol== '11-15'){
            $spanofcontrol1='11';
            $spanofcontrol2='15';
        }
        else if($spanofcontrol== '16-20'){
            $spanofcontrol1='16';
            $spanofcontrol2='20';
        }
        else if($spanofcontrol== '20-25'){
            $spanofcontrol1='20';
            $spanofcontrol2='25';
        }
        else if($spanofcontrol== '25'){
            $spanofcontrol1='25';
            $spanofcontrol2='';
        }

        // FOR EXPERIRENCE

        if($experience== '0-2'){
            $experience1='0';
            $experience2='2';
        }
        else if($experience== '3-5'){
            $experience1='3';
            $experience2='5';
        }
        else if($experience== '6-8'){
            $experience1='6';
            $experience2='8';
        }
        else if($experience== '8'){
            $experience1='8';
            $experience2='';
        }
          
          // FOR SALARY
          
             if($salary== '0-2'){
               
            $salary1=0;
            $salary2=2;
        }
        else if($salary== '2-4'){
           
            $salary1=2;
            $salary2=4;
        } 
          else if($salary== '5-7'){
             
            $salary1=5;
            $salary2=7;
        }
        else if($salary== '8-10'){
            $salary1=8;
            $salary2=10;
        }
        else if($salary== '11-13'){
            $salary1=11;
            $salary2=13;
        } 
        else if($salary== 14-16){
            $salary1=14;
            $salary2=16;
        }
        else if($salary== 17-19){
            $salary1=17;
            $salary2=19;
        }
        else if($salary== 19){
           
            $salary1=19;
            $salary2='';
        }
          
        $where="";
           if ($salary != "") {
            if($salary2 !='' ){
        $fromsal=intval($salary1."00000");
        $tosal=intval($salary2."00000");
            $where .= " (`user`.`salary` BETWEEN '$fromsal' AND '$tosal') AND";
            }
            else{
             $where .= " `user`.`salary` > 1900000 AND";
            }

        }
           if ($experience != "") {
            if($experience2==''){
                 $where .= " `user`.`noofyearsinorganization` > $experience1 AND";
            }
            else
            {
                $where .= " (`user`.`noofyearsinorganization` BETWEEN '$experience1' AND '$experience2') AND";
            }

        }
        if ($gender != "") {
            $where .= "  `user`.`gender`='$gender' AND";
        }
        if ($maritalstatus != "") {
            $where .= "  `user`.`maritalstatus`='$maritalstatus' AND";
        }
        if ($designation != "") {
            $where .= "  `user`.`designation`='$designation' AND";
        }
        if ($department != "") {
            $where .= " `user`.`department`='$department' AND";
        }
        if ($spanofcontrol != "") {
            if($spanofcontrol2==''){
                 $where .= " `user`.`spanofcontrol` > '$spanofcontrol1' AND";
            }
            else
            {
                $where .= " (`user`.`spanofcontrol` BETWEEN '$spanofcontrol1' AND '$spanofcontrol2') AND";
            }

        }
      
        if ($branch != "") 
        {
            $where .= " `user`.`branch`='$branch' AND";
        }
        $where = " $where 1 ";
          if($gender== '' AND $maritalstatus== '' AND $designation== '' AND $department== '' AND $spanofcontrol== '' AND $experience== '' AND $salary== '' AND $branch== '')
          {
              $userquery="SELECT `id` FROM `user` WHERE 1";
          }
          else{
               $userquery="SELECT `id` FROM `user` WHERE $where";
          }
          // GET USERS
          
          $conclusionquery=$this->db->query("SELECT `id`, `order`, `name` FROM `hq_conclusion` WHERE 1")->result();
          if(!empty($conclusionquery))
          {
            
               foreach($conclusionquery as $conclusion)
               {
                   
                $conclusion->averagepercent=$this->db->query("SELECT IFNULL(AVG(`hq_options`.`weight`),0) as `averagepercent` FROM `hq_options` LEFT OUTER JOIN `hq_useranswer` ON `hq_useranswer`.`option`=`hq_options`.`id` WHERE `hq_useranswer`.`user` IN ($userquery) AND `hq_useranswer`.`question` IN (SELECT `hq_conclusionquestion`.`question` FROM `hq_conclusionquestion` LEFT OUTER JOIN `hq_conclusion` ON `hq_conclusion`.`id`=`hq_conclusionquestion`.`conclusion` WHERE `hq_conclusion`.`id`='$conclusion->id')")->row();
             
                
               }
          }
          return $conclusionquery;
        
      
    }
    public function enablemenu($package,$expiredate)
    {
        $this->db->query("UPDATE `user` SET `package`='$package',`expirydate`='$expiredate' WHERE 1");
        if($package==1){
             $query=$this->db->query("UPDATE `menuaccess` SET `access`=1 WHERE `menu` IN (1,2,3,4,5,6,7,8,9,12,14)");
             $query=$this->db->query("UPDATE `menuaccess` SET `access`=0 WHERE `menu` IN (15)");
             $query1=$this->db->query("UPDATE `user` SET `isfirst`=1 WHERE `accesslevel` = 1");
        }
        else if($package==2){
             $query=$this->db->query("UPDATE `menuaccess` SET `access`=1 WHERE `menu` IN (1,2,3,4,5,6,7,8,9,12,14,15)");
             $query1=$this->db->query("UPDATE `user` SET `isfirst`=1 WHERE `accesslevel` = 1");
        }
        else if($package==3){
             $query=$this->db->query("UPDATE `menuaccess` SET `access`=1 WHERE `menu` IN (1,2,3,4,5,6,7,8,9,12,14,15)");
             $query1=$this->db->query("UPDATE `user` SET `isfirst`=0 WHERE `accesslevel` = 1");
        }
        else if($package==4){
             $query=$this->db->query("UPDATE `menuaccess` SET `access`=1 WHERE `menu` IN (1,2,3,4,5,6,7,8,9,12,14,15)");
             $query1=$this->db->query("UPDATE `user` SET `isfirst`=0 WHERE `accesslevel` = 1");
        }
    } 
    public function getimagebyid()
    {
        $query=$this->db->query("SELECT `image` FROM `logo` WHERE `id`=1")->row();
        $image=$query->image;
        return $image;
     
    }
    public function getinterlinkageoptions($question1,$question2)
    {
       $query=$this->db->query("SELECT `option1`,`table1`.`id1`,`option2`,`table1`.`id2`,IFNULL(`count`,0) as `countuser`
FROM
(
    
    SELECT `option1`.`optiontext` as `option1`,`option1`.`id` as `id1`,`option2`.`optiontext` as `option2`,`option2`.`id` as `id2` FROM `hq_options` as `option1` , `hq_options` as `option2` WHERE `option1`.`question`='1' AND `option2`.`question`='9'

) as `table1`

LEFT OUTER JOIN

(
SELECT `option1`.`optiontext` as `option1text`,`option1`.`id` as `id1` ,`option2`.`optiontext` as `option2text`,`option2`.`id` as `id2`,COUNT(`user`) as `count`
FROM 
(SELECT MAX(`option1id`) as `option1id`,MAX(`option2id`) as `option2id`,`user`,COUNT(`question1`) as `count` FROM (SELECT `option1`.`optiontext` as `option1`,`option1`.`id` as `option1id`,0 as `option2`,0 as `option2id`,`hq_useranswer`.`user`,1 as `question1` FROM  `hq_useranswer` LEFT OUTER JOIN `hq_options` as `option1`  ON `option1`.`id` = `hq_useranswer`.`option`

WHERE `option1`.`question`='$question1'

UNION 

SELECT 0 as `option1`,0 as `option1id`,`option2`.`optiontext` as `option2`,`option2`.`id` as `option2id`,`hq_useranswer`.`user`,1 as `question1` FROM  `hq_useranswer` LEFT OUTER JOIN `hq_options` as `option2`  ON `option2`.`id` = `hq_useranswer`.`option`

WHERE `option2`.`question`='$question2'

) as `tab1` GROUP BY `user` ) 

as `tab2` 
INNER JOIN `hq_options` as `option1` ON `option1`.`id` = `option1id`
INNER JOIN `hq_options` as `option2` ON `option2`.`id` = `option2id`
WHERE `count` >= 2
GROUP BY `option1id`,`option2id`) as `table2` ON `table1`.`id1`=`table2`.`id1` AND `table1`.`id2`=`table2`.`id2`")->result();
        return $query;
     
    }
    public function createimage($image)
    {
        $query=$this->db->query("UPDATE `logo` SET `image`='$image' WHERE `id`=1");
        return $image;
     
    }
    public function checkpackage()
    {
        $query=$this->db->query("SELECT `package` FROM `user` WHERE 1")->row();
        $package=$query->package;
        return $package;
     
    }
}
?>
