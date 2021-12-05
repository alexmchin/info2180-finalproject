<?php
    session_start();
    require_once "db_config.php";
    $session_id =$_SESSION['user_id'];
    $ticketIssuesQuery = $connection->query("SELECT * FROM Issues WHERE assigned_to ='$session_id'");
    $ticketIssues = $ticketIssuesQuery->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($ticketIssues)){
?>
<table id="dashBoard_Table">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th id = "status_Header"> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($ticketIssues as $issue):?>
        <tr>
        <td class='poundSign'><?php echo "#".$issue['id']; ?><a class="issues_Link" href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
        <td><?php echo $issue['type']; ?></td>
        <?php if($issue['status']=='OPEN'){ ?>
        <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>
        <?php }?>
        <?php if($issue['status']=='Closed'){ ?>
        <td><div class='closestatus'> <?php echo $issue['status']; ?></div></td>
        <?php } ?>
        <?php if($issue['status']=='In-Progress'){ ?>
        <td><div class='progstatus'> <?php echo $issue['status']; ?></div></td>
        <?php } ?>
        <td><?php echo  $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
        <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?> 
     
</table>
<?php }else{
            echo "No tracked issues are assigned to you.";
        }
