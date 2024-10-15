<?php


$connect = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
class VTCModel
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = "";
	private $database  = "mysql_db";
	private $movementheadTable = 'v_s';
	private $movementdetailsTable = 'tn_c';
	private $amountdlivdTablecust = 'amnt_dlivd_cust';
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

	public function SavedatainVTC($POST)
	{
		$sqlInsert = "
		INSERT INTO " . $this->movementheadTable . "(VS_TYP_ID,VS_TYP_NO,VS_DAT,VOU_USE_ID, TCTOTDY, TCITOTRET, TCTOTAMOU, TCTOTSALE, TCMITOTRET, TCMTOTAMOU, TCTOTSALEF, TCMUS, TCHISREMD, TCONREMD, VS_NT, VS_ST) 
		VALUES ('" . $POST['VS_TYP_ID'] . "' , '" . $POST['VS_TYP_NO'] . "','" . $POST['VS_DAT'] . "','" . $POST['VOU_USE_ID'] . "', '" . $POST['TCTOTDY'] . "', '" . $POST['TCITOTRET'] . "', '" . $POST['TCTOTAMOU'] . "', '" . $POST['TCTOTSALE'] . "', '" . $POST['TCMITOTRET'] . "', '" . $POST['TCMTOTAMOU'] . "', '" . $POST['TCTOTSALEF'] . "', '" . $POST['TCMUS'] . "', '" . $POST['TCHISREMD'] . "', '" . $POST['TCONREMD'] . "','" . $POST['VS_NT'] . "', '" . $POST['VS_ST'] . "')";

		// print_r ($sqlInsert);
		// echo '<br />';
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId  = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['TC_SER']); $i++) {
			$sqlInsertItem = "
			INSERT INTO " . $this->movementdetailsTable . "(TC_V_ID, TC_SER , TC_DY, VC_CUSTID, TCNUM, TC_PRC, TC_TOT, TCCOMIS, TCCOMISM, TCTOTDISC, TCTOTDISCM, TCPST,TCNT,TC_DAT,TCMUST) 
			VALUES ('" . $lastInsertId . "', '" . $POST['TC_SER'][$i] . "', '" . $POST['TC_DY'][$i] . "','" . $POST['VC_CUSTID'][$i] . "', '" . $POST['TCNUM'][$i] . "', '" . $POST['TC_PRC'][$i] . "', '" . $POST['TC_TOT'][$i] . "','" . $POST['TCCOMIS'][$i] . "','" . $POST['TCCOMISM'][$i] . "', '" . $POST['TCTOTDISC'][$i] . "','" . $POST['TCTOTDISCM'][$i] . "', '" . $POST['TCPST'][$i] . "','" . $POST['TCNT'][$i] . "','" . $POST['TC_DAT'][$i] . "','" . $POST['TCMUST'][$i] . "')";

			// print_r ($sqlInsertItem);
			// echo '<br />';
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}

	// get all vt = Zero
	public function getVTCList($connect)
	{
		$query = "SELECT `VS_ID`, `TYP_NAME`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `TCTOTDY`, `TCITOTRET`, `TCTOTAMOU`, `TCTOTSALE`, `TCMUS`, `TCHISREMD`, `TCONREMD`,`VS_NT`, `VS_ST`,SYS_User_name from v_s,userss,types Where VOU_USE_ID = Analytic_Acc_id and VS_TYP_ID = TYP_ID  and VS_ST = 0;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}

	// get all vt = One
	public function getVTCListone($connect)
	{
		$query = "SELECT `VS_ID`, `TYP_NAME`,`VS_TYP_ID`,`VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `TCTOTDY`, `TCITOTRET`, `TCTOTAMOU`, `TCTOTSALE`, `TCMUS`, `TCHISREMD`, `TCONREMD`,`VS_NT`, `VS_ST`,SYS_User_name from v_s,userss,types Where VOU_USE_ID = Analytic_Acc_id and VS_TYP_ID = TYP_ID  and VS_ST = 1;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}


	// get all vt = Two
	public function getVTCListtwo($connect)
	{
		$query = "SELECT `VS_ID`, `TYP_NAME`, `VS_TYP_ID`,`VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `TCTOTDY`, `TCITOTRET`, `TCTOTAMOU`, `TCTOTSALE`, `TCMUS`, `TCHISREMD`, `TCONREMD`,`VS_NT`, `VS_ST`,SYS_User_name from v_s,userss,types Where VOU_USE_ID = Analytic_Acc_id and VS_TYP_ID = TYP_ID  and VS_ST = 2;";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		return $result;
	}


	// Initial invoice number
	public function getvoucherId()
	{
		// Connect to the database
		$mysqli = new mysqli("localhost", "root", "", "mysql_db");

		// output any connection error
		if ($mysqli->connect_error) {
			die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}

		$query = "SELECT VS_ID FROM v_s ORDER BY VS_ID DESC LIMIT 1";

		if ($result = $mysqli->query($query)) {

			$row_cnt = $result->num_rows;

			$row = mysqli_fetch_assoc($result);

			//var_dump($row);

			if ($row_cnt == null) {
				echo "0";
			} else {
				echo $row['VS_ID'] + 1;
			}

			// Frees the memory associated with a result
			$result->free();

			// close connection 
			$mysqli->close();
		}
	}


	public function get_supcust($connect)
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


	public function get_typecusinst($connect)
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


	public function get_custinst($connect)
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




	//code Edit
	private function selectUpdatedRow($id, $VS_ID)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->movementdetailsTable . " 
			WHERE TC_SER = '" . $id . "' AND TC_V_ID = '" . $VS_ID . "'";
		return $this->getNumRows($sqlQuery);
	}


	public function updatecustomvtc($POST)
	{
		if ($POST['VS_ID']) {
			$sqlUpdate = "
				UPDATE " . $this->movementheadTable . " 
				SET VS_TYP_ID = '" . $POST['VS_TYP_ID'] . "',
					VS_TYP_NO = '" . $POST['VS_TYP_NO'] . "',
					VS_DAT = '" . $POST['VS_DAT'] . "',
					VOU_USE_ID = '" . $POST['VOU_USE_ID'] . "',
					TCTOTDY = '" . $POST['TCTOTDY'] . "', 
					TCITOTRET = '" . $POST['TCITOTRET'] . "',
					TCTOTAMOU = '" . $POST['TCTOTAMOU'] . "',
					TCTOTSALE = '" . $POST['TCTOTSALE'] . "',
					TCMITOTRET = '" . $POST['TCMITOTRET'] . "',
					TCMTOTAMOU = '" . $POST['TCMTOTAMOU'] . "',
					TCTOTSALEF = '" . $POST['TCTOTSALEF'] . "',
					TCMUS = '" . $POST['TCMUS'] . "',
					TCHISREMD = '" . $POST['TCHISREMD'] . "',
					TCONREMD = '" . $POST['TCONREMD'] . "',
					VS_NT = '" . $POST['VS_NT'] . "',
					VS_ST = '" . $POST['VS_ST'] . "'
					WHERE VS_ID = '" . $POST['VS_ID'] . "'";
			mysqli_query($this->dbConnect, $sqlUpdate);
		}



		$sqlDelete = "DELETE FROM " . $this->movementdetailsTable . " WHERE TC_V_ID = '" . $POST['VS_ID'] . "'";
		mysqli_query($this->dbConnect, $sqlDelete);
		foreach ($POST['TC_SER'] as $k => $v) {
			if ($this->selectUpdatedRow($v, $POST['VS_ID'])) {
				$sqlUpdateTrans = " UPDATE " . $this->movementdetailsTable . "
					SET TC_SER = '" . $POST['TC_SER'][$k] . "',
					TC_DY = '" . $POST['TC_DY'][$k] . "', 
					VC_CUSTID = '" . $POST['VC_CUSTID'][$k] . "', 
					TCNUM = '" . $POST['TCNUM'][$k] . "',
					TC_PRC = '" . $POST['TC_PRC'][$k] . "',
					 TC_TOT = '" . $POST['TC_TOT'][$k] . "',
					 TCCOMIS = '" . $POST['TCCOMIS'][$k] . "',	
					 TCCOMISM = '" . $POST['TCCOMISM'][$k] . "',							
					 TCTOTDISC = '" . $POST['TCTOTDISC'][$k] . "',
					 TCTOTDISCM = '" . $POST['TCTOTDISCM'][$k] . "',
					 TCPST = '" . $POST['TCPST'][$k] . "',
					 TCNT = '" . $POST['TCNT'][$k] . "',
					 TC_DAT	 = '" . $POST['TC_DAT'][$k] . "',
					 TCMUST	 = '" . $POST['TCMUST'][$k] . "'
					WHERE TC_SER = '" . $v . "' AND TC_V_ID = '" . $POST['VS_ID'] . "'";
				mysqli_query($this->dbConnect, $sqlUpdateTrans);
			} else {
				$sqlInsertItem = "
					INSERT INTO " . $this->movementdetailsTable . "(TC_V_ID, TC_SER , TC_DY,VC_CUSTID, TCNUM, TC_PRC, TC_TOT, TCCOMIS, TCCOMISM, TCTOTDISC, TCTOTDISCM,TCPST,TCNT,TC_DAT,TCMUST)
					VALUES ('" . $POST['VS_ID'] . "', '" . $POST['TC_SER'][$k] . "', '" . $POST['TC_DY'][$k] . "', '" . $POST['VC_CUSTID'][$k] . "', '" . $POST['TCNUM'][$k] . "', '" . $POST['TC_PRC'][$k] . "', '" . $POST['TC_TOT'][$k] . "', '" . $POST['TCCOMIS'][$k] . "', '" . $POST['TCCOMISM'][$k] . "', '" . $POST['TCTOTDISC'][$k] . "', '" . $POST['TCTOTDISCM'][$k] . "','" . $POST['TCPST'][$k] . "','" . $POST['TCNT'][$k] . "','" . $POST['TC_DAT'][$k] . "','" . $POST['TCMUST'][$k] . "')";
				mysqli_query($this->dbConnect, $sqlInsertItem);
			}


		// 	$sqlUpdateTranstwo = " UPDATE " . $this->amountdlivdTablecust . "
		// 	SET 
		// 	AMNTS_DAT_cust = '" . $POST['TC_DAT'][$k] . "', 
		// 	VOU_USE_ID = '" . $POST['VOU_USE_ID'][$k] . "', 
		// 	VC_CUSTID_cust = '" . $POST['VC_CUSTID'][$k] . "',
		// 	TSTOTSALE_cust = '" . $POST['TCTOTDISCM'][$k] . "',
		// 	TSMUS_cust = '" . $POST['TC_TOT'][$k] . "',
		// 	TSHISREMD_cust = '" . $POST['TCCOMIS'][$k] . "',	
		// 	TSONREMD_cust = '" . $POST['TCCOMISM'][$k] . "',							
		// 	DLIVAMNT_cust = '" . $POST['TCTOTDISC'][$k] . "',	
		// 	WHERE  VS_ID = '" . $POST['AMNTS_V_ID_cust'] . "'";
		// mysqli_query($this->dbConnect, $sqlUpdateTranstwo);
		}
	}


	public function getInvoice_cust($VS_ID)
	{
		$sqlQuery = "
				SELECT * FROM " . $this->movementheadTable . " WHERE VS_ID = '$VS_ID'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}


	public function getInvoiceItems_cust($VS_ID)
	{
		$sqlQuery = "
				SELECT * FROM " . $this->movementdetailsTable . " 
				WHERE TC_V_ID = '$VS_ID'";
		return  $this->getData($sqlQuery);
	}


	public function get_types_cust_edit($connect, $selectedId)
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


	public function get_cust_edit($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM cust ORDER BY CUST_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["CUST_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["CUST_ID"] . '" ' . $selected . ' >' . $row["CUST_NAME"] . '</option>';
		}
		return $output;
	}


	//============Edit dyas
	public function get_dayscust_selected($connect, $selectedId)
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




	public function get_suppc_selected($connect, $selectedId)
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


	public function get_idcust_selected($connect, $selectedId)
	{
		$output = '';
		$query = "SELECT * FROM cust ORDER BY CUST_ID ASC";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach ($result as $row) {
			$selected = $selectedId == $row["CUST_ID"] ? 'selected' : '';
			$output .= '<option value="' . $row["CUST_ID"] . '" ' . $selected . ' >' . $row["CUST_NAME"] . '</option>';
		}
		return $output;
	}



	public function getAMNT_DLIVDCID()
	{

		$mysqli = new mysqli("localhost", "root", "", "mysql_db");


		if ($mysqli->connect_error) {
			die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}

		$query = "SELECT AMNTS_ID_cust FROM amnt_dlivd_cust ORDER BY AMNTS_ID_cust DESC LIMIT 1";

		if ($result = $mysqli->query($query)) {

			$row_cnt = $result->num_rows;

			$row = mysqli_fetch_assoc($result);


			if ($row_cnt == null) {
				echo "0";
			} else {
				echo $row['AMNTS_ID_cust'] + 1;
			}
			$result->free();

			$mysqli->close();
		}
	}
}




