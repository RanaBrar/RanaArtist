<?php
session_start();
include('conn.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {

	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		$sid = (int) $_SESSION["reset"];

		$user_id = (int) $_SESSION['userorder'][$sid]['user_id'];
		$cat_id = (int) $_SESSION['userorder'][$sid]['cat_id'];
		$color = $_SESSION['userorder'][$sid]['color'];
		$size = $_SESSION['userorder'][$sid]['size'];
		$img = $_SESSION['userorder'][$sid]['img'];
		$qty = (int) $_SESSION['userorder'][$sid]['qty'];
		$total_price = (int) $_SESSION['userorder'][$sid]['price'] * $_SESSION['userorder'][$sid]['qty'];
		date_default_timezone_set("Asia/Kolkata");
		$date =  date("h:ia,d-m-Y");
		$sql = "INSERT INTO orders (pay_id,user_id,category_id,total_price,qty,user_color,user_size,user_img,date) VALUE (?,?,?,?,?,?,?,?,?)";
		$result = $conn->prepare($sql);
		if ($result->execute(array($_POST['ORDERID'], $user_id, $cat_id, $_POST['TXNAMOUNT'], $qty, $color, $size, $img, $date))) {
			echo "Order Saved";
		}
		unlink("images/" . $_SESSION['userorder'][$sid]['img']);
		unset($_SESSION["userorder"][$sid]);

		echo "<a href='https://ranaartist.000webhostapp.com/'><button>Home</botton></a>";
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		echo "<a href='https://ranaartist.000webhostapp.com/'><button>Home</botton></a>";
	}


	if (isset($_POST['ORDERID'])) {
		echo 'OrderID = ' . $_POST['ORDERID'] . "<br/>";
		echo 'TXNAMOUNT = ' . $_POST['TXNAMOUNT'] . "<br/>";
	}
} else {
	echo "<b>Checksum mismatched.</b>";
	echo "<a href='https://ranaartist.000webhostapp.com/'><button>Home</botton></a>";
	//Process transaction as suspicious.
}
