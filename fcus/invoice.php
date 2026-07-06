<?php 
require 'uheader.php';
$cus_id = $_SESSION['cus_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Invoice History</title>
    <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>

    <style>
        .rating {
            direction: rtl;
            unicode-bidi: bidi-override;
            display: inline-flex;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 20px;
            color: #ccc;
            cursor: pointer;
            padding: 0 2px;
        }
        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: gold;
        }
    </style>
</head>
<body>
    <main>
        <h4>Invoice History</h4>
        <div>
            <table id="table" style="margin: 0 auto; width: 80rem;">
                <tr>
                    <td>ID</td>
                    <td>Service Name</td>
                    <td>Price</td>
                    <td>Service Date</td>
                    <td>Status</td>
                    <td>Worker Phone</td>
                    <td>Feedback Email</td>
                    <td>Rating</td>
                </tr>
<?php
$sql = "SELECT appointment.*, services.ser_name, services.ser_price 
        FROM appointment 
        INNER JOIN services ON appointment.ser_id = services.ser_id
        WHERE appointment.cus_id = '$cus_id' 
        ORDER BY appointment.a_date DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $wor_phno = '-';
        if (!empty($row['wor_id'])) {
            $wor_id  = (int)$row['wor_id'];
            $wResult = $conn->query("SELECT wor_phno FROM worker WHERE wor_id = $wor_id");
            if ($wResult && $wResult->num_rows > 0) {
                $wRow     = $wResult->fetch_assoc();
                $wor_phno = $wRow['wor_phno'];
            }
        }

        $currentRating = isset($row['rating']) ? (int)$row['rating'] : 0;
?>
                <tr>
                    <td><?php echo $row['a_id']; ?></td>
                    <td><?php echo $row['ser_name']; ?></td>
                    <td><?php echo $row['ser_price']; ?></td>
                    <td><?php echo $row['a_date']; ?></td>
                    <td><?php echo $row['a_status']; ?></td>
                    <td><?php echo $wor_phno; ?></td>
                    <td>quickassist@gmail.com</td>
                    <td>
                        <form method="post" action="save_rating.php" class="rating-form">
                            <input type="hidden" name="a_id" value="<?php echo $row['a_id']; ?>">

                            <div class="rating">
                                <input type="radio" id="star5_<?php echo $row['a_id']; ?>" name="rating" value="5" <?php if($currentRating==5) echo 'checked'; ?> />
                                <label for="star5_<?php echo $row['a_id']; ?>">★</label>

                                <input type="radio" id="star4_<?php echo $row['a_id']; ?>" name="rating" value="4" <?php if($currentRating==4) echo 'checked'; ?> />
                                <label for="star4_<?php echo $row['a_id']; ?>">★</label>

                                <input type="radio" id="star3_<?php echo $row['a_id']; ?>" name="rating" value="3" <?php if($currentRating==3) echo 'checked'; ?> />
                                <label for="star3_<?php echo $row['a_id']; ?>">★</label>

                                <input type="radio" id="star2_<?php echo $row['a_id']; ?>" name="rating" value="2" <?php if($currentRating==2) echo 'checked'; ?> />
                                <label for="star2_<?php echo $row['a_id']; ?>">★</label>

                                <input type="radio" id="star1_<?php echo $row['a_id']; ?>" name="rating" value="1" <?php if($currentRating==1) echo 'checked'; ?> />
                                <label for="star1_<?php echo $row['a_id']; ?>">★</label>
                            </div>
                        </form>
                    </td>
                </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' style='text-align:center;'>No invoices found for you.</td></tr>";
}
?>
            </table>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ratingForms = document.querySelectorAll('.rating-form');

        ratingForms.forEach(function (form) {
            const radios = form.querySelectorAll('input[name="rating"]');
            radios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    form.submit(); // auto submit when user clicks a star
                });
            });
        });
    });
    </script>
</body>
</html>
