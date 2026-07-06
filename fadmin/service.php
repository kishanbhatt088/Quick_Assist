<?php require'head.php'?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Service</title>
        <link rel="stylesheet" href="admin.css">
        <script src="admin.js"></script> 
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <h4>Service List<h4>
            <div class="tableview">
                <div class="heading">
                    <div class="tablesearchbox">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="search" onkeyup="search()">
                    </div>
                    <div class="filter">
                        
                    </div>
                    <a href="serinde.php" alt="operation file"><i class="fa-solid fa-plus"></i>Add Service</a>    
                </div>
                <div>
                    <table id="table">
                        <tr>
                            <td>ID</td>
                            <td>NAME</td>
                            <td>CATEGORY</td>
                            <td>SECTION</td>
                            <td>PRICE</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM services";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                while($row = $result->fetch_assoc())
                                {
                        ?>
                                    <tr>
                                        <td><?php echo $row['ser_id'];?></td>
                                        <td><?php echo $row['ser_name'];?></td>
                                        <td><?php echo $row['ser_category'];?></td>
                                        <td><?php echo $row['ser_section'];?></td>
                                        <td><?php echo $row['ser_price'];?></td>
                                        <td><a href="serup.php?id=<?php echo $row['ser_id'];?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td><a href="serinde.php?id=<?php echo $row['ser_id'];?>" name="delete"><i class="fa-solid fa-trash-can"></i></a></td>
                                    </tr>
                        <?php
                                }
                            } 
                        ?>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>
