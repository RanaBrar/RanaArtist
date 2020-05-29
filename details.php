<?php require_once("header.php"); ?>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Select Options to make custum designe.</p>
        </div>
        <div class="row">
            <?php if (isset($_GET['cat_id'])) {
                $cat_id = $_GET['cat_id'];
            ?>
                <div class="col-sm-6">
                    <div class="chose_area">
                        <?php
                        require_once('conn.php');
                        $sqlc = "select * from category where category_id = ?";
                        $resultc = $conn->prepare($sqlc);
                        $resultc->execute(array($_GET['cat_id']));
                        if ($resultc->rowCount() > 0) {
                            while ($rowc = $resultc->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <form action="details.php" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="price" value="
                    <?php echo $rowc['price']; ?>">
                                    <input type="hidden" name="cname" value="
                    <?php echo  $rowc['category_name']; ?>">
                                    <?php $cn =  $rowc['category_name']; ?>
                                    <input type="hidden" name="cat_id" value="
                    <?php echo  $rowc['category_id']; ?>">
                                    <label style="margin-left: 10px;">Color:</label>
                                    <label style="background-color: black;border-radius: 5px;" class="radio-inline  labl btn"><input type="radio" onclick="black()" name="color" value="black">Black</label>
                                    <label style="background-color: red;border-radius: 5px;" class="radio-inline labl btn"><input type="radio" onclick="red()" name="color" value="red">Red</label>
                                    <label style="background-color: blue;border-radius: 5px;" class="radio-inline labl btn"><input type="radio" onclick="blue()" name="color" value="blue">Blue</label>
                                    <label style="background-color: green;border-radius: 5px;" class="radio-inline labl btn"><input type="radio" onclick="green()" name="color" value="green">Green</label>
                                    <label style="background-color: brown;border-radius: 5px;" class="radio-inline labl btn"><input type="radio" onclick="yellow()" name="color" value="yellow">Brown</label>
                                    <label style="background-color: grey;border-radius: 5px;" class="radio-inline labl btn"><input type="radio" onclick="grey()" name="color" value="grey">Grey</label>
                                    <ul class="user_info">
                                        <li class="single_field">
                                            <label>Size:</label>
                                            <select required name="size">
                                                <?php
                                                $size = explode(",", $rowc['size']);
                                                foreach ($size as $s) {
                                                ?>

                                                    <option value="<?php echo $s; ?>">
                                                        <?php echo $s; ?>
                                                    </option>

                                                <?php }
                                                ?>

                                            </select>
                                        </li>

                                        <!-- </li> -->
                                        <li class="single_field zip-field">
                                            <label>Upload Photo:</label>
                                            <input id="imgInp" required type="file" name="userimg">
                                        </li>
                                    </ul>
                                    <button type="submit" name="submit" class="btn btn-default check_out" href="">Continue</button>
                                </form>
                        <?php  }
                        }
                        ?>
                    </div>
                </div>

                <div class="col-sm-6 parent text-center">

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#imgInp').on('change', function() {
                                readPath(this);
                            });
                        });

                        function readPath(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#blah').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>


                    <div class="parent text-center" style="height:500px; width:500px;">
                        <img class=" text-center" id="myDIV" width="500px" src="images/<?php echo  $cn; ?>.png" alt="" srcset="">
                        <img alt="Your image will display here" id="blah" width="180px" height="180px" src="" class="over-img1 text-center" />
                    </div>
                    <script>
                        function black() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("red");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("blue");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("green");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("grey");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("yellow");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("black");
                        }

                        function red() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("black");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("blue");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("green");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("grey");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("yellow");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("red");
                        }

                        function blue() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("black");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("red");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("green");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("grey");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("yellow");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("blue");
                        }

                        function green() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("black");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("blue");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("red");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("grey");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("yellow");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("green");
                        }

                        function yellow() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("black");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("blue");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("green");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("grey");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("red");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("yellow");
                        }

                        function grey() {
                            var element = document.getElementById("myDIV");
                            element.classList.remove("black");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("blue");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("green");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("red");
                            var element = document.getElementById("myDIV");
                            element.classList.remove("yellow");
                            var element = document.getElementById("myDIV");
                            element.classList.toggle("grey");
                        }
                    </script>
                    <!-- <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a> -->

                </div>

            <?php } ?>

        </div>
    </div>
</section>
<!--/#do_action-->
<?php require_once('footer.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $cat_id = $_POST['cat_id'];
    $cname = $_POST['cname'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $img1 = $_FILES['userimg']['name'];
    $type = $_FILES['userimg']['type'];
    $random = rand(0, 999999999);
    $img = $random;
    $temp = $_FILES['userimg']['tmp_name'];
    move_uploaded_file($temp, "images/$img");

    if (isset($_SESSION['userorder'])) {
        $count = count($_SESSION["userorder"]);
        $item_array = array(
            'user_id' => $_SESSION['user_id'],
            'cat_id' => $cat_id,
            'cname' => $cname,
            'qty' => 1,
            'id' => $count,
            'price' => $price,
            'size' => $size,
            'color' => $color,
            'img' => $img,
        );
        $_SESSION["userorder"][$count] = $item_array;
        echo "<script>
        window.location.assign('cart.php');
        </script>";
    } else {
        $item_array = array(
            'user_id' => $_SESSION['user_id'],
            'cat_id' => $cat_id,
            'cname' => $cname,
            'qty' => 1,
            'price' => $price,
            'id' => 0,
            'size' => $size,
            'color' => $color,
            'img' => $img,
        );
        $_SESSION["userorder"][0] = $item_array;
        echo "<script>
        window.location.assign('cart.php');
        </script>";
    }
}
?>