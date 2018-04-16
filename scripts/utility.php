<?
function loadUserLoginInfo()
{
	if (file_exists('userdb.xml')) 
	{
	    $userDb = simplexml_load_file('userdb.xml');
	} 
	else
	{
	    exit('Unable to load userdb.xml file');
	}
	return $userDb;
}
function loadProductInfo()
{
    if (file_exists('products.xml')) {
        $productXml = simplexml_load_file('products.xml');
    } else {
        exit('Failed to open speecified xml file.');
    }
    return $productXml;
}

function displayAccountInfo()
{

	
}

?>
