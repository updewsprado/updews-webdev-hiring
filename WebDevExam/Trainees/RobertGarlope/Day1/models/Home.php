<?php

class Home extends Model 
{
	public function getReadMore($type,$vname)
	{
		if($type == 1) //to get images
		{
			$vname = $_GET['vname'];

			//$sql = "select vd_image.cm_code, vd_image.cm_image,vd_image.vd_id,vd.vd_name from vd_image,vd where vd_image.vd_id= vd.vd_id and vd_image.vd_id=(select vd.vd_id from vd where vd.vd_name='$vname') order by vd_image.cm_code ASC"; 
			$sql = "SELECT img.cm_code, img.cm_image,img.vd_id,vd.vd_name FROM vd LEFT JOIN vd_image as img ON img.vd_id = vd.vd_id WHERE vd.vd_name=:vdname ORDER BY img.cm_code ASC ";
			$pdo = $this->db->prepare($sql);
			$pdo->execute(array(':vdname' => $vname));
			$arr = array();
			while($row = $pdo->fetch(PDO::FETCH_ASSOC))
			{
				$arr[] = $row['cm_image'];
			}
			return $arr;
		}
		else if($type == 2) //to get images
		{
			$vname = $_GET['vname'];
		
			$sql = "SELECT ed.ed_erupsite,ed.ed_nar,ed.ed_stime,ed.ed_etime, ed.ed_com FROM vd LEFT JOIN ed ON ed.vd_id = vd.vd_id WHERE vd.vd_name=:vdname ORDER BY ed.ed_stime DESC";
			$pdo = $this->db->prepare($sql);
			$pdo->execute(array(':vdname' => $vname));
			$tbl = '';
			$tbl .= '<div class="table-responsive">
					<table class="table">
					<thead>
						<tr>
							<th>Year and Duration</th>
							<th>Site</th>
							<th>Eruption Character</th>
							<th>Affected Areas/Remarks</th>
						</tr>
					</thead>';
			while($row = $pdo->fetch(PDO::FETCH_ASSOC))
			{
				$tbl .='<tbody>
				<tr>
				<td>'.$row['ed_stime'].' - '.$row['ed_etime'].'</td>
				<td>'.$row['ed_erupsite'].'</td>
				<td>'.$row['ed_nar'].'</td>
				<td>'.$row['ed_com'].'</td>
				</tr>
				</tbody>';
			}	
			echo $tbl .='</table></div>'; 
		}   
	}
	/*
		get list of volvan active / inactive, potentially active
	*/
	public function getStatusVolcan($type)
	{
		$sql= "SELECT v.vd_id,v.vd_name FROM vd_inf as i LEFT JOIN vd as v ON v.vd_id = i.vd_id WHERE i.vd_inf_vtype=:type ORDER BY v.vd_name ASC";
		$pdo = $this->db->prepare($sql);
		$pdo->execute(array(':type' => $type));
		$arr = array();$i=0;
		while($row = $pdo->fetch(PDO::FETCH_ASSOC))
		{
			$arr[$i]['val'] = $row['vd_id'];
			$arr[$i++]['name'] = $row['vd_name'];
		}
			
		return $arr;
	}
	
