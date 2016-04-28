<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Test_model extends CI_Model
{
	
	
	public function create($name,$schedule,$units,$startdate,$designation,$department,$branch,$team,$check)
	{
        $startdate = new DateTime($startdate);
        $startdate = $startdate->format('Y-m-d');
		$data  = array(
				'name' => $name,
			'schedule' => $schedule,
			'units' => $units,
			'startdate' => $startdate,
            'designation'=> $designation,
            'department'=> $department,
            'branch'=> $branch,
			'team' => $team,
			'check' => $check
		);
		$query=$this->db->insert( 'test', $data );
		$id=$this->db->insert_id();
        
		if(!$query)
			return  0;
		else
			return  1;
	}
    

	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'test' )->row();
		return $query;
	}
	
	public function edit($id,$name,$schedule,$units,$startdate,$designation,$department,$branch,$team,$check,$timestamp)
	{
        $startdate = new DateTime($startdate);
        $startdate = $startdate->format('Y-m-d');
		$data  = array(
			'name' => $name,
			'schedule' => $schedule,
			'units' => $units,
			'startdate' => $startdate,
            'designation'=> $designation,
            'department'=> $department,
            'branch'=> $branch,
			'team' => $team,
			'check' => $check,
			'timestamp' => $timestamp
		);
        $this->db->where( "id", $id );
        $query=$this->db->update( "test", $data );
        
        
        
        //SCHEDULE DATE
        $query = $this->db->query("SELECT * FROM `hq_question`")->result(); 
     $testdetail=$this->db->query("SELECT * FROM `test`")->row();
     $startdate=$testdetail->startdate;
     $schedule=$testdetail->schedule;
     $checkpackage=$this->db->query("SELECT * FROM `user`")->row();
     $package=$checkpackage->package;
     if($package==4){
         $noofquestions=46;
     }
     else{
        $noofquestions=42;
     }
     
        //ASSIGN DATES ACCORDING TO SCHEDULE
         if($schedule==1)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=7;
             $units=ceil($noofquestions/7);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");   
                }
            
         } 
     
     if($schedule==2)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=14;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");   
                }
            
         } 
     if($schedule==3)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=21;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");   
                }
            
         } 
     if($schedule==4)
         {
             $this->db->query('UPDATE `hq_question` SET `date`=null');
             $noofdays=28;
             $units=ceil($noofquestions/$noofdays);
               for($i=1;$i<=$noofquestions;$i++)
               {
                        $day=ceil($i/$units);
                        $exactdateday=$day-1;
                        $newdate = date('Y-m-d', strtotime($startdate . ' +'.$exactdateday.' day'));
                        $this->db->query("UPDATE `hq_question` SET `date`='$newdate' WHERE `date` IS null AND `id`='$i'");   
                }
            
         } 
        //SCHEDULE DATE END
        
        
        
        //CURL COMMAND FOR STARTDATE
        
        $this->load->helper('url');
        $mainurl=$this->config->base_url();
        $exactpathforcredential=$mainurl.'/index.php/json/StartPackage?date='.$startdate;
    
      // GET CURL
        $ch = curl_init();  
        $url=$exactpathforcredential;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($ch,CURLOPT_HEADER, false); 
        $output=curl_exec($ch);
        curl_close($ch);
        
        // CURL ENDS HERE
        
        return 1;
	
	}
 public function delete($id)
{
$query=$this->db->query("DELETE FROM `test` WHERE `id`='$id'");
return $query;
}
     public function gettestdropdown()
	{
		$query=$this->db->query("SELECT * FROM `test`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	} 
    
    public function gettestdatabyid($testid)
    {
        $query=$this->db->query("SELECT `id`, `name`, `units`, `schedule`, `startdate`, `department`, `branch`, `designation`, `check`, `team`, `timestamp`, `enddate` FROM `test` WHERE `id`='$testid'")->row();
        return $query;
    }
}
?>