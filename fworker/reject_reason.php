<?php require 'whead.php'; ?>
<?php
if (isset($_POST['submit'])) {

    $a_id         = $_POST['a_id'];
    $reasonSelect = $_POST['reason_select'];
    $reasonOther  = $_POST['reason_other'] ?? '';

    // Final reason: dropdown choice or custom text
    $reason = $reasonSelect === 'Other' ? $reasonOther : $reasonSelect;

    $sql  = "UPDATE appointment SET a_status='rejected', reject_reason=? WHERE a_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $reason, $a_id);
    if ($stmt->execute()) {
        header("Location: task.php");
        exit();
    } else {
        echo "<script>alert('Error updating appointment.');</script>";
    }
} elseif (isset($_GET['rejectid'])) {
    $a_id = $_GET['rejectid'];
} else {
    header("Location: task.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reason for Rejection</title>
    <link rel="stylesheet" href="admin.css">
    <script>
        function toggleOtherReason(selectEl) {
            var otherBox = document.getElementById('otherReasonBox');
            if (selectEl.value === 'Other') {
                otherBox.style.display = 'block';
            } else {
                otherBox.style.display = 'none';
            }
        }
    </script>
</head>
<body>
<main>
    <h4>Enter Reason for Rejection</h4>
    <form method="post" action="">
        <input type="hidden" name="a_id" value="<?php echo htmlspecialchars($a_id); ?>">

        <div>
            <label for="reason_select">Reason:</label>
            <select name="reason_select" id="reason_select" required onchange="toggleOtherReason(this)">
                <option value="">Select a reason</option>
                <option value="Customer not available">Customer not available</option>
                <option value="Wrong address">Wrong address</option>
                <option value="Outside service area">Outside service area</option>
                <option value="Time not suitable">Time not suitable</option>
                <option value="Issue with instructions">Issue with instructions</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div id="otherReasonBox" style="display:none; margin-top:10px;">
            <label for="reason_other">Other reason:</label>
            <textarea name="reason_other" id="reason_other" rows="3" cols="40"></textarea>
        </div>

        <button type="submit" name="submit">Submit Reason</button>
    </form>
</main>
</body>
</html>
<?php require 'footer.php'; ?>