<?php include("header.php"); ?>

<section id="cart_items">
    <div class="container">

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td align="center" class="price">Order ID</td>
                        <td align="center" class="description">Pay ID</td>
                        <td align="center" class="price">User ID</td>
                        <td align="center" class="quantity">Category</td>
                        <td align="center" class="total">Color</td>
                        <td align="center" class="price">Size</td>
                        <td align="center" class="description">Image</td>
                        <td align="center" class="price">Price</td>
                        <td align="center" class="quantity">Quantity</td>
                        <td align="center" class="total">Date</td>
                        <td align="center" class="total">Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('conn.php');
                    $sql = "select * from orders left join category on category.category_id = orders.category_id";
                    $result = $conn->prepare($sql);
                    $result->execute();
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>
                                <td align="center">
                                    <?php echo $row['order_id']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['pay_id']; ?>
                                </td>
                                <td align="center"> <?php echo $row['user_id']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['category_name']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['user_color']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['user_size']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['user_img']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row["total_price"]; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['qty']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['date']; ?>
                                </td>
                                <td align="center">
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                        <select onchange="this.form.submit();" required name="status">
                                            <option <?php if ($row['status'] == "Pending") {
                                                        echo "selected";
                                                    } ?> value="Pending">
                                                Pending
                                            </option>
                                            <option <?php if ($row['status'] == "Working") {
                                                        echo "selected";
                                                    } ?> value="Working">
                                                Working
                                            </option>
                                            <option <?php if ($row['status'] == "Ready") {
                                                        echo "selected";
                                                    } ?> value="Ready">
                                                Ready
                                            </option>
                                        </select>
                                    </form>
                                </td>
                            </tr>

                    <?php  }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->


<?php include("footer.php"); ?>
<?php
if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $oid = $_POST['order_id'];
    require_once("conn.php");
    $sqls = "update orders set status = ? where order_id = ?";
    $results = $conn->prepare($sqls);
    $results->execute(array($status, $oid));
    echo "<script>
    window.location.assign('index.php');
    </script>";
}

?>