?>

<?php
// if (isset($_POST['totcust'])) {
// 	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
// 	$stmt = $conn->prepare("SELECT IFNULL(SUM(TCTOTSALE),0) As TCTOTSALE  FROM `v_s` WHERE `VC_CUSTID` = " . $_POST['totcust']);
// 	$stmt->execute();
// 	$TCTOTSALE = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	echo json_encode($TCTOTSALE);
// }



// if (isset($_POST['remindcust'])) {
// 	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
// 	$stmt = $conn->prepare("SELECT IFNULL(SUM(TCMUS),0) As TCMUS  FROM `v_s` WHERE `VC_CUSTID` = " . $_POST['remindcust']);
// 	$stmt->execute();
// 	$TCMUS = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	echo json_encode($TCMUS);
// }



// if (isset($_POST['hisrmc'])) {
// 	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
// 	$stmt = $conn->prepare("SELECT IFNULL(SUM(TCHISREMD - TCONREMD),0) As TCHISREMD  FROM `v_s` WHERE `VC_CUSTID` = " . $_POST['hisrmc']);
// 	$stmt->execute();
// 	$TCHISREMD = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	echo json_encode($TCHISREMD);
// }


// if (isset($_POST['Sonrmc'])) {
// 	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
// 	$stmt = $conn->prepare("SELECT IFNULL(SUM(TCONREMD - TCHISREMD),0)  As TCONREMD  FROM `v_s` WHERE `VC_CUSTID` = " . $_POST['Sonrmc']);
// 	$stmt->execute();
// 	$TCONREMD = $stmt->fetchAll(PDO::FETCH_ASSOC);
// 	echo json_encode($TCONREMD);
// }


