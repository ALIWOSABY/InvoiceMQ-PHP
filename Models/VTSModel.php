<?php


$connect = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
class VTSModel
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = "";
	private $database  = "mysql_db";
	private $movementheadTable = 'v_s';
	private $movementdetailsTable = 'tn_s';
	private $amountdlivdTable = 'amnt_dlivd';
	private $movementdetailsTablecust = 'tn_c';
	private $dbConnect = false;




	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			$conn->set_charset("utf8");
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}



	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
		}

		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}


	public function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	public function SaveVTSdata($POST)
	{
		$sqlInsert = "
		INSERT INTO " . $this->movementheadTable . "(VS_TYP_ID,VS_TYP_NO,VS_DAT,VOU_USE_ID, VS_BENF, VS_NT,VS_ST,TSTOTDYCOM,TSITOTRET,TSTOTAMOU,TSTOTSALE, TSMUS,TSHISREMD,TSONREMD,TCTOTDY) 
		VALUES ('" . $POST['VS_TYP_ID'] . "' ,'" . $POST['VS_TYP_NO'] . "' ,'" . $POST['VS_DAT'] . "' , '" . $POST['VOU_USE_ID'] . "', '" . $POST['VS_BENF'] . "', '" . $POST['VS_NT'] . "', '" . $POST['VS_ST'] . "','" . $POST['TSTOTDYCOM'] . "', '" . $POST['TSITOTRET'] . "', '" . $POST['TSTOTAMOU'] . "', '" . $POST['TSTOTSALE'] . "', '" . $POST['TSMUS'] . "', '" . $POST['TSHISREMD'] . "','" . $POST['TSONREMD'] . "','" . $POST['TSTOTDYCOM'] . "')";

		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId  = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['TS_SER']); $i++) {
			$sqlInsertItem = "
			INSERT INTO " . $this->movementdetailsTable . "(TS_V_ID, TS_SER , TS_DY, TSDAT, VS_CUSTID, TS_NUM, TS_PRC, TS_TOT, TS_DISC, TSTOTDISC,TSNT,TSTOTSALE,TSMUS,TSMUST) 
			VALUES ('" . $lastInsertId . "', '" . $POST['TS_SER'][$i] . "', '" . $POST['TS_DY'][$i] . "','" . $POST['TSDAT'][$i] . "','" . $POST['VS_CUSTID'][$i] . "', '" . $POST['TS_NUM'][$i] . "', '" . $POST['TS_PRC'][$i] . "', '" . $POST['TS_TOT'][$i] . "', '" . $POST['TS_DISC'][$i] . "', '" . $POST['TSTOTDISC'][$i] . "','" . $POST['TSNT'][$i] . "','" . $POST['TSTOTSALE'] . "','" . $POST['TSMUS'] . "','" . $POST['TSMUST'][$i] . "')";

			// print_r ($sqlInsertItem);
			// echo '<br />';
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
		$sqlInsertone = "
		INSERT INTO " . $this->amountdlivdTable . "(AMNTS_V_ID,AMNTS_DAT,VOU_USE_ID,AMTS_BENF,TSTOTSALE, TSMUS, TSHISREMD,TSONREMD) 
		VALUES ('" . $lastInsertId . "','" . $POST['VS_DAT'] . "' ,'" . $POST['VOU_USE_ID'] . "' ,'" . $POST['VS_BENF'] . "' , '" . $POST['TSTOTSALE'] . "', '" . $POST['TSMUS'] . "', '" . $POST['TSHISREMD'] . "','" . $POST['TSONREMD'] . "')";
		// print_r ($sqlInsert);
		// echo '<br />';
		mysqli_query($this->dbConnect, $sqlInsertone);


		// $lastInsertId  = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['TS_SER']); $i++) {
			$sqlInsertItemcust = "
			INSERT INTO " . $this->movementdetailsTablecust . "(TC_V_ID, TC_SER , TC_DY, VC_CUSTID, TCNUM, TC_PRC, TC_TOT, TCCOMIS, TCCOMISM, TCTOTDISC, TCTOTDISCM, TCPST,TCNT,TC_DAT,TCMUST) 
			VALUES ('" . $lastInsertId . "', '" . $POST['TS_SER'][$i] . "', '" . $POST['TS_DY'][$i] . "','" . $POST['VS_CUSTID'][$i] . "', '" . $POST['TS_NUM'][$i] . "', '" . $POST['TS_PRC'][$i] . "', '" . $POST['TS_TOT'][$i] . "',' 0 ',' 0 ','" . $POST['TS_TOT'][$i] . "','" . $POST['TS_TOT'][$i] . "','" . $POST['VS_BENF'] . "','" . $POST['TSNT'][$i] . "','" . $POST['TSDAT'][$i] . "',' 0 ')";

			// print_r ($sqlInsertItem);
			// echo '<br />';
			mysqli_query($this->dbConnect, $sqlInsertItemcust);
		}
	}





	public function getInvoiceList()
	{
		$sqlQuery = "
			SELECT * FROM " . $this->movementheadTable . "";
		return  $this->getData($sqlQuery);
	}

	public function getvtsList($connect)
	{
		$query = "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`,SYS_User_name,SUPP_NAME from v_s,userss,supp Where VOU_USE_ID = Analytic_Acc_id and VS_BENF = SUPP_ID and  VS_ST = 0;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}



	public function getvtsList_rev($connect)
	{
		$query = "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`,SYS_User_name,SUPP_NAME from v_s,userss,supp Where VOU_USE_ID = Analytic_Acc_id and VS_BENF = SUPP_ID and  VS_ST = 1;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}

	public function getvtsList_final($connect)
	{
		$query = "SELECT `VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`,SYS_User_name,SUPP_NAME from v_s,userss,supp Where VOU_USE_ID = Analytic_Acc_id and VS_BENF = SUPP_ID and  VS_ST = 2;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}


	public function getvtsId()
	{

		$mysqli = new mysqli("localhost", "root", "", "mysql_db");


		if ($mysqli->connect_error) {
			die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}

		$query = "SELECT VS_ID FROM v_s ORDER BY VS_ID DESC LIMIT 1";

		if ($result = $mysqli->query($query)) {

			$row_cnt = $result->num_rows;

			$row = mysqli_fetch_assoc($result);


			if ($row_cnt == null) {
				echo "0";
			} else {
				echo $row['VS_ID'] + 1;
			}
			$result->free();

			$mysqli->close();
		}
	}







	private function selectUpdatedRow($id, $VS_ID)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->movementdetailsTable . " 
			WHERE TS_SER = '" . $id . "' AND TS_V_ID = '" . $VS_ID . "'";
		return $this->getNumRows($sqlQuery);
	}


	private function selectUpdatedRowcust($id, $VS_ID)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->movementdetailsTablecust . " 
			WHERE TC_SER = '" . $id . "' AND TC_V_ID = '" . $VS_ID . "'";
		return $this->getNumRows($sqlQuery);
	}



	public function updateSuppvts($POST)
	{
		if ($POST['VS_ID']) {
			$sqlUpdate = "
				UPDATE " . $this->movementheadTable . " 
				SET VS_TYP_ID = '" . $POST['VS_TYP_ID'] . "',
					VS_TYP_NO = '" . $POST['VS_TYP_NO'] . "',
					VS_DAT = '" . $POST['VS_DAT'] . "',
				 	VOU_USE_ID = '" . $POST['VOU_USE_ID'] . "', 
					VS_BENF = '" . $POST['VS_BENF'] . "', VS_NT = '" . $POST['VS_NT'] . "', 
					VS_ST = '" . $POST['VS_ST'] . "',
					TSTOTDYCOM = '" . $POST['TSTOTDYCOM'] . "',
					TSITOTRET = '" . $POST['TSITOTRET'] . "',
					TSTOTAMOU = '" . $POST['TSTOTAMOU'] . "',
					TSTOTSALE = '" . $POST['TSTOTSALE'] . "',
					TSMUS = '" . $POST['TSMUS'] . "',
					TSHISREMD = '" . $POST['TSHISREMD'] . "',
					TSONREMD = '" . $POST['TSONREMD'] . "'
					WHERE VS_ID = '" . $POST['VS_ID'] . "'";
			mysqli_query($this->dbConnect, $sqlUpdate);
		}

		$sqlDelete = "DELETE FROM " . $this->movementdetailsTable . " WHERE TS_V_ID = '" . $POST['VS_ID'] . "'";
		mysqli_query($this->dbConnect, $sqlDelete);
		foreach ($POST['TS_SER'] as $k => $v) {
			if ($this->selectUpdatedRow($v, $POST['VS_ID'])) {
				$sqlUpdateTrans = " UPDATE " . $this->movementdetailsTable . "
					SET TS_SER = '" . $POST['TS_SER'][$k] . "',
					TS_DY = '" . $POST['TS_DY'][$k] . "', 
					TSDAT = '" . $POST['TSDAT'][$k] . "',
					VS_CUSTID = '" . $POST['VS_CUSTID'][$k] . "',
					TS_NUM = '" . $POST['TS_NUM'][$k] . "',
					TS_PRC = '" . $POST['TS_PRC'][$k] . "',
					 TS_TOT = '" . $POST['TS_TOT'][$k] . "',
					TS_DISC = '" . $POST['TS_DISC'][$k] . "',
					 TSTOTDISC = '" . $POST['TSTOTDISC'][$k] . "',					
					TSNT = '" . $POST['TSNT'][$k] . "',
					TSTOTSALE = '" . $POST['TSTOTSALE'] . "',
					TSMUS = '" . $POST['TSMUS'] . "',
					TSMUST = '" . $POST['TSMUST'] . "'
					WHERE TS_SER = '" . $v . "' AND TS_V_ID = '" . $POST['VS_ID'] . "'";
				mysqli_query($this->dbConnect, $sqlUpdateTrans);
			} else {
				$sqlInsertItem = "
					INSERT INTO " . $this->movementdetailsTable . "(TS_V_ID, TS_SER , TS_DY, TSDAT, VS_CUSTID, TS_NUM, TS_PRC, TS_TOT, TS_DISC, TSTOTDISC,TSNT,TSTOTSALE,TSMUS,TSMUST)
					VALUES ('" . $POST['VS_ID'] . "', '" . $POST['TS_SER'][$k] . "', '" . $POST['TS_DY'][$k] . "','" . $POST['TSDAT'][$k] . "','" . $POST['VS_CUSTID'][$k] . "', '" . $POST['TS_NUM'][$k] . "', '" . $POST['TS_PRC'][$k] . "', '" . $POST['TS_TOT'][$k] . "', '" . $POST['TS_DISC'][$k] . "', '" . $POST['TSTOTDISC'][$k] . "','" . $POST['TSNT'][$k] . "','" . $POST['TSTOTSALE'] . "','" . $POST['TSMUS'] . "','" . $POST['TSMUST'][$k] . "')";
				mysqli_query($this->dbConnect, $sqlInsertItem);
			}
		}
		$sqlUpdateone = "
				UPDATE " . $this->amountdlivdTable . " 
				SET AMNTS_DAT = '" . $POST['VS_DAT'] . "',
				VOU_USE_ID = '" . $POST['VOU_USE_ID'] . "',
				AMTS_BENF = '" . $POST['VS_BENF'] . "',
				TSTOTSALE = '" . $POST['TSTOTSALE'] . "', 
				TSMUS = '" . $POST['TSMUS'] . "',
				TSHISREMD = '" . $POST['TSHISREMD'] . "', 
				TSONREMD = '" . $POST['TSONREMD'] . "'
				WHERE AMNTS_V_ID = '" . $POST['VS_ID'] . "'";
		mysqli_query($this->dbConnect, $sqlUpdateone);


		foreach ($POST['TS_SER'] as $k => $v) {
			if ($this->selectUpdatedRowcust($v, $POST['VS_ID'])) {
				$sqlUpdateTranscust = " UPDATE " . $this->movementdetailsTablecust . "
					SET TC_SER = '" . $POST['TS_SER'][$k] . "',
					TC_DY = '" . $POST['TS_DY'][$k] . "', 
					VC_CUSTID = '" . $POST['VS_CUSTID'][$k] . "', 
					TCNUM = '" . $POST['TS_NUM'][$k] . "',
					TC_PRC = '" . $POST['TS_PRC'][$k] . "',
					TC_TOT = '" . $POST['TS_TOT'][$k] . "',				
					 TCNT = '" . $POST['TSNT'][$k] . "',
					 TC_DAT	 = '" . $POST['TSDAT'][$k] . "'
					WHERE TC_SER = '" . $v . "' AND TC_V_ID = '" . $POST['VS_ID'] . "'";
				mysqli_query($this->dbConnect, $sqlUpdateTranscust);
			} else {
				$sqlInsertItemcustedt = "
					INSERT INTO " . $this->movementdetailsTablecust . "(TC_V_ID, TC_SER , TC_DY,VC_CUSTID, TCNUM, TC_PRC, TC_TOT, TCCOMIS, TCCOMISM, TCTOTDISC, TCTOTDISCM,TCPST,TCNT,TC_DAT)
					VALUES ('" . $POST['VS_ID'] . "', '" . $POST['TS_SER'][$k] . "', '" . $POST['TS_DY'][$k] . "', '" . $POST['VS_CUSTID'][$k] . "', '" . $POST['TS_NUM'][$k] . "', '" . $POST['TS_PRC'][$k] . "', '" . $POST['TS_TOT'][$k] . "', ' 0 ', '0', '" . $POST['TS_TOT'][$k] . "', '" . $POST['TS_TOT'][$k] . "','" . $POST['VS_BENF'] . "','" . $POST['TSNT'][$k] . "','" . $POST['TSDAT'][$k] . "')";
				mysqli_query($this->dbConnect, $sqlInsertItemcustedt);
			}
		}

	}


	public function getInvoice_supp($VS_ID)
	{
		$sqlQuery = "
				SELECT * FROM " . $this->movementheadTable . " WHERE VS_ID = '$VS_ID'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}


	public function getInvoiceItems_supp($VS_ID)
	{
		$sqlQuery = "
				SELECT * FROM " . $this->movementdetailsTable . " 
				WHERE TS_V_ID = '$VS_ID'";
		return  $this->getData($sqlQuery);
	}


	//============Edit dyas
	public function get_days_selected($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM days ORDER BY DY_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["DY_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["DY_ID"] . '" ' . $selected . ' >' . $row["DY_name"] . '</option>';
		}
		return $output;
	}


	//============Edit Supp
	public function getnamesupp($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM supp ORDER BY SUPP_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["SUPP_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["SUPP_ID"] . '" ' . $selected . ' >' . $row["SUPP_NAME"] . '</option>';
		}
		return $output;
	}

	public function get_types_insert($connect)
	{
		$output = '';
		$query = "SELECT * FROM types WHERE TYP_FREEZE ='Y' ORDER BY TYP_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output .= '<option value="' . $row["TYP_ID"] . '">' . $row["TYP_NAME"] . '</option>';
		}
		return $output;
	}


	public function get_types_edit($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM types ORDER BY TYP_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["TYP_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["TYP_ID"] . '" ' . $selected . ' >' . $row["TYP_NAME"] . '</option>';
		}
		return $output;
	}



	public function gettotalsuppall($connect)
	{
		$query = "SELECT SUM(TSTOTSALE) from v_s,userss,supp Where VOU_USE_ID = Analytic_Acc_id and VS_BENF = SUPP_ID and  VS_ST = 0;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}




	public function getAMNT_DLIVDSID()
	{

		$mysqli = new mysqli("localhost", "root", "", "mysql_db");


		if ($mysqli->connect_error) {
			die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}

		$query = "SELECT AMNTS_ID FROM amnt_dlivd ORDER BY AMNTS_ID DESC LIMIT 1";

		if ($result = $mysqli->query($query)) {

			$row_cnt = $result->num_rows;

			$row = mysqli_fetch_assoc($result);


			if ($row_cnt == null) {
				echo "0";
			} else {
				echo $row['AMNTS_ID'] + 1;
			}
			$result->free();

			$mysqli->close();
		}
	}

	public function get_suppinst($connect)
	{
		$output = '';
		$query = "SELECT * FROM supp WHERE SUPP_FREEZE ='Y' ORDER BY SUPP_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output .= '<option value="' . $row["SUPP_ID"] . '">' . $row["SUPP_NAME"] . '</option>';
		}
		return $output;
	}


	public function get_custsupnst($connect)
	{
		$output = '';
		$query = "SELECT * FROM cust WHERE CUST_FREEZE ='Y' ORDER BY CUST_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$output .= '<option value="' . $row["CUST_ID"] . '">' . $row["CUST_NAME"] . '</option>';
		}
		return $output;
	}


	public function get_suppc_selected_edit($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM cust WHERE CUST_FREEZE ='Y' ORDER BY CUST_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["CUST_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["CUST_ID"] . '" ' . $selected . ' >' . $row["CUST_NAME"] . '</option>';
		}
		return $output;
	}
}
?>

<?php
if (isset($_POST['totsup'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSTOTSALE),0) As TSTOTSALE  FROM `amnt_dlivd` WHERE `AMTS_BENF` = " . $_POST['totsup']);
	$stmt->execute();
	$TSTOTSALE = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSTOTSALE);
}


if (isset($_POST['AMNTS_V_ID'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT DISTINCT(VS_ID) As AMNTS_V_ID FROM `v_s`,`amnt_dlivd` WHERE VS_BENF = " . $_POST['AMNTS_V_ID']);
	$stmt->execute();
	$AMNTS_V_ID = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($AMNTS_V_ID);
}





if (isset($_POST['remind'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(DLIVAMNT) + SUM(TSMUS),0) As TSMUS  FROM `amnt_dlivd` WHERE `AMTS_BENF` = " . $_POST['remind']);
	$stmt->execute();
	$TSMUS = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSMUS);
}



if (isset($_POST['hisrm'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSHISREMD),0) - IFNULL(SUM(DLIVAMNT),0) -IFNULL(SUM(TSONREMD),0) AS TSHISREMD FROM `amnt_dlivd` WHERE `AMTS_BENF` = " . $_POST['hisrm']);
	$stmt->execute();
	$TSHISREMD = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSHISREMD);
}


if (isset($_POST['Sonrm'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSONREMD),0) + IFNULL(SUM(DLIVAMNT),0) -IFNULL(SUM(TSHISREMD),0) AS TSONREMD FROM `amnt_dlivd` WHERE `AMTS_BENF` = " . $_POST['Sonrm']);
	$stmt->execute();
	$TSONREMD = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSONREMD);
}

?>

