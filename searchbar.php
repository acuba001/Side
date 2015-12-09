<?php
include 'core/init.php'; 
include 'includes/overall/header.php'; 


if(!isset($_POST['search'])){ 
header("Location:index.php");
}
$search_sql = "SELECT * FROM tablename WHERE name LIKE '%".$_POST['search']."%' OR description LIKE '%".$_POST['search']." %' ";
$search_query = mysql_query($search_sql);
if(mysql_num_rows($search_query)!= 0){
$search_rs = mysql_fetch_assoc($search_query);
}
?>

<p> serch results</p>
<?php if(mysql_num_rows($search_query)!=0){
	do{ ?>
<p><?php echo $search_rs['name']; ?></p>

<?php	}while($search_rs = mysql_fetch_assoc($search_query));

}else {
	echo "No results found";
}

include 'includes/overall/footer.php';
?>
