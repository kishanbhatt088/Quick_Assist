<?php require 'head.php'; ?>

<?php
if (isset($_POST['wassign'])) 
{
    $wid = $_POST['wid'];
    $aid = $_POST['aid'];

    // 1) assign worker and set appointment status to requested
    $a_status = "requested";
    $sql = "UPDATE appointment 
            SET wor_id = '$wid',
                a_status = '$a_status'
            WHERE a_id = '$aid'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "error";
    } else {
        // 2) update worker status in worker table
        $wstatus = "requested";
        $sqlWorker = "UPDATE worker 
                      SET wor_status = '$wstatus' 
                      WHERE wor_id = '$wid'";
        mysqli_query($conn, $sqlWorker);

        header("Location: appointment.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>assign worker</title>
        <link rel="stylesheet" href="admin.css">
        <script src="admin.js"></script> 
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM appointment INNER JOIN services ON appointment.ser_id = services.ser_id WHERE a_id = $id";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {    
                        echo "error";
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
            ?>                          
                            <div class="appointmentbox">
                                <div class="applable">
                                    <lable>Service Name:</lable>
                                    <h6><?php echo $row['ser_name']; ?></h6>
                                </div>
                                <div class="applable">
                                    <lable>Category:</lable>
                                    <h6><?php echo $row['ser_category']; ?></h6>
                                </div>
                                <div class="applable">
                                    <lable>Service Date:</lable>
                                    <h6><?php echo $row['a_date']; ?></h6>
                                </div>
                                <div class="applable">
                                    <lable>Service City:</lable>
                                    <h6><?php echo $row['a_city']; ?></h6>
                                </div>
                                <div class="applable address">
                                    <lable>Address:</lable>
                                    <h6><?php echo $row['a_addre']; ?></h6>
                                </div>

                                <form method="post" action="wassign.php">
                                    <div class="applable">
                                        <lable>Worker ID:</lable>
                                        <select name="wid" required>
                                            <option value="">Select Worker</option>
                                            <?php
                                               $profession = $row['ser_category'];
$aid        = $row['a_id'];   // current appointment id

$worker_sql = "
    SELECT w.*
    FROM worker w
    WHERE w.profession = '$profession'
      AND (w.wor_status = 'available' OR w.wor_status = 'completed')
      AND w.wor_id NOT IN (
            SELECT wor_id
            FROM appointment
            WHERE a_id = '$aid'
              AND a_status = 'cancel'   -- or 'rejected' if you use that value
      )
";
$worker_result = $conn->query($worker_sql);

                                                if ($worker_result && $worker_result->num_rows > 0) {
                                                    while ($w = $worker_result->fetch_assoc()) {
                                                        echo '<option value="' . $w['wor_id'] . '">'
                                                             . $w['wor_name'] . ' (' . $w['wor_id'] . ')</option>';
                                                    }
                                                } else {
                                                    echo '<option value="">No available workers</option>';
                                                }
                                            ?>
                                        </select>
                                        <input type="hidden" name="aid" value="<?php echo $row['a_id']; ?>">
                                    </div>
                                    <input type="submit" name="wassign" value="Assign" class="appointmentboxbtn">
                                </form>
                            </div>

                            <div class="tableview" style="margin-left:100px;">
                                <div>
                                    <table id="table">
                                        <tr>
                                            <td>ID</td>
                                            <td>NAME</td>
                                            <td>Address</td>
                                            <td>PHONE NO</td>
                                            <td>Status</td>
                                        </tr>
                                        <?php
                                            $profession = $row['ser_category'];
                                            // List workers with their status from worker table
                                            $sql2 = "SELECT * FROM worker WHERE profession = '$profession'";
                                            $result2 = $conn->query($sql2);

                                            if ($result2 && $result2->num_rows > 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                                    <tr>
                                                        <td><?php echo $row2['wor_id']; ?></td>
                                                        <td><?php echo $row2['wor_name']; ?></td>
                                                        <td><?php echo $row2['wor_address']; ?></td>
                                                        <td><?php echo $row2['wor_phno']; ?></td>
                                                        <td><?php echo $row2['wor_status'] ?? 'available'; ?></td>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            ?>
        </main>
    </body>
</html>