if (isset($_POST['totcust'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSTOTSALE_cust),0) As TSTOTSALE_cust  FROM `amnt_dlivd_cust` WHERE `VC_CUSTID_cust` = " . $_POST['totcust']);
	$stmt->execute();
	$TSTOTSALE_cust = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSTOTSALE_cust);
}

if (isset($_POST['AMNTS_V_ID_cust'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT DISTINCT(TC_V_ID) As AMNTS_V_ID_cust FROM `tn_c` WHERE VC_CUSTID = " . $_POST['AMNTS_V_ID_cust']);
	$stmt->execute();
	$AMNTS_V_ID_cust = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($AMNTS_V_ID_cust);
}



if (isset($_POST['remind'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(DLIVAMNT_cust) + SUM(TSMUS_cust),0) As TSMUS_cust  FROM `amnt_dlivd_cust` WHERE `VC_CUSTID_cust` = " . $_POST['remind']);
	$stmt->execute();
	$TSMUS_cust = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSMUS_cust);
}

if (isset($_POST['hisrm'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSHISREMD_cust),0) - IFNULL(SUM(DLIVAMNT_cust),0) -IFNULL(SUM(TSONREMD_cust),0) AS TSHISREMD_cust FROM `amnt_dlivd_cust` WHERE `VC_CUSTID_cust` = " . $_POST['hisrm']);
	$stmt->execute();
	$TSHISREMD_cust = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSHISREMD_cust);
}




if (isset($_POST['Sonrm'])) {
	$conn = new PDO("mysql:host=localhost;dbname=mysql_db", "root", "");
	$stmt = $conn->prepare("SELECT IFNULL(SUM(TSONREMD_cust),0) + IFNULL(SUM(DLIVAMNT_cust),0) -IFNULL(SUM(TSHISREMD_cust),0) AS TSONREMD_cust FROM `amnt_dlivd_cust` WHERE `VC_CUSTID_cust` = " . $_POST['Sonrm']);
	$stmt->execute();
	$TSONREMD_cust = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($TSONREMD_cust);
}


?>

