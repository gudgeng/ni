<?php
include 'dbconnect.php';

$sql = "SELECT kpi.kpimaindata.DATANAME, kpi.kpisubdata.SASARAN, kpi.kpisubdata.PENCAPAIAN, kpi.kpisubdata.CATATAN, kpi.kpisubdata.JENISUNIT
        FROM kpi.kpimaindata
        JOIN kpi.kpisubdata ON kpi.kpimaindata.DATAID = kpi.kpisubdata.DATAID
        WHERE kpi.kpimaindata.DATATYPE = 'TEMBAKAU'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KPI Tembakau</title>
</head>
<body>
    <h2>KPI Tembakau</h2>
    <table border="1">
        <tr>
            <th>Nama KPI</th>
            <th>Sasaran</th>
            <th>Pencapaian</th>
            <th>Catatan</th>
            <th>Unit</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["DATANAME"] ?></td>
                <td><?= $row["SASARAN"] ?></td>
                <td><?= $row["PENCAPAIAN"] ?></td>
                <td><?= $row["CATATAN"] ?></td>
                <td><?= $row["JENISUNIT"] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="homepage.html">Kembali</a>
</body>
</html>

<?php $conn->close(); ?>