	public function getBullitinDateList()
	{
		$pdo = $this->db->prepare("SELECT p.bu_date as sdate,vd.vd_name FROM bu_pdf as p INNER JOIN vd ON vd.vd_id = p.vd_id order by p.bu_date DESC");
		$pdo->execute();
		$totalrows = $pdo->fetch(PDO::FETCH_ASSOC);
	}
	
	
	public function getSearchVolcan($vname)
	{
		$sql = "SELECT vd.vd_name,vd.vd_id, vi.vd_inf_slat, vi.vd_inf_slon, vi.vd_inf_province, vi.vd_inf_region, vi.vd_inf_nearbyct, vi.vd_inf_vtype,vi.vd_inf_rtype, vi.vd_inf_tectonic, vi.vd_inf_agedeposit,vi.vd_inf_selev, vi.vd_inf_no_histerupt,vi.vd_inf_latesterupt FROM vd LEFT JOIN vd_inf as vi ON vi.vd_id = vd.vd_id WHERE vd.vd_name LIKE :vdname";
		$pdo = $this->db->prepare($sql);
		$pdo->execute(array(':vdname' => $vname));
		$row = $pdo->fetch(PDO::FETCH_ASSOC);
		$tbl = '<center><h3>'.$row["vd_name"].' Volcano</h3> </center>';
		$tbl .= '<table class="table table-striped txt-left">
				<thead>';
		$tbl .= '<tr>
					<td><b>Latitude:</b></td>	
					<td>'.$row['vd_inf_slat'].'</td>
				</tr>		
				<tr>
					<td><b>Longitude:</b></td>
					<td>	 '.$row['vd_inf_slon'].'</td>
				</tr>
				<tr><td><b>Province:</b> </td>	
				<td>	'.$row['vd_inf_province'].'</td>
				</tr>
				<tr>
					<td><b>Region:</b> </td>	
					<td>	 '.$row['vd_inf_region'].' </td>
				</tr>
				<tr>
					<td><b>Near By Cities/Towns:</b></td>
					<td>	'.$row['vd_inf_nearbyct'].'</td>
				</tr>
				<tr>
					<td><b>Volcano Type:</b></td>
					<td>	 '.$row['vd_inf_vtype'].'</td>
				</tr>
				<tr>
					<td><b>Rock Type:</b></td>
					<td>	'.$row['vd_inf_rtype'].'</td>
				</tr>
				<tr>
					<td><b>Tectonic Setting:</b> </td>
					<td>	 '.$row['vd_inf_tectonic'].'</td>
				</tr>
				<tr>
					<td><b>Age Of Deposits:</b </td>
					<td>	 '.$row['vd_inf_agedeposit'].'</td>
				</tr>
				<tr>
					<td><b>Elevation: </b></td>
					<td>	'.$row['vd_inf_selev'].'</td>
				</tr>
				<tr>
					<td><b>Number Of Historical Eruptions: </b>
					</td>	<td>	'.$row['vd_inf_no_histerupt'].' </td>
				</tr>
				<tr>
					<td><b>Latest Eruption:</b> </td>	
					<td>	  '.$row['vd_inf_latesterupt'].' </td>
				</tr>
    </thead>';
		return $tbl .= '</table>';

	}
	
	public function getBulletin($startdate,$enddate,$volId)
	{
		try
		{
			
			$records_per_page = 30;
			$pagination = new Pagination();
			$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');	

			$where = '';$all = '';
			if(trim($startdate) && trim($enddate) && $volId != 'all')
				$where = " AND bu_date BETWEEN :startdate AND :enddate ";
			else if(trim($startdate) && trim($enddate) == '')
				$where = " AND bu_date >= :startdate ";
			else if(trim($startdate) == '' && trim($enddate))
				$where =" AND bu_date <= :enddate ";

			if($volId != 'all')
				$all = 'vd_id = :volId';
			$where = "WHERE ".$all.$where;

			//echo "SELECT SQL_CALC_FOUND_ROWS * FROM bu_pdf $where ORDER BY bu_date DESC LIMIT";
			$pdo = $this->db->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM bu_pdf $where ORDER BY bu_date DESC LIMIT ".(($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page);
			
			if($volId != 'all')
				$pdo->bindparam(":volId", $volId);  
			if(trim($enddate))
				$pdo->bindparam(":enddate", $enddate);
			if(trim($startdate))
				$pdo->bindparam(":startdate", $startdate);
			$pdo->execute();
			
			
			$pdo2 = $this->db->prepare("SELECT FOUND_ROWS() AS `found_rows`");
			$pdo2->execute();
			$totalrows = $pdo2->fetch(PDO::FETCH_ASSOC);
			$total_rows = $totalrows['found_rows'];
			// pass the total number of records to the pagination class
			$pagination->records($total_rows);
			// records per page
			$pagination->records_per_page($records_per_page);
			//$pbo->execute(array(':edate'=>$enddate));
			$tbl ='<table class="table table-striped">
				<thead>
				  <tr>
					<th>Code</th>
					<th>Description</th>
					<th>Date</th>
					<th>Bulletin</th>
				  </tr>
				</thead>
				<tbody>';
			while($row = $pdo->fetch(PDO::FETCH_ASSOC))
			{
				$tbl.= '
					<tr>
						<td>'.$row['bu_code'].'</td>
						<td>'.$row['bu_description'].'</td>
						<td>'.$row['bu_date'].'</td>
						<td><a href="/cm_image/bulletin/'.$row['bu_file'].'" target="_blank">View</a></td>
					</tr>';
			}
			echo $tbl .='</tbody></table>';
			echo '<div class="clear text-center">';
				// render the pagination links
				$pagination->render();
			echo '</div>';	 
		}	
		catch(PDOException $e)
        {
           die('ERROR: ' . $e->getMessage());
        } 
	}
	
