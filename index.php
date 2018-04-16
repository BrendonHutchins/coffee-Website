<?php
/**
 * index.php
 *
 *
 * @category   Coffee Website using XML data
 * @package    Flinders University
 * @author     Brendon
 * @copyright  2015 Brendon Hutchins
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    2.0
 * @Date       15/10/2015   
 */

session_Start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee-Website.com</title>
    <meta charset="UTF-8">
    <!-- Viewport is the client screen, and here we are setting the width to the device and applying no zoom or scale -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts and required files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <? require './scripts/utility.php' ?>

    <!-- Styles -->
    <style>
        @import "./css/index.css";
    </style>

</head>
    <body>
        <!-- Page Header -->
        <nav class="header">
            <ul>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="products.php">Products</a></li>
                <li> <a href="membership.php">Membership</a></li>
                <li> <a href="deals.html">Todays Deals</a></li>
                <li> <a href="accounts.php">Account</a></li>
                <li>
                    <form class="searchbox"action="search.php">
                        <input type="text" size="33">
                    </form>
                </li>
            </ul>  
        </nav>
        <!-- Main Content Of Page -->
        <article>
            <h1 class="mainheading">Introduction to Coffee</h1>
            <div class="content">
                <p class="maincontent">Let’s all take a moment to share a collective hi-five: specialty coffee is becoming more and more popular with people all around the world…winning! 
                    This increasing validation of delicious brews comes with its own challenges however. With a strong history in espresso-based drinks, Australian specialty cafes have many skills 
                    in dancing the long-docket-jive, with successful venues turning out many hundreds of beverages each day. 
                    With an ever-increasing drive to fine tune how coffees are crafted, baristas are required to juggle more settings and tools than ever before.
                </p>    
                
            <div id="image">
                <img id="preload" src="./images/coffee.jpg" style="display:none; width: 400px;" height="300px;" />
            </div>
                
                <script>
                $("#image").ready(function()
                {
                $("#preload").fadeIn(3000);
                });
                </script>
<?
// I have moved the loading of userDb into an external function. the function will return the user database into 
// this new object userDb.
    $userDb = loadUserLoginInfo();
?>
<!-- Begin login form -->
<form class="userlogin" action="<?php echo $_SERVER ['PHP_SELF'] ?>" method="post">
    <p> Please login usernname</p>
    <input type="text" name="sub0[]">
    <p> Please login password</p>
    <input type="text" name="sub1[]">
    <input type="submit" value="Login">
</form>
                
<!-- Begin logout form --> 

               
<!-- Load input username [sub0] as $i and password [sub1] as $r. Loop through userDb.xml for a match on both -->
<!-- The index of a successful login is recorded  as $currentIndex and posted to $_SESSION['index']. While this is currently done with a static counter, I would like to implement a dynamic XPATH solution -->
<?php
$currentIndex = 0;
foreach ($_POST['sub0'] as $i) {
    foreach ($_POST['sub1'] as $r) {
        foreach ($userDb->user as $entry) {
            if ($r == $entry->passwd && $i == $entry->username) {
                $_SESSION['name'] = $i;
                $_SESSION['index'] = $currentIndex;
                echo "You have logged in successfully $i";
                break;
            }
            $currentIndex++;
        }
    }
}
?>
            </div> <!-- think this is the content end div -->
        </article>
        <!-- Page Footer -->
        <nav class="footer">
            <ul>
                <li><a href="mailto:coffee@cafe.com">Contact Us</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Affiliates</a></li>
                <li><a href="http://google.com">Google</a></li>
                <li><a href="http://bing.com">Bing</a></li>
            </ul>
        </nav>
    </body>
</html>
