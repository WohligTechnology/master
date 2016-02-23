<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class conclusion_model extends CI_Model
{
public function create($order,$name)
{
$data=array("order" => $order,"name" => $name);
$query=$this->db->insert( "hq_conclusion", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusion")->row();
return $query;
}
function getsingleconclusion($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_conclusion")->row();
return $query;
}
public function edit($id,$order,$name)
{
$data=array("order" => $order,"name" => $name);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_conclusion", $data );
return 1;
}
     public function getConclusionQuestionOption($id)
	{
	$query=$this->db->query("SELECT * FROM `hq_question` WHERE `id` IN (SELECT `question` FROM `hq_conclusionquestion` WHERE `conclusion`='$id')")->result();
        foreach($query as $row)
        {
            $questionid=$row->id;
            $row->avgquestionweight=$this->db->query("SELECT IFNULL(ROUND(AVG( `hq_options`.`weight`),2),0) as `avgquestionweight` FROM `hq_options` WHERE `hq_options`.`question` IN (SELECT `hq_conclusionquestion`.`question` FROM `hq_conclusionquestion` INNER JOIN `hq_useranswer` ON `hq_useranswer`.`question`=`hq_conclusionquestion`.`question` WHERE `hq_conclusionquestion`.`conclusion`='$id')")->row();
            	$row->avgweight=$this->db->query("SELECT IFNULL(ROUND(AVG( `hq_options`.`weight`),2),0) as `avgweight` FROM `hq_options` INNER JOIN `hq_useranswer` ON `hq_useranswer`.`option`=`hq_options`.`id`
INNER JOIN `hq_conclusionquestion` ON `hq_conclusionquestion`.`question`=`hq_useranswer`.`question`
WHERE `hq_conclusionquestion`.`conclusion`='$id'")->row();
            	$row->options=$this->db->query("SELECT * FROM `hq_options` WHERE `question`=$questionid")->result();
            	
        }
	return $query;
    }
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_conclusion` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_conclusion` WHERE `id`='$id'")->row();
return $query;
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
                $conclusion->averagepercent=$this->db->query("SELECT ROUND(IFNULL(AVG(`hq_options`.`weight`),0),2) as `averagepercent` FROM `hq_options` LEFT OUTER JOIN `hq_useranswer` ON `hq_useranswer`.`option`=`hq_options`.`id` WHERE `hq_useranswer`.`user` IN ($userquery) AND `hq_useranswer`.`question` IN (SELECT `hq_conclusionquestion`.`question` FROM `hq_conclusionquestion` LEFT OUTER JOIN `hq_conclusion` ON `hq_conclusion`.`id`=`hq_conclusionquestion`.`conclusion` WHERE `hq_conclusion`.`id`='$conclusion->id')")->row();
//                   
//                   $conclusion->averagepercent=$this->db->query("SELECT AVG(`hq_options`.`weight`) as `averagepercent` FROM `hq_options` LEFT OUTER JOIN `hq_useranswer` ON `hq_useranswer`.`option`=`hq_options`.`id` WHERE `hq_useranswer`.`user` IN ($userquery) AND `hq_useranswer`.`question` IN (SELECT `hq_conclusionquestion`.`question` FROM `hq_conclusionquestion` LEFT OUTER JOIN `hq_conclusion` ON `hq_conclusion`.`id`=`hq_conclusionquestion`.`conclusion` WHERE `hq_conclusion`.`id`='$conclusion->id')")->row();
             
                
               }
          }
          return $conclusionquery;
        
      
    }

    public function getConclusionDropDown()
	{
		$query=$this->db->query("SELECT * FROM `hq_conclusion`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => "Choose Conclusion"
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	
    } 
    public function exportsuggestioncsv($companyname)
	{
        
		$this->load->dbutil();
		$query=$this->db->query("SELECT `hq_conclusion`.`name` as `Conclusion`, `hq_conclusionsuggestion`.`suggestion` as `Suggestions` FROM `hq_conclusion` LEFT OUTER JOIN `hq_conclusionsuggestion` ON `hq_conclusionsuggestion`.`conclusion`=`hq_conclusion`.`id`");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
//        file_put_contents("gs://magicmirroruploads/products_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=products_$timestamp.csv", 'refresh');
        if ( ! write_file("./uploads/suggestion_$companyname.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/suggestion_$companyname.csv"), 'refresh');
             echo 'File written!';
        }
	
    }
}
?>
