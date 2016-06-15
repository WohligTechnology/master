<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class pillar_model extends CI_Model
{
public function create($name,$weight,$order,$expectedweight)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order,"expectedweight" => $expectedweight);
$query=$this->db->insert( "hq_pillar", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
    public function getpillarquestion($questionone,$questiontwo,$questionthree,$questionfour,$optionone,$optiontwo,$optionthree,$optionfour,$optionfive,$optionsix,$optionseven,$optioneight,$optionnine,$optionten,$optioneleven,$optiontwelve,$optionthirteen,$optionfourteen,$optionfifteen,$optionsixteen)
{
        $data1  = array(
         "text" => $questionone
		);
        $this->db->where( "id", 43 );
$query=$this->db->update( "hq_question", $data1 );
        $data2  = array(
         "text" => $questiontwo
		);
         $this->db->where( "id", 44 );
$query=$this->db->update( "hq_question", $data2);
        $data3  = array(
         "text" => $questionthree
		);
        $this->db->where( "id", 45 );
$query=$this->db->update( "hq_question", $data3);
        $data4  = array(
         "text" => $questionfour
		);
          $this->db->where( "id", 46 );
$query=$this->db->update( "hq_question", $data4);

        // INSERT OPTIONS

        $data5  = array(
         "optiontext" => $optionone,
         "text" => $optionone
		);
        $this->db->where( "id", 194 );

$query=$this->db->update( "hq_options", $data5);
        $data6 = array(
         "optiontext" => $optiontwo,
         "text" => $optiontwo
		);
        $this->db->where( "id", 195 );
$query=$this->db->update( "hq_options", $data6);


        $data7 = array(
         "optiontext" => $optionthree,
         "text" => $optionthree
		);
            $this->db->where( "id", 196 );
$query=$this->db->update( "hq_options", $data7);

        $data8 = array(
         "optiontext" => $optionfour,
         "text" => $optionfour
		);
         $this->db->where( "id", 197 );
$query=$this->db->update( "hq_options", $data8);


        $data9 = array(
         "optiontext" => $optionfive,
         "text" => $optionfive,
		);
        $this->db->where( "id", 198 );
$query=$this->db->update( "hq_options", $data9);

        $data9 = array(
         "optiontext" => $optionsix,
         "text" => $optionsix
		);
         $this->db->where( "id", 199 );
$query=$this->db->update( "hq_options", $data9);

        $data10 = array(
         "optiontext" => $optionseven,
         "text" => $optionseven
		);
          $this->db->where( "id", 200 );
$query=$this->db->update( "hq_options", $data10);


        $data11 = array(
         "optiontext" => $optioneight,
         "text" => $optioneight
		);
        $this->db->where( "id", 201 );
$query=$this->db->update( "hq_options", $data11);


        $data12 = array(
         "optiontext" => $optionnine,
         "text" => $optionnine
		);
         $this->db->where( "id", 202 );
$query=$this->db->update( "hq_options", $data12);


        $data13 = array(
         "text" => $optionten,
         "optiontext" => $optionten
		);
        $this->db->where( "id", 203 );
$query=$this->db->update( "hq_options", $data13);


        $data14 = array(
         "text" => $optioneleven,
         "optiontext" => $optioneleven
		);
        $this->db->where( "id", 204 );
$query=$this->db->update( "hq_options", $data14);


        $data15 = array(
         "optiontext" => $optiontwelve,
         "text" => $optiontwelve
		);
        $this->db->where( "id", 205 );
$query=$this->db->update( "hq_options", $data15);


        $data16 = array(
         "optiontext" => $optionthirteen,
            "text" => $optionthirteen
		);
         $this->db->where( "id", 206 );
$query=$this->db->update( "hq_options", $data16);


        $data17= array(
         "optiontext" => $optionfourteen,
         "text" => $optionfourteen
		);
        $this->db->where( "id", 207 );
$query=$this->db->update( "hq_options", $data17);


        $data18= array(
         "optiontext" => $optionfifteen,
         "text" => $optionfifteen
		);
        $this->db->where( "id", 208 );
$query=$this->db->update( "hq_options", $data18);

        $data19= array(
         "optiontext" => $optionsixteen,
         "text" => $optionsixteen
		);
        $this->db->where( "id", 209 );
$query=$this->db->update( "hq_options", $data19);



if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
    public function getpillarweightforedit()
{
$query=$this->db->get("hq_pillar")->result();
return $query;
}
function getsinglepillar($id){
$this->db->where("id",$id);
$query=$this->db->get("hq_pillar")->row();
return $query;
}
public function edit($id,$name,$weight,$order,$expectedweight)
{
$data=array("name" => $name,"weight" => $weight,"order" => $order,"expectedweight" => $expectedweight);
$this->db->where( "id", $id );
$query=$this->db->update( "hq_pillar", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `hq_pillar` WHERE `id`='$id'");
return $query;
}
    public function getallpillars()
{
$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
return $query;
}
    public function getallpillarsbypackage()
{
$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
return $query;
}
    public function editchangeexpected($expected1,$expected2,$expected3,$expected4,$expected5,$expected6,$expected7,$expected8,$expected9,$expected10,$expected11)
{
            $data=array("expectedweight" => $expected1);
            $this->db->where( "id", 1 );
            $query=$this->db->update( "hq_pillar", $data );

            $data1=array("expectedweight" => $expected2);
            $this->db->where( "id", 2 );
            $query=$this->db->update( "hq_pillar", $data1 );

            $data2=array("expectedweight" => $expected3);
            $this->db->where( "id", 3 );
            $query=$this->db->update( "hq_pillar", $data2 );

            $data3=array("expectedweight" => $expected4);
            $this->db->where( "id", 4 );
            $query=$this->db->update( "hq_pillar", $data3 );

            $data4=array("expectedweight" => $expected5);
            $this->db->where( "id", 5 );
            $query=$this->db->update( "hq_pillar", $data4 );

            $data5=array("expectedweight" => $expected6);
            $this->db->where( "id", 6 );
            $query=$this->db->update( "hq_pillar", $data5 );

            $data6=array("expectedweight" => $expected7);
            $this->db->where( "id", 7 );
            $query=$this->db->update( "hq_pillar", $data6 );

            $data7=array("expectedweight" => $expected8);
            $this->db->where( "id", 8 );
            $query=$this->db->update( "hq_pillar", $data7 );

            $data8=array("expectedweight" => $expected9);
            $this->db->where( "id", 9 );
            $query=$this->db->update( "hq_pillar", $data8 );

            $data9=array("expectedweight" => $expected10);
            $this->db->where( "id", 10 );
            $query=$this->db->update( "hq_pillar", $data9 );

            $data10=array("expectedweight" => $expected11);
            $this->db->where( "id", 11 );
            $query=$this->db->update( "hq_pillar", $data10 );
        return 1;
}
    public function updateweightage($range,$range1,$range2,$range3,$range4,$range5,$range6,$range7,$range8,$range9,$range11)
{
        $sumofweight=$range + $range1 + $range2 + $range3 + $range4 + $range5 + $range6 + $range7 + $range8 + $range9 + $range11;
        if($sumofweight<=100){
            $data=array("weight" => $range);
            $this->db->where( "id", 1 );
            $query=$this->db->update( "hq_pillar", $data );

            $data1=array("weight" => $range1);
            $this->db->where( "id", 2 );
            $query=$this->db->update( "hq_pillar", $data1 );

            $data2=array("weight" => $range2);
            $this->db->where( "id", 3 );
            $query=$this->db->update( "hq_pillar", $data2 );

            $data3=array("weight" => $range3);
            $this->db->where( "id", 4 );
            $query=$this->db->update( "hq_pillar", $data3 );

            $data4=array("weight" => $range4);
            $this->db->where( "id", 5 );
            $query=$this->db->update( "hq_pillar", $data4 );

            $data5=array("weight" => $range5);
            $this->db->where( "id", 6 );
            $query=$this->db->update( "hq_pillar", $data5 );

            $data6=array("weight" => $range6);
            $this->db->where( "id", 7 );
            $query=$this->db->update( "hq_pillar", $data6 );

            $data7=array("weight" => $range7);
            $this->db->where( "id", 8 );
            $query=$this->db->update( "hq_pillar", $data7 );

            $data8=array("weight" => $range8);
            $this->db->where( "id", 9 );
            $query=$this->db->update( "hq_pillar", $data8 );

            $data9=array("weight" => $range9);
            $this->db->where( "id", 10 );
            $query=$this->db->update( "hq_pillar", $data9 );

            $data10=array("weight" => $range11);
            $this->db->where( "id", 11 );
            $query=$this->db->update( "hq_pillar", $data10 );

            return 1;
        }
        else{
            return 0;
        }




}


    public function updateweightageviewpillar($range,$range1,$range2,$range3,$range4,$range5,$range6,$range7,$range8,$range9,$range11)
{

            $data=array("weight" => $range);
            $this->db->where( "id", 1 );
            $query=$this->db->update( "hq_pillar", $data );

            $data1=array("weight" => $range1);
            $this->db->where( "id", 2 );
            $query=$this->db->update( "hq_pillar", $data1 );

            $data2=array("weight" => $range2);
            $this->db->where( "id", 3 );
            $query=$this->db->update( "hq_pillar", $data2 );

            $data3=array("weight" => $range3);
            $this->db->where( "id", 4 );
            $query=$this->db->update( "hq_pillar", $data3 );

            $data4=array("weight" => $range4);
            $this->db->where( "id", 5 );
            $query=$this->db->update( "hq_pillar", $data4 );

            $data5=array("weight" => $range5);
            $this->db->where( "id", 6 );
            $query=$this->db->update( "hq_pillar", $data5 );

            $data6=array("weight" => $range6);
            $this->db->where( "id", 7 );
            $query=$this->db->update( "hq_pillar", $data6 );

            $data7=array("weight" => $range7);
            $this->db->where( "id", 8 );
            $query=$this->db->update( "hq_pillar", $data7 );

            $data8=array("weight" => $range8);
            $this->db->where( "id", 9 );
            $query=$this->db->update( "hq_pillar", $data8 );

            $data9=array("weight" => $range9);
            $this->db->where( "id", 10 );
            $query=$this->db->update( "hq_pillar", $data9 );

            $data11=array("weight" => $range11);
            $this->db->where( "id", 11 );
            $query=$this->db->update( "hq_pillar", $data11 );
              return 1;

}
	public function showavg()
	{
		$query=$this->db->query("SELECT SUM(`weight`) as `weight` FROM `hq_pillar`")->row();
		$totalweightpercent=$query->weight;


        return number_format((float)$totalweightpercent, 2, '.', '');
	}
    public function lastpillardetail()
	{
		$query=$this->db->query("SELECT * FROM `hq_pillar` WHERE `id`=11")->row();
        return $query;
	}
    public function getpillardropdown()
	{
		$query=$this->db->query("SELECT * FROM `hq_pillar`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}
    public function getelevenpillarquestion()
	{
        $query=$this->db->query("SELECT * FROM `hq_question` WHERE `id` BETWEEN '43' AND '46'")->result();
        return $query;
	}
    public function getelevenpillaroption()
	{
        $query=$this->db->query("SELECT * FROM `hq_options` WHERE `id` BETWEEN '194' AND '209'")->result();
        return $query;
	}
    public function getelevenpillar()
	{
        $query=$this->db->query("SELECT * FROM `hq_pillar` WHERE `id` =11")->row();
        return $query;
	}
}
?>