	public function getPicture()
	{
		$pdo = $this->db->query("SELECT * FROM cm WHERE cm_id > 1 order by rand() LIMIT 50");
		$pdo->execute();
		$pictures = array();
		while($row = $pdo->fetch(PDO::FETCH_ASSOC))
		{
			if ($row["vd_id"] == 574){ //Mayon
				$fullpath = '/cm_image/'.'mayon/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}else if ($row["vd_id"] == 565){ //Kanlaon
				$fullpath = '/cm_image/'.'kanlaon/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}else if ($row["vd_id"] == 583){ //Pinatubo
				$fullpath = '/cm_image/'.'pinatubo/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}else if ($row["vd_id"] == 580){ //Taal
				$fullpath = '/cm_image/'.'taal/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}else if ($row["vd_id"] == 562){ //Hibok-Hibok
				$fullpath = '/cm_image/'.'hibok/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}else if ($row["vd_id"] == 571){ //Bulusan
				$fullpath = '/cm_image/'.'bulusan/'.strtolower($row["cm_type"]).'/'.$row["cm_image"];
			}
			$pictures[] = array('thumbnail' =>$fullpath, 'id' =>$fullpath);
		}
		return $pictures;
		/*
		= array(
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVDT2006TO2008t.jpg'	, 'id' =>	'/img/home/BVDT2006TO2008.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVDT2007TOAPR2008t.jpg', 'id' =>	'/img/home/BVDT2007TOAPR2008.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVDT2010TO2011t.jpg'	, 'id' =>	'/img/home/BVDT2010TO2011.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200603t.jpg'	, 'id' =>	'/img/home/BVEPIC200603.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200604t.jpg'	, 'id' =>	'/img/home/BVEPIC200604.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200605t.jpg'	, 'id' =>	'/img/home/BVEPIC200605.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200606t.jpg'	, 'id' =>	'/img/home/BVEPIC200606.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200607t.jpg'	, 'id' =>	'/img/home/BVEPIC200607.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200609t.jpg'	, 'id' =>	'/img/home/BVEPIC200609.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200611t.jpg'	, 'id' =>	'/img/home/BVEPIC200611.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200702t.jpg'	, 'id' =>	'/img/home/BVEPIC200702.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200703t.jpg'	, 'id' =>	'/img/home/BVEPIC200703.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200704t.jpg'	, 'id' =>	'/img/home/BVEPIC200704.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200705t.jpg'	, 'id' =>	'/img/home/BVEPIC200705.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200706t.jpg'	, 'id' =>	'/img/home/BVEPIC200706.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200709t.jpg'	, 'id' =>	'/img/home/BVEPIC200709.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200710t.jpg'	, 'id' =>	'/img/home/BVEPIC200710.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200801t.jpg'	, 'id' =>	'/img/home/BVEPIC200801.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200802t.jpg'	, 'id' =>	'/img/home/BVEPIC200802.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200803t.jpg'	, 'id' =>	'/img/home/BVEPIC200803.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200804t.jpg'	, 'id' =>	'/img/home/BVEPIC200804.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200805t.jpg'	, 'id' =>	'/img/home/BVEPIC200805.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200806t.jpg'	, 'id' =>	'/img/home/BVEPIC200806.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200807t.jpg'	, 'id' =>	'/img/home/BVEPIC200807.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC200808t.jpg'	, 'id' =>	'/img/home/BVEPIC200808.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201011t.jpg'	, 'id' =>	'/img/home/BVEPIC201011.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201012t.jpg'	, 'id' =>	'/img/home/BVEPIC201012.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201103t.jpg'	, 'id' =>	'/img/home/BVEPIC201103.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201104t.jpg'	, 'id' =>	'/img/home/BVEPIC201104.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201105t.jpg'	, 'id' =>	'/img/home/BVEPIC201105.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201106t.jpg'	, 'id' =>	'/img/home/BVEPIC201106.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201107t.jpg'	, 'id' =>	'/img/home/BVEPIC201107.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201109t.jpg'	, 'id' =>	'/img/home/BVEPIC201109.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC201110t.jpg'	, 'id' =>	'/img/home/BVEPIC201110.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC20110814t.jpg'	, 'id' =>	'/img/home/BVEPIC20110814.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC20120510t.jpg'	, 'id' =>	'/img/home/BVEPIC20120510.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC20120519t.jpg'	, 'id' =>	'/img/home/BVEPIC20120519.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPIC20120608t.jpg'	, 'id' =>	'/img/home/BVEPIC20120608.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVEPICJANTOAUG2008t.jpg'	, 'id' =>	'/img/home/BVEPICJANTOAUG2008.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVHCSPRINGSt.jpg'	, 'id' =>	'/img/home/BVHCSPRINGS.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_1t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_2t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_2.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_3t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_3.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_4t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_4.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_5t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_5.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_6t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_6.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_7t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_7.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_8t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_8.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_9t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_9.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_10t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_9.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_11t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_11.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_12t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_12.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_13t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_13.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_14t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_14.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_15t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_15.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_16t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_15.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIMS_201102210912_17t.jpg'	, 'id' =>	'/img/home/BVIMS_201102210912_17.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVLLHAZG100-20t.jpg'	, 'id' =>	'/img/home/BVLLHAZG100-20.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVPFHAZG100-20t.jpg'	, 'id' =>	'/img/home/BVPFHAZG100-20.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/HVAIRFALLHAZt.jpg'	, 'id' =>	'/img/home/HVAIRFALLHAZ.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/HVHAZPYROt.jpg'	, 'id' =>	'/img/home/HVHAZPYRO.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/HVLAHARHAZt.jpg'	, 'id' =>	'/img/home/HVLAHARHAZ.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/HVLAVAHAZt.jpg'	, 'id' =>	'/img/home/HVLAVAHAZ.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KV_PLt.jpg'	, 'id' =>	'/img/home/KV_PL.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120509t.jpg'	, 'id' =>	'/img/home/KVEPIC20120509.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120514t.jpg'	, 'id' =>	'/img/home/KVEPIC20120514.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120519t.jpg'	, 'id' =>	'/img/home/KVEPIC20120519.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120531t.jpg'	, 'id' =>	'/img/home/KVEPIC20120531.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120608t.jpg'	, 'id' =>	'/img/home/KVEPIC20120608.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120616t.jpg'	, 'id' =>	'/img/home/KVEPIC20120608.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120622t.jpg'	, 'id' =>	'/img/home/KVEPIC20120622.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120629t.jpg'	, 'id' =>	'/img/home/KVEPIC20120629.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120708t.jpg'	, 'id' =>	'/img/home/KVEPIC20120708.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120716t.jpg'	, 'id' =>	'/img/home/KVEPIC20120716.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20120729t.jpg'	, 'id' =>	'/img/home/KVEPIC20120729.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVEPIC20121021t.jpg'	, 'id' =>	'/img/home/KVEPIC20121021.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVESWARMREVt.jpg'	, 'id' =>	'/img/home/KVESWARMREV.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVGPSNET2011t.jpg'	, 'id' =>	'/img/home/KVGPSNET2011.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVLFHAZ200002t.jpg'	, 'id' =>	'/img/home/KVLFHAZ200002.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVPFLAHARHAZ200002t.jpg'	, 'id' =>	'/img/home/KVPFLAHARHAZ200002.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201202t.jpg'	, 'id' =>	'/img/home/KVSEIS_201202.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201203t.jpg'	, 'id' =>	'/img/home/KVSEIS_201203.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201204t.jpg'	, 'id' =>	'/img/home/KVSEIS_201204.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201205t.jpg'	, 'id' =>	'/img/home/KVSEIS_201205.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201206t.jpg'	, 'id' =>	'/img/home/KVSEIS_201206.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201207t.jpg'	, 'id' =>	'/img/home/KVSEIS_201207.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201208t.jpg'	, 'id' =>	'/img/home/KVSEIS_201208.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201209t.jpg'	, 'id' =>	'/img/home/KVSEIS_201209.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEIS_201210t.jpg'	, 'id' =>	'/img/home/KVSEIS_201210.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/KVSEISNET2011t.jpg'	, 'id' =>	'/img/home/KVSEISNET2011.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVMT2007TOAPR2008t.jpg'	, 'id' =>	'/img/home/MT2007TOAPR2008.png'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MV_ASHFALLHAZt.jpg'	, 'id' =>	'/img/home/MV_ASHFALLHAZ.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MV_LAHARt.jpg'	, 'id' =>	'/img/home/MV_LAHAR.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MV_LAVAt.jpg'	, 'id' =>	'/img/home/MV_LAVA.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MV_PFt.jpg'	, 'id' =>	'/img/home/MV_PF.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVASHPUFF_20091216t.jpg'	, 'id' =>	'/img/home/MVASHPUFF_20091216.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_1t.jpg'	, 'id' =>	'/img/home/MVCHR_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_2t.jpg'	, 'id' =>	'/img/home/MVCHR_2.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_3t.jpg'	, 'id' =>	'/img/home/MVCHR_3.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_4t.jpg'	, 'id' =>	'/img/home/MVCHR_4.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_5t.jpg'	, 'id' =>	'/img/home/MVCHR_5.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_6t.jpg'	, 'id' =>	'/img/home/MVCHR_6.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_7t.jpg'	, 'id' =>	'/img/home/MVCHR_7.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_8t.jpg'	, 'id' =>	'/img/home/MVCHR_8.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_9t.jpg'	, 'id' =>	'/img/home/MVCHR_9.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVCHR_10t.jpg'	, 'id' =>	'/img/home/MVCHR_10.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVEPIC_201210t.jpg'	, 'id' =>	'/img/home/MVEPIC_201210.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVEPIC_20120510t.jpg'	, 'id' =>	'/img/home/MVEPIC_20120510.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVEPIC_20120514t.jpg'	, 'id' =>	'/img/home/MVEPIC_20120514.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVEPIC_20120519t.jpg'	, 'id' =>	'/img/home/MVEPIC_20120519.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVEPIC_20121021t.jpg'	, 'id' =>	'/img/home/MVEPIC_20121021.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVHOTSPRINGSt.jpg'	, 'id' =>	'/img/home/MVHOTSPRINGS.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_1t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_2t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_2.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_3t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_3.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_4t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_4.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_5t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_5.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_6t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_6.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_20091214_7t.jpg'	, 'id' =>	'/img/home/MVIM_20091214_7.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262231t.jpg'	, 'id' =>	'/img/home/MVIM_200607262231.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262238t.jpg'	, 'id' =>	'/img/home/MVIM_200607262238.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262244t.jpg'	, 'id' =>	'/img/home/MVIM_200607262244.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262248t.jpg'	, 'id' =>	'/img/home/MVIM_200607262248.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262258t.jpg'	, 'id' =>	'/img/home/MVIM_200607262258.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607262326t.jpg'	, 'id' =>	'/img/home/MVIM_200607262326.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607271330t.jpg'	, 'id' =>	'/img/home/MVIM_200607271330.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272023t.jpg'	, 'id' =>	'/img/home/MVIM_200607272023.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272044t.jpg'	, 'id' =>	'/img/home/MVIM_200607272044.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272110t.jpg'	, 'id' =>	'/img/home/MVIM_200607272110.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272214t.jpg'	, 'id' =>	'/img/home/MVIM_200607272214.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272220t.jpg'	, 'id' =>	'/img/home/MVIM_200607272220.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200607272224t.jpg'	, 'id' =>	'/img/home/MVIM_200607272224.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608010716t.jpg'	, 'id' =>	'/img/home/MVIM_200608010716.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608010721t.jpg'	, 'id' =>	'/img/home/MVIM_200608010721.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011601t.jpg'	, 'id' =>	'/img/home/MVIM_200608011601.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011744t.jpg'	, 'id' =>	'/img/home/MVIM_200608011744.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011749t.jpg'	, 'id' =>	'/img/home/MVIM_200608011749.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011756t.jpg'	, 'id' =>	'/img/home/MVIM_200608011756.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011801t.jpg'	, 'id' =>	'/img/home/MVIM_200608011801.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011813t.jpg'	, 'id' =>	'/img/home/MVIM_200608011813.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011814t.jpg'	, 'id' =>	'/img/home/MVIM_200608011814.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011817t.jpg'	, 'id' =>	'/img/home/MVIM_200608011817.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011823t.jpg'	, 'id' =>	'/img/home/MVIM_200608011823.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011824t.jpg'	, 'id' =>	'/img/home/MVIM_200608011824.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011826t.jpg'	, 'id' =>	'/img/home/MVIM_200608011826.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011828t.jpg'	, 'id' =>	'/img/home/MVIM_200608011828.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011833t.jpg'	, 'id' =>	'/img/home/MVIM_200608011833.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011836t.jpg'	, 'id' =>	'/img/home/MVIM_200608011836.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011840t.jpg'	, 'id' =>	'/img/home/MVIM_200608011840.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011843t.jpg'	, 'id' =>	'/img/home/MVIM_200608011843.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011848t.jpg'	, 'id' =>	'/img/home/MVIM_200608011848.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608011900t.jpg'	, 'id' =>	'/img/home/MVIM_200608011900.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012044t.jpg'	, 'id' =>	'/img/home/MVIM_200608012044.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012118t.jpg'	, 'id' =>	'/img/home/MVIM_200608012118.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012220t.jpg'	, 'id' =>	'/img/home/MVIM_200608012220.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012235t.jpg'	, 'id' =>	'/img/home/MVIM_200608012235.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012324t.jpg'	, 'id' =>	'/img/home/MVIM_200608012324.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608012326t.jpg'	, 'id' =>	'/img/home/MVIM_200608012326.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608020630t.jpg'	, 'id' =>	'/img/home/MVIM_200608020630.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608020644t.jpg'	, 'id' =>	'/img/home/MVIM_200608020644.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/MVIM_200608020649t.jpg'	, 'id' =>	'/img/home/MVIM_200608020649.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201108t.jpg'	, 'id' =>	'/img/home/TVEPIC201108.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201112t.jpg'	, 'id' =>	'/img/home/TVEPIC201112.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201201t.jpg'	, 'id' =>	'/img/home/TVEPIC201201.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201202t.jpg'	, 'id' =>	'/img/home/TVEPIC201202.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201203t.jpg'	, 'id' =>	'/img/home/TVEPIC201203.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201204t.jpg'	, 'id' =>	'/img/home/TVEPIC201204.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201205t.jpg'	, 'id' =>	'/img/home/TVEPIC201205.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201206t.jpg'	, 'id' =>	'/img/home/TVEPIC201206.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201207t.jpg'	, 'id' =>	'/img/home/TVEPIC201207.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201208t.jpg'	, 'id' =>	'/img/home/TVEPIC201208.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201209t.jpg'	, 'id' =>	'/img/home/TVEPIC201209.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC201210t.jpg'	, 'id' =>	'/img/home/TVEPIC201210.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20110115t.jpg'	, 'id' =>	'/img/home/TVEPIC20110115.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20110124t.jpg'	, 'id' =>	'/img/home/TVEPIC20110124.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20110814t.jpg'	, 'id' =>	'/img/home/TVEPIC20110814.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20111008t.jpg'	, 'id' =>	'/img/home/TVEPIC20111008.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20111009t.jpg'	, 'id' =>	'/img/home/TVEPIC20111009.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20111016t.jpg'	, 'id' =>	'/img/home/TVEPIC20111016.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20111102t.jpg'	, 'id' =>	'/img/home/TVEPIC20111102.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20111211t.jpg'	, 'id' =>	'/img/home/TVEPIC20111211.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120502t.jpg'	, 'id' =>	'/img/home/TVEPIC20120502.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120508t.jpg'	, 'id' =>	'/img/home/TVEPIC20120508.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120519t.jpg'	, 'id' =>	'/img/home/TVEPIC20120519.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120531t.jpg'	, 'id' =>	'/img/home/TVEPIC20120531.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120608t.jpg'	, 'id' =>	'/img/home/TVEPIC20120608.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120616t.jpg'	, 'id' =>	'/img/home/TVEPIC20120616.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120622t.jpg'	, 'id' =>	'/img/home/TVEPIC20120622.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120629t.jpg'	, 'id' =>	'/img/home/TVEPIC20120629.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120708t.jpg'	, 'id' =>	'/img/home/TVEPIC20120708.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120716t.jpg'	, 'id' =>	'/img/home/TVEPIC20120716.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20120729t.jpg'	, 'id' =>	'/img/home/TVEPIC20120729.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20121021t.jpg'	, 'id' =>	'/img/home/TVEPIC20121021.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20121028t.jpg'	, 'id' =>	'/img/home/TVEPIC20121028.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVEPIC20121202t.jpg'	, 'id' =>	'/img/home/TVEPIC20121202.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVESWARM20121113t.jpg'	, 'id' =>	'/img/home/TVESWARM20121113.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVESWARM20121116t.jpg'	, 'id' =>	'/img/home/TVESWARM20121116.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVINT1_20110108t.jpg'	, 'id' =>	'/img/home/TVINT1_20110108.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVINT1p_20110115t.jpg'	, 'id' =>	'/img/home/TVINT1p_20110115.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVINT2_20110124t.jpg'	, 'id' =>	'/img/home/TVINT2_20110124.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVINT2_20110128t.jpg'	, 'id' =>	'/img/home/TVINT2_20110128.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/TVINT2_20110302t.jpg'	, 'id' =>	'/img/home/TVINT2_20110302.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912140607t.jpg'	, 'id' =>	'/img/home/VMANSG200912140607.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912150301t.jpg'	, 'id' =>	'/img/home/VMANSG200912150301.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912170518t.jpg'	, 'id' =>	'/img/home/VMANSG200912170518.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912172353t.jpg'	, 'id' =>	'/img/home/VMANSG200912172353.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912180536t.jpg'	, 'id' =>	'/img/home/VMANSG200912180536.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912181756t.jpg'	, 'id' =>	'/img/home/VMANSG200912181756.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912190549t.jpg'	, 'id' =>	'/img/home/VMANSG200912190549.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912191802t.jpg'	, 'id' =>	'/img/home/VMANSG200912191802.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912200555t.jpg'	, 'id' =>	'/img/home/VMANSG200912200555.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912201300t.jpg'	, 'id' =>	'/img/home/VMANSG200912201300.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912220505t.jpg'	, 'id' =>	'/img/home/VMANSG200912220505.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912231616t.jpg'	, 'id' =>	'/img/home/VMANSG200912231616.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912252209t.jpg'	, 'id' =>	'/img/home/VMANSG200912252209.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/VMANSG200912291702t.jpg'	, 'id' =>	'/img/home/VMANSG200912291702.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_20071015_1t.jpg'	, 'id' =>	'/img/home/BVAERIAL_20071015_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260941t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260941.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260942t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260942.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260943t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260943.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260944t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260944.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260945_1t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260945_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260945_2t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260945_2.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVAERIAL_200710260945_3t.jpg'	, 'id' =>	'/img/home/BVAERIAL_200710260945_3.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121037Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121037H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121038Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121038H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121040Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121040H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121042Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121042H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121058Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121058H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121059Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121059H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121103Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121103H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121104Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121104H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121112Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121112H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121113Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121113H.jpg'),
		//array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121114Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121114H.jpg'),//missing
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121115Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121115H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121330Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121330H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVASH200705121356Ht.jpg'	, 'id' =>	'/img/home/BVASH200705121356H.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIM20070731_1t.jpg'	, 'id' =>	'/img/home/BVIM20070731_1.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIM20070731_2t.jpg'	, 'id' =>	'/img/home/BVIM20070731_2.jpg'),
		array('thumbnail' =>	'/img/home/cm_image_thumbs/BVIM20070731_3t.jpg'	, 'id' =>	'/img/home/BVIM20070731_3.jpg')
		);
		*/
	}
}
