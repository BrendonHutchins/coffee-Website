<?php
/**
 * membership.php
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
        <title>Membership</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Styles -->
        <style>
            @import "./css/index.css";
        </style>
        <!-- Scripts and required files -->
        <?php require './scripts/utility.php' ?> 
    </head>
    <body>
              <!--  /*Begin page Header*/ -->
            <nav class="header">
                <ul>
                    <li> <a href="index.php">Home</a></li>
                    <li> <a href="products.php">Products</a></li>
                    <li> <a href="membership.php">Membership</a></li>
                    <li> <a href="deals.html">Todays Deals</a></li>
                    <li> <a href="accounts.php">Account</a></li>
                    <li>
                        <form  class="searchbox" action="search.php">
                            <input type="text" size="33">
                        </form>
                    </li>
            </ul>
            </nav>
              
              <article>
              <h1 class="mainheading">Please sign-up for some fantastic deals</h1>
              <!-- Begin main content -->

             </article> 
                <!-- Begin to load userdb.XML file for update -->

<?php
  $userdb = loadUserLoginInfo();
?>
              <article>
                  <div class="content">
                      <p class="maincontent">Cupping is a basic method of tasting coffee which is standard across the world. 
                      Whether it be Guatemala, Canada, Indonesia, London, Mexico, Kenya - everyone uses this same procedure which is almost a ritual.  5oz of water at 92 degrees is added to 10g of coffee coarsely ground.  
                      The coffee then steeps for 5 minutes and then the grinds removed- and the coffee is ready to be analyzed.     
                      </p>
                  </div>
              </article>
              
               <form class="usersubmit" action=" <?php echo $_SERVER ['PHP_SELF'] ?>" method="post">
                <h5>Please enter firstname <input type="text" name="fname[]"></h5>
                <h5>Please enter lastname <input type="text" name="lname[]"></h5>
                <h5>Please enter username <input type="text" name="username[]"></h5>
                <h5>Please enter password <input type="text" name="password[]"></h5>
                <h5>Please enter address <input type="text" name="address[]"></h5>
                <h5>Please enter contact number <input type="text" name="contactNum[]"></h5>
                <input type="submit" value="Submit Mmebership"name="submitted" >
              </form>
        <?php
       if(isset($_POST[submitted]))
       { ?>
                <!-- Get current values for increment, unable to grab the last value (this is set statically in the array)-->
                <?php
                $getInfo = $userdb->user[1];
                ?>
                <?php $uidAddition = $getInfo->uid  + 1?>                

                <!-- Test code to update fcpoints value -->    
        <?php
            /* <!-- Create new user template for XML document. The output format does not include nice formatting--> */
            $newInsert = $userdb->addChild('user');
            
            $newInsert->addChild('uid', $uidAddition);
            $newInsert->addChild('username',$_POST['username'][0]);
            $newInsert->addChild('passwd',$_POST['password'][0]);
            $newInsert->addChild('fname',$_POST['fname'][0]);
            $newInsert->addChild('lname',$_POST['lname'][0]);
            $newInsert->addChild('address',$_POST['address'][0]);
            $newInsert->addChild('contactNum',$_POST['contactNum'][0]);
            $newInsert->addChild('fcpoints','0');

            $cart = $newInsert->addChild('cart');
            $cart->addChild('item1','Null');

            $newInsert->addChild('expiry','0');

            // save the updated document
            $userdb->asXML('userdb.xml');  
        ?>
        
       <?php
       } 
       ?>
                    
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
