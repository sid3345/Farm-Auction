
<?php
 include("../dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

$CatValue=$_GET["Count"];
$sql2 = "SELECT * FROM `catagory` WHERE type='$CatValue'";
$result1 = $con->query( $sql2 );
if ( $result1->num_rows > 0 ) {
	foreach ( $result1 as $row ) {
		$Cat_name = $row[ "name" ];
		$Cat_ID = $row[ "ID" ];


		?>

		<option value="<?=$Cat_ID?>">
			<?=$Cat_name?>
		</option>
		<?php
	}

}
?>