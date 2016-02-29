<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class surveyquestionanswer_model extends CI_Model
{
public function create($user,$question,$option)
{
$data=array("user" => $user,"question" => $question,"option" => $option);
$query=$this->db->insert( "hq_surveyquestionanswer", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestionanswer")->row();
return $query;
}
function getsinglesurveyquestionanswer($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_surveyquestionanswer")->row();
return $query;
}
public function edit($id,$user,$question,$option)
{$data=array("user" => $user,"question" => $question,"option" => $option);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_surveyquestionanswer", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_surveyquestionanswer` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `hq_surveyquestionanswer` WHERE `id`='$id'")->row();
return $query;
}
public function getemaildropdown()
{
$query=$this->db->query("SELECT * FROM `hq_surveyquestionuser`  ORDER BY `id` ASC")->result();
$return=array(
"" => ""
);
foreach($query as $row)
{
  $return[$row->id]=$row->email;
}

return $return;
}
    public function exportsurveyresultcsv($surveyid)
    {
        $getsurveyname=$this->db->query("SELECT * FROM `hq_conclusionfinalsuggestion` WHERE `id`=1")->row();
        $surveyname=$getsurveyname->conclusion;
        $this->load->dbutil();
            $query=$this->db->query("");
       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
//        file_put_contents("gs://magicmirroruploads/products_$timestamp.csv", $content);
//		redirect("http://magicmirror.in/servepublic?name=products_$timestamp.csv", 'refresh');
        if ( ! write_file("./uploads/$surveyname.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/$surveyname.csv"), 'refresh');
             echo 'File written!';
        }
    }
}
?>
