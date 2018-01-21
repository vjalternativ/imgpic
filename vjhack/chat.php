<?php
mysql_connect("localhost","imgpic_ip","psycho@48");
mysql_select_db("imgpic_framework") or die("unable to select db");

if(isset($_REQUEST['clear'])) {

$sql = "delete from chat ";
$query = mysql_query($sql);
header('location:chat.php');
exit();

}

if(isset($_POST['sub']) && !empty($_POST['msg'])) {
    $sql = "insert into chat values ('".addslashes($_POST['msg'])."',CURRENT_TIMESTAMP)";
 // die($sql);
    mysql_query($sql);
    
}
?>

<form method="post">
<table width="100%" >

     <tr><td>
    <textarea name="msg" width="100%" style="width:100%" placeholder="Enter Your message"></textarea>
         
     </td></tr>
     <tr><td><input type="submit" name="sub" value="Send" /> </td></tr>
 </table>   

</form>
<a href="chat.php"><button type="button">Refresh Page</button></a>

<a href="chat.php?clear=1"><button type="button">Delete Chat History</button></a>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    
    <?php
    $sql = "select * from chat order by date_entered desc limit 20";
    $qry = mysql_query($sql);
    while($row=mysql_fetch_assoc($qry)) {
        ?>
        <tr><td>[<?php echo $row['date_entered'];?>] -- <?php echo $row['msg'];?></td></tr>
        <?php
        
    }
    ?>
</table>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
  <script>
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 60000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);

  </script>