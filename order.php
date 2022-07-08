<?php
session_start();

include("mysql/connect.php");

//Check nếu chưa có user_mail (chưa đăng nhập) sẽ trả về trang login.php
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == false) {
    header("location: login.php");
    exit();
} 

//GET CURRENT VALUES FROM DATABASE (User_name, Address, Phone)
$conn_gcv = mysqli_connect("localhost", "tanluc1", "tanluc1", "ludu");
$gcv_mail = $_SESSION['user_mail'];
$gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
$gcv_query = mysqli_query($conn_gcv, $gcv_sql);
if ($row = mysqli_fetch_assoc($gcv_query)) { 
    $current_address = $row['address'];
    $current_phone = $row['phone'];
	$current_username = $row['user_name'];
}

?>


<!doctype html>
<html lang="tr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/jpg" href="images/logo1.png"/>

    <style>

        @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

        body {
            background: url('https://scontent.fesb3-2.fna.fbcdn.net/v/t1.6435-9/37904225_688725644825738_6160377175833837568_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=e3f864&_nc_ohc=mmYcEQ-g-N4AX9lbi4P&_nc_ht=scontent.fesb3-2.fna&oh=00_AT9iEiiSnIY863LcnCZ-Mg5islvP-jmzDMbr1QG03OxayQ&oe=620128D6');
            font-family: 'Roboto Condensed', sans-serif;
            color: #262626;

        }

        .container {
            min-height: 500px;
            padding-bottom: 15px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        .d-flex {
            display: flex;
            flex-direction: row;
            background: #f6f6f6;
            border-radius: 0 0 5px 5px;
            padding: 25px;

        }

        form {
            flex: 4;
        }


        .title {
            background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #FE0944), color-stop(100, #E96196));
            background: -moz-linear-gradient(top left, #FE0944 0%, #E96196 100%);
            background: -ms-linear-gradient(top left, #FE0944 0%, #E96196 100%);
            background: -o-linear-gradient(top left, #FE0944 0%, #E96196 100%);
            background: linear-gradient(to bottom right, #FE0944 0%, #E96196 100%);
            border-radius: 5px 5px 0 0;
            padding: 20px;
            color: #000000;
        }

        h2 {
            margin: 0;
            padding-left: 15px;
        }

        .required {
            color: red;
        }

        label, table {
            display: block;
            margin: 15px;
        }

        label > span {
            float: left;
            width: 25%;
            margin-top: 12px;
            padding-right: 10px;
        }

        input[type="text"], input[type="tel"], input[type="email"], select {
            width: 70%;
            height: 30px;
            padding: 5px 10px;
            margin-bottom: 10px;
            border: 1px solid #dadada;
            color: black;
        }

        select {
            width: 72%;
            height: 45px;
            padding: 5px 10px;
            margin-bottom: 10px;
        }


        table {
            margin: 0;
            padding: 0;
        }

        th {
            border-bottom: 1px solid #dadada;
            padding: 10px 0;
        }

        tr > td:nth-child(1) {
            text-align: left;
            color: #2d2d2a;
        }

        tr > td:nth-child(2) {
            text-align: right;
            color: #000000;
        }

        td {
            border-bottom: 1px solid #dadada;
            padding: 25px 25px 25px 0;
            font-size: 13px;
        }

        p {
            display: block;
            color: #888;
            margin: 0;
            padding-left: 25px;
        }

        .Yorder > div {
            padding: 15px 0;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 30px;
            background: #000000;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            cursor: pointer;
            background: #DA2C43;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
            font-family: "Open Sans", sans-serif;
        }

        body {
            background: linear-gradient(500deg, #F8D1CD, #F0A8AB);
        }
.title{
    text-align: center;
}

        /*--------------------
        Form
        --------------------*/
        .form fieldset {
            border: none;
            padding: 0;
            padding: 10px 0;
            position: relative;
            clear: both;
        }

        .form fieldset.fieldset-expiration {
            float: left;
            width: 60%;
        }

        .form fieldset.fieldset-expiration .select {
            width: 84px;
            margin-right: 12px;
            float: left;
        }

        .form fieldset.fieldset-ccv {
            clear: none;
            float: right;
            width: 130px;
        }

        .form fieldset label {
            display: block;
            text-transform: uppercase;
            font-size: 11px;
            color: rgba(0, 0, 0, 0.6);
            margin-bottom: 5px;
            font-weight: bold;
            font-family: Inconsolata;
        }

        .form fieldset input,
        .form fieldset .select {
            width: 40%;
            height: 38px;
            color: #333333;
            padding: 10px;
            border-radius: 5px;
            font-size: 15px;
            outline: none !important;
            background-color: transparent;
            border: 1px solid rgba(0, 0, 0, 0.3);
            box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);
        }

        .form fieldset input.input-cart-number,
        .form fieldset .select.input-cart-number {
            width: 82px;
            display: inline-block;
            margin-right: 8px;
        }

        .form fieldset input.input-cart-number:last-child,
        .form fieldset .select.input-cart-number:last-child {
            margin-right: 0;
        }

        .form fieldset .select {
            position: relative;
        }

        .form fieldset .select::after {
            content: "";
            border-top: 8px solid #222;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            position: absolute;
            z-index: 2;
            top: 14px;
            right: 10px;
            pointer-events: none;
        }

        .form fieldset .select select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            position: absolute;
            padding: 0;
            border: none;
            width: 100%;
            outline: none !important;
            top: 6px;
            left: 6px;
            background: none;
        }

        .form fieldset .select select :-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000;
        }


        .form button .fa {
            margin-right: 6px;
        }

        /*--------------------
        Checkout
        --------------------*/

        /* vietnamese */
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/inconsolata/v21/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp4U8WRL2l2eY.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/inconsolata/v21/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp4U8WRP2l2eY.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        /* latin */
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            src: url(https://fonts.gstatic.com/s/inconsolata/v21/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp4U8WR32lw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        .checkout {
            margin: 1px auto 30px;
            height: 300px;
            background: #bbb4b4;
            border-radius: 15px;
            padding: 5px 30px 15px;
        }
        .title-text-white{
            color: white;
        }
    </style>
    <!--Black Background-->
    <title>LUDU - Order Screen</title>
</head>

<div class="container" style="height: 80%">

    <div class="title title-text-white">
        <h2>ORDER</h2>
    </div>
    <div class="d-flex">
        <?php
        if (isset($_POST["submit"])) {
            $username = $_POST["fname"];
            $city = $_POST["fcity"];
            $adres = $_POST["houseadd"];
            $tel = $_POST["tel"];
            $id = $_SESSION['id'];
            $sql2="INSERT INTO order_detail (pname, quantity, price,user_id) SELECT pname, quantity, price,user_id FROM cart WHERE cart.user_id =$id";
            $result2 = $conn->query($sql2);
            $sql = "UPDATE order_detail SET user = '$username', city = '$city',adres = '$adres',tel = '$tel',date_order = NOW()  WHERE order_detail.user_id =$id";
            $result = $conn->query($sql);
            $sql = "DELETE FROM cart WHERE cart.user_id =$id";

            $result = $conn->query($sql);
            echo "<script>
            alert('Your order has been received')
            window.location.href='index.php'
        </script>";
        }
        ?>

        <form method="POST" class="form">

            <label>
                <span class="fname">Name <span class="required">*</span></span>
                <input type="text" name="fname" placeholder="Enter your name" value="<?php echo $current_username ?>" required>
            </label>
            <label>
                <span class="fname">City <span class="required">*</span></span>
                <input type="text" name="fcity" placeholder="Enter your city" required>
            </label>
            <label>
                <span>Address <span class="required">*</span></span>
                <input type="text" name="houseadd" placeholder="Enter your address" value="<?php echo $current_address ?>" required>
            </label>
            <label>
                <span>Phone Number <span class="required">*</span></span>
                <input type="tel" name="tel" placeholder="Enter your phone number" value="<?php echo $current_phone ?>" required>
            </label>
            <table>

                <tr>
                    <th colspan="2">Your cart</th>
                </tr>
                <?php
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM cart WHERE user_id=$id";
                $result = $conn->query($sql);

                $sql1 = "SELECT SUM(Quantity*price) AS total FROM cart where user_id=$id";
                $result1 = $conn->query($sql1);
                
                while ($row = $result->fetch_assoc()){
                $total_each_product = $row["quantity"] * $row["price"];
                ?>
                <tr>
                    <td>(<?php $pname=$row["pname"]; echo $row["pname"]; ?> x <?php $quantity=$row["quantity"]; echo $row["quantity"]; ?>)</td>
                    <td><?php $price=$row["price"]; echo number_format($total_each_product, 3); ?> VND</td>

                    <?php
                    }
                    ?>
                </tr>

                <?php while ($row1 = $result1->fetch_assoc()){ ?>

                <tr>
                    <td style="color: red ; font-weight: bold">Total</td>
                    <td style="color: red ; font-weight: bold"><?php $total=$row1["total"]; echo number_format($row1['total'], 3); }?> VND
                    </td>
                </tr>
                <tr>
                    <td style="color: #000000 ; font-weight: bold ">Transfer</td>
                    <td style="color: #000000 ; font-weight: bold ">Free Shipping</td>
                </tr>
            </table>
            <br>

            <div class="checkout" style="">

                <fieldset>
                    <label for="card-number">Card Number</label>
                    <input type="num" id="card-number" class="input-cart-number" maxlength="4" required>
                    <input type="num" id="card-number-1" class="input-cart-number" maxlength="4" required>
                    <input type="num" id="card-number-2" class="input-cart-number" maxlength="4" required>
                    <input type="num" id="card-number-3" class="input-cart-number" maxlength="4" required>
                </fieldset>
                <fieldset>
                    <label for="card-holder">Card Owner</label>
                    <input type="text" id="card-holder" required>
                </fieldset>
                <fieldset class="fieldset-expiration">
                    <label for="card-expiration-month">Expiration Date</label>
                    <div class="select">
                        <select id="card-expiration-month">
                            <option></option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                    <div class="select">
                        <select id="card-expiration-year">
                            <option></option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="fieldset-ccv">
                    <label for="card-ccv">CCV</label>
                    <input type="text" id="card-ccv" maxlength="3" required>
                </fieldset>

            </div>
            <button class="btn" name="submit"><i class="fa fa-lock"></i>Complete Order</button>
        </form>
    </div>


</div>
</html>