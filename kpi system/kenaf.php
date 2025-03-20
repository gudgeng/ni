<?php
include 'dbconnect.php';

$sql = "SELECT kpi.kpimaindata.DATANAME, kpi.kpisubdata.SASARAN, kpi.kpisubdata.PENCAPAIAN, kpi.kpisubdata.CATATAN, kpi.kpisubdata.JENISUNIT
        FROM kpi.kpimaindata
        JOIN kpi.kpisubdata ON kpi.kpimaindata.DATAID = kpi.kpisubdata.DATAID
        WHERE kpi.kpimaindata.DATATYPE = 'KENAF'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Kenaf</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    h2 {
        text-align: center;
        margin-top: 20px;
        color: #2f813d;
    }

    .table-container {
        margin: 20px auto;
        padding: 10px;
        max-width: 90%;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        overflow-x: auto; /* Enables horizontal scrolling for small screens */
    }

    table {
        border-collapse: collapse;
        width: 100%;
        table-layout: auto; /* Allows columns to adjust based on content */
        word-wrap: break-word; /* Ensures long words break into the next line */
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
        color: #333;
    }

    th {
        background-color: #2f813d;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9; /* Alternating row colors */
    }

    tr:hover {
        background-color: #f1f1f1; /* Highlight row on hover */
    }

    td {
        font-size: 14px;
    }

    a {
        display: inline-block;
        margin: 20px auto;
        text-align: center;
        text-decoration: none;
        color: white;
        background-color: #2f813d;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    a:hover {
        background-color: #27632d;
    }
</style>
<body>
    <h2>KPI Kenaf</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>Bil</th> <!-- New column for numbering -->
                <th>Nama KPI</th>
                <th>Sasaran</th>
                <th>Pencapaian</th>
                <th>Catatan</th>
                <th>Unit</th>
            </tr>
            <?php 
            $bil = 1; // Initialize counter
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $bil++ ?></td> <!-- Increment counter for each row -->
                    <td><?= htmlspecialchars($row["DATANAME"]) ?></td>
                    <td><?= htmlspecialchars($row["SASARAN"]) ?></td>
                    <td><?= htmlspecialchars($row["PENCAPAIAN"]) ?></td>
                    <td><?= htmlspecialchars($row["CATATAN"]) ?></td>
                    <td><?= htmlspecialchars($row["JENISUNIT"]) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <a href="homepage.html">Kembali</a>
</body>
</html>

<?php $conn->close(); ?>
