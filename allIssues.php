<?php session_start();
    require_once "db_config.php";
    $allIssuesQuery = $connection->query("SELECT * FROM Issues");
    $allIssues = $allIssuesQuery->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($allIssues)){ 
?>
 
    <table class ="dashBoard_Table">
        <tr>
            <th> Title </th>
            <th> Type </th>
            <th id = "status_Header"> Status </th>
            <th> Assigned To </th>
            <th> Created </th>
        </tr>

        <?php foreach ($allIssues as $issue):
        $assign = $issue['assigned_to'];
        $retrievename = $connection->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
        $retrievedname = $retrievename->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
                <td class='poundSign'><?php echo "#".$issue['id']; ?><a class="issue_Link" href="displayjobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
                <td><?php echo $issue['type']; ?></td>
                <?php if($issue['status']=='OPEN'){ ?>
                    <div class = "statuscontainer">
                        <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>
                        <?php }?>
                        <?php if($issue['status']=='Closed'){ ?>
                        <td><div class='closestatus'> <?php echo $issue['status']; ?></div></td>
                        <?php } ?>
                        <?php if($issue['status']=='In-Progress'){ ?>
                        <td><div class='progstatus'> <?php echo $issue['status']; ?></div></td>
                        <?php } ?>
                    </div>
                <td><?php echo $retrievedname['firstname']." ".$retrievedname['lastname']; ?></td>
                <td><?php echo $issue['created']; ?></td>
            </tr>
            
        <?php endforeach; ?>    
    </table>
        <?php }else{
            echo "No issues found at this present time.";
        }
