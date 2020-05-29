<?php require_once("header.php"); ?>
<section id="cart_items">
    <div class="container">
        <?php if (!empty($_SESSION["userorder"])) { ?>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <theadead>
                        <tr class="cart_menu">
                            <th class="price">Preview</th class="price">
                            <th class="price">Category</th class="price">
                            <th class="price">Size</th class="price">
                            <th class="price">Color</th class="price">
                            <th class="price">Price</th class="price">
                            <th class="price">Quantity</th class="price">
                            <th class="price">Total Price</th class="price">
                            <th class="price">Update</th class="price">
                            <th class="price">Buy Now</th class="price">
                            <th class="price">Remove</th class="price">
                        </tr>
                    </theadead>
                    <tbody>
                        <?php

                        $srno = 0;
                        $total = 0;
                        foreach ($_SESSION["userorder"] as $keys => $values) {
                            $srno++;
                        ?>
                            <tr>
                                <form action="action.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $values['id']; ?>">
                                    <td class="cart_price"><button class="btn btn-success " data-toggle="modal" data-target="#<?php echo $values['id']; ?>">Preview</button>

                                        <div class="modal fade" id="<?php echo $values['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="parent text-center" style="height:500px; width:500px;">
                                                            <?php $photo = "images/" . $values['cname'] . ".png"; ?>
                                                            <img class="<?php echo  $values['color']; ?>" src="<?php echo  str_replace(" ", "", $photo); ?>" width="500" height="500">
                                                            <img src="images/<?php echo $values['img']; ?>" width="180px" height="180px" class='over-img text-center'>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td class="cart_price"><?php echo $values['cname']; ?></td>
                                    <td class="cart_price"><?php echo $values['size']; ?></td>
                                    <td class="cart_price"><?php echo $values['color']; ?></td>
                                    <td class="cart_price"><?php echo $values['price']; ?></td>
                                    <td class="cart_price"><input type="text" name="qty" value="<?php echo $values['qty']; ?>">
                                    </td>
                                    <td class="cart_price"><?php echo  $values['qty'] * $values['price']; ?>
                                    </td>
                                    <td class=""><button class="btn btn-info" type="submit" name="update" value="update">Update</button></td>
                                    <td class=""><a class="btn btn-success" href="order.php?sid=<?php echo $values['id']; ?>">Save</a></td>
                                    <td class=""><a class="btn btn-danger" href="action.php?remove=<?php echo $values['id']; ?>">Remove</a></td>

                                </form>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <?php if (!empty($_SESSION["cardorder"])) { ?>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <theadead>
                        <tr class="cart_menu">
                            <th class="price">Preview</th class="price">
                            <th class="price">Category</th class="price">
                            <th class="price">Title</th class="price">
                            <th class="price">Phone no.</th class="price">
                            <th class="price">Email</th class="price">
                            <th class="price">Address</th class="price">
                            <th class="price">Price</th class="price">
                            <th class="price">Quantity</th class="price">
                            <th class="price">Total Price</th class="price">
                            <th class="price">Update</th class="price">
                            <th class="price">Buy Now</th class="price">
                            <th class="price">Remove</th class="price">
                        </tr>
                    </theadead>
                    <tbody>
                        <?php

                        $srno = 0;
                        $total = 0;
                        foreach ($_SESSION["cardorder"] as $keys => $values) {
                            $srno++;
                        ?>
                            <tr>
                                <form action="action.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $values['id']; ?>">
                                    <td class="cart_price"><button class="btn btn-success " data-toggle="modal" data-target="#<?php echo $values['id']; ?>1">Preview</button>

                                        <div class="modal fade" id="<?php echo $values['id']; ?>1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <img class="parent text-center" style="width: 100%;" src="images/Card.png" alt="" srcset="">
                                                        <img id="blah" width="100px" height="100px" src="images/<?php echo $values['img']; ?>" class="over-img2 text-center" />
                                                        <div class="card_title">

                                                            <h3 id="cTitle"><?php echo $values['card_title']; ?></h3>
                                                        </div>
                                                        <div class="ph1">

                                                            <h4 id="cPh" class="fa fa-phone"><i style="margin-left: 10px;"><?php echo $values['card_ph']; ?></h4>
                                                        </div>
                                                        <div class="email">

                                                            <h5 id="cEmail" class="fa fa-envelope"><i style="margin-left: 10px;"><?php echo $values['card_email']; ?></h5>
                                                        </div>
                                                        <div style="width: 170px;" class="email1">

                                                            <h5 class="fa fa-map-marker" style="word-wrap: break-word;" id="cAddress"><i style="margin-left: 10px;"><?php echo $values['card_address']; ?> </h5>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td class="cart_price"><?php echo $values['cname']; ?></td>
                                    <td class="cart_price"><?php echo $values['card_title']; ?></td>
                                    <td class="cart_price"><?php echo $values['card_ph']; ?></td>
                                    <td class="cart_price"><?php echo $values['card_email']; ?></td>
                                    <td class="cart_price"><?php echo $values['card_address']; ?></td>
                                    <td class="cart_price"><?php echo $values['price']; ?></td>
                                    <td class="cart_price"><input type="text" name="qty" value="<?php echo $values['qty']; ?>">
                                    </td>
                                    <td class="cart_price"><?php echo  $values['qty'] * $values['price']; ?>
                                    </td>
                                    <td class=""><button class="btn btn-info" type="submit" name="updatecard" value="updatecard">Update</button></td>
                                    <td class=""><a class="btn btn-success" href="order.php?sid=<?php echo $values['id']; ?>">Save</a></td>
                                    <td class=""><a class="btn btn-danger" href="action.php?removecard=<?php echo $values['id']; ?>">Remove</a></td>

                                </form>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        <!-- Modal -->


    </div>
</section>
<?php require_once('footer.php'); ?>