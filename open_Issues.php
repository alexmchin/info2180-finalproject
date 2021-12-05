<?php 
session_start();
    require_once "db_config.php";
    $openIssuesQuery = $connection->query("SELECT * FROM Issues WHERE 'status' = 'OPEN'");
    $openissues = $openIssuesQuery->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($openissues)){
?>

<table id="dashBoard_Table">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th id = "status_Header"> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($openissues as $issue):
         $assign = $issue['assigned_to'];
         $retrieveName = $connection->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
         $retrievedName = $retrieveName->fetch(PDO::FETCH_ASSOC); ?>
        <tr>
        <td class='poundSign'><?php echo "#".$issue['id']; ?><a class="issues_Link" href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
            <td><?php echo $issue['type']; ?></td>
            <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>            
            <td><?php echo $retrievedName['firstname']." ".$retrievedName['lastname']; ?></td>
            <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?>                 
</table>
<?php }else{
            echo "No open issues at this time.";
        }