<?php
/**
 * products.php
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Scripts and required files-->
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
                    <form  class="searchbox"action="search.php">
                        <input type="text" size="33">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- Main Content Of Page -->
        <article>
            <h1 class="mainheading">Our Products</h1>  
            <div class="content">
                <p class="maincontent">The Kalita has three small drainage holes at the bottom which, in addition to the filter paper, allow for an even and controlled drawdown of your brew water, 
                    as opposed to the results with one large hole. This helps to standardise your rate of drainage, which in turn provides more consistent results. In testing, we’ve enjoyed great cup quality, clarity and consistency. 
                    It’s almost fool proof if you can follow a few basic steps in preparation and brewing.
                </p>
            </div>
            
        </article>

<!-- Load  products XML file for login processing $productXml-->       
<?php
    $productXml = loadProductInfo();
    $userDbXml = loadUserLoginInfo();
?>
        <!-- Create table heading's for products.xml data. This is currently static set, but I would like to implement dynamic heading creation from the products XML file -->
        <table border="1">
            <tr>
                <th>name</th>
                <th>description</th>
                <th>sample Photo</th>
                <th>availability</th>
                <th>single price</th>
                <th>bulk price</th>
                <th>fc points</th>
                <th>Purchase</th>
            </tr>
            
<?php

foreach ($productXml->product as $row)
{
?>
    <tr>
        <td> <?php echo $row->name ?> </td>
        <td> <?php echo $row->description ?> </td>
        <td> <img src= "<?php echo $row->samplephoto?>" style= "width:100px;height:50px;"> </td>
        <td> <?php echo $row->availability ?> </td>
        <td> <?php echo $row->singleprice ?> </td>
        <td> <?php echo $row->bulkprice ?> </td>
        <td> <?php echo $row->fcpoints ?> </td>
        <td><input type="checkbox"/> </td>
        </form>
    </tr>   

    <?php
    }
    ?>
        </table>          
            <form class="productselection" action=" <?php echo $_SERVER ['PHP_SELF'] ?>" method="post">
            <input type="checkbox" name="Prod[]" value="1"> Product One <select name="coffeetype"> <option value="normal">Normal Roast</option>> <option value="Dark">Dark Roast</option> <option value="light">Light Roast</option> </select>
            <BR>
            <input type="checkbox" name="Prod[]" value="2"> Product Two <select name="size"> <option value="Med">Medium</option>> <option value="Lar">Large</option> <option value="Sma">Small</option> </select>
            <BR>
            <input type="checkbox" name="Prod[]" value="3"> Product Three <textarea name="engraving" rows="1" cols="30"> Please enter a message </textarea>
            <BR>
            <input type="submit" value="order" name="submitted">
        </form>
            
<?php
if (isset($_POST[submitted])) {
    ?>

    <?php
}
?>
        <!-- Begin PHP order processing -->
        <?php
        foreach ($_POST['Prod'] as $i) {
        $_SESSION['cart'][] = $i;
        }
        echo "Products: ";
        echo "Total Cost: ";
        echo "Total FC points: ";
        
        foreach ($_SESSION['cart'] as $loaded) {
            $newInsert = $userDbXml->user[$_SESSION['index']]->cart; 
            $newInsert->addChild('item' . $count ++, $loaded);
            $userDbXml->asXML('userdb.xml');
            echo $loaded, ',';
        }
        ?>
        <!-- Begin Order button logic -->
        
    <?php
        function processOrder()
        {
        echo "The button has been pushed";    
        }
    ?>
        <button id="checkOrder" onclick='processOrder();'>
            Run the Order Please
        </button>
        
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
