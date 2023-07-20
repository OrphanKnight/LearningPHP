<?php include(dirname(__DIR__) . "/ProjectAssignment3/templates/header.php");  ?>


<style>
  @import url("https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Hind:wght@600&display=swap");
  body {
    background-color: #474e5d;
  }

  h1 {
    font-family: "Share Tech Mono", monospace;
    font-size: 50px;
    color: aliceblue;
  }

  li {
    font-size: 25px;
    color: azure;
  }

  b {
    font-family: "Hind", sans-serif;
  }
</style>

<h1>Skills</h1>
<ul>

  <?php

  $sql = 'SELECT skill_name, description FROM skills';

  $result = mysqli_query($dbc, $sql); 

  $skills_records = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_close($dbc);

  foreach($skills_records as $record) {
  ?>

    <li><b><?php echo htmlspecialchars($record['skill_name']); ?>:</b> <?php echo htmlspecialchars($record['description']); ?></li>

  <?php
  }
?>

</ul>

<?php include dirname(__DIR__) . "/ProjectAssignment3/templates/footer.php"; ?>
