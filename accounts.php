<?php 
/**
 * accounts.php
 *
 *
 *
 * @version    2.0
 * @Date       15/10/2015   
 */

session_start();
?>

<!DOCTYPE html>
<!-- Author @Brendon Hutchins -->
<html lang="en">
    <head>
        <title>Coffee.com</title>
        <meta charset="UTF-8">
        <!-- Style -->
        <style> @import "./css/index.css"; </style>

        <!-- Scripts and required files -->
        <?php require './scripts/utility.php' ?>
    </head>
    
    <body>
        <!-- /*Begin page Header*/ -->

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
        
        <article>
            <h1 class="mainheading">Welcome to the accounts page</h1>
        </article>
                <!-- Load in userdb XML file for login processing -->
<?php
   $userdb = loadUserLoginInfo()
?>

<?php
    if (!$_SESSION['name'])
{
?>
<p>Please login to view membership</p>
<?php
}
?>
                  
        <!-- Load correct XML node and echo out information -->
        <?php
         $accountInfo = $userdb->user[$_SESSION['index']];
        ?>
        <h4>Username</h4>
        <?php echo $accountInfo->username ?>
        
        <h4>First Name</h4>
        <?php echo $accountInfo->fname ?>
        
        <h4>Shopping Cart</h4>
        <?php echo $accountInfo->cart ?>
        
        <h4>FC Points</h4>
        <?php echo $accountInfo->fcpoints ?>
        
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
