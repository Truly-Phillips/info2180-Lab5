
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'] ?? '';

$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE ?");
$stmt->execute(["%$country%"]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<table border="1">
    <tr>
        <th>Country Name</th>
        <th>Continent</th>
        <th>Independence Year</th>
        <th>Head of State</th>
    </tr>

    <?php foreach ($results as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['name']); ?></td>
        <td><?= htmlspecialchars($row['continent']); ?></td>
        <td><?= htmlspecialchars($row['indep_year'] ?? 'N/A'); ?></td>
        <td><?= htmlspecialchars($row['head_of_state'] ?? 'Unknown'); ?></td>
    </tr>
    <?php endforeach; ?>
</table>


