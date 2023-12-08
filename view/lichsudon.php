<?php
 if (isset($don)) {
    // Display Bootstrap table
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'><tr><th>Order ID</th><th>Customer Name</th><th>Order Date</th><th>Total Amount</th></tr></thead><tbody>";

    // Display data rows
    foreach ($don as $lichsu ) {
    
        echo "<tr>";
        echo "<td>" . $lichsu["room_id"] . "</td>";
        echo "<td>" . $lichsu["customer_name"] . "</td>";
        echo "<td>" . $lichsu["id_number"] . "</td>";
        echo "<td>" . $lichsu["email"] . "</td>";
        echo "</tr>";
       
    }

    echo "</tbody></table>";
} else {
    echo "<p class='alert alert-info'>No orders found.</p>";
}
?>