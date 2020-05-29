<?php require_once("header.php"); ?>

<section id="cart_items">
    <div class="container">

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">

                        <td align="center" class="price">User Name</td>
                        <td align="center" class="quantity">Category</td>
                        <td align="center" class="total">Color</td>
                        <td align="center" class="price">Size</td>
                        <td align="center" class="price">Price</td>
                        <td align="center" class="quantity">Quantity</td>
                        <td align="center" class="total">Date</td>
                        <td align="center" class="total">Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('conn.php');
                    $uid = $_SESSION['user_id'];
                    $sql = "select * from orders left join category on category.category_id = orders.category_id left join user on user.user_id = orders.user_id where orders.user_id = ?";
                    $result = $conn->prepare($sql);
                    $result->execute(array($uid));
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <tr>

                                <td align="center"> <?php echo $row['username']; ?>
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
                                    <?php echo $row["total_price"]; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['qty']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['date']; ?>
                                </td>
                                <td align="center">
                                    <?php echo $row['status']; ?>
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

<?php require_once("footer.php"); ?>