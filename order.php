<?php include('header.php'); ?>
<?php
if (isset($_GET['sid'])) {

    $sid = $_GET['sid'];
    $_SESSION['reset'] = $sid;
    $user_id = $_SESSION['userorder'][$sid]['user_id'];
    $cat_id = $_SESSION['userorder'][$sid]['cat_id'];
    $color = $_SESSION['userorder'][$sid]['color'];
    $size = $_SESSION['userorder'][$sid]['size'];
    $img = $_SESSION['userorder'][$sid]['img'];
    $qty = $_SESSION['userorder'][$sid]['qty'];
    $total_price = $_SESSION['userorder'][$sid]['price'] * $_SESSION['userorder'][$sid]['qty'];

?>
    <div class="container">
        <form method="post" action="Paytm/PaytmKit/pgRedirect.php">
            <table class="timetable_sub" border="1">
                <tbody>
                    <thead>
                        <th>S.No</th>
                        <th>Label</th>
                        <th>Value</th>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td><label>ORDER_ID::*</label></td>
                        <td><input class="form-control" readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><label>CUSTID ::*</label></td>
                        <td><input class="form-control" readonly id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><label>INDUSTRY_TYPE_ID ::*</label></td>
                        <td><input class="form-control" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><label>Channel ::*</label></td>
                        <td><input class="form-control" readonly id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><label>txnAmount*</label></td>
                        <td><input class="form-control" readonly title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $total_price; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input class="btn btn-success" value="CheckOut" type="submit" onclick=""></td>
                    </tr>
                </tbody>
            </table>
            * - Mandatory Fields
        </form>
    </div>
<?php
}

?>
<?php include('footer.php'); ?>