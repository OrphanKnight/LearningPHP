<?php include(dirname(__DIR__) . "/ProjectAssignment3/templates/header.php");  ?>

<style>
  * {
    box-sizing: border-box;
  }

  img {
    widht: 250px;
    height: 250px;
  }

  /* Set a background color */
  body {
    background-color: #474e5d;
    font-family: Helvetica, sans-serif;
  }

  /* The actual timeline (the vertical ruler) */
  .timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
  }

  /* Container around content */
  .container {
    padding: 10px 40px;
    position: relative;
    background-color: inherit;
    width: 50%;
  }

  /* The circles on the timeline */
  .container::after {
    content: "";
    position: absolute;
    width: 25px;
    height: 25px;
    right: -17px;
    background-color: white;
    border: 4px solid #ff9f55;
    top: 15px;
    border-radius: 50%;
    z-index: 1;
  }

  /* Place the container to the left */
  .left {
    left: 0;
  }

  /* Place the container to the right */
  .right {
    left: 50%;
  }

  /* Add arrows to the left container (pointing right) */
  .left::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    right: 30px;
    border: medium solid white;
    border-width: 10px 0 10px 10px;
    border-color: transparent transparent transparent white;
  }

  /* Add arrows to the right container (pointing left) */
  .right::before {
    content: " ";
    height: 0;
    position: absolute;
    top: 22px;
    width: 0;
    z-index: 1;
    left: 30px;
    border: medium solid white;
    border-width: 10px 10px 10px 0;
    border-color: transparent white transparent transparent;
  }

  /* Fix the circle for containers on the right side */
  .right::after {
    left: -16px;
  }

  /* The actual content */
  .content {
    padding: 20px 30px;
    background-color: white;
    position: relative;
    border-radius: 6px;
  }

  /* Media queries - Responsive timeline on screens less than 600px wide */
  @media screen and (max-width: 600px) {
    /* Place the timelime to the left */
    .timeline::after {
      left: 31px;
    }

    /* Full-width containers */
    .container {
      width: 100%;
      padding-left: 70px;
      padding-right: 25px;
    }

    /* Make sure that all arrows are pointing leftwards */
    .container::before {
      left: 60px;
      border: medium solid white;
      border-width: 10px 10px 10px 0;
      border-color: transparent white transparent transparent;
    }

    /* Make sure all circles are at the same spot */
    .left::after,
    .right::after {
      left: 15px;
    }

    /* Make all right containers behave like the left ones */
    .right {
      left: 0%;
    }
  }
</style>
<?php 
$sql = 'SELECT degree, school_name, start_date, end_date FROM education ORDER BY end_date DESC';

$result = mysqli_query($dbc, $sql); 

$education_records = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($dbc);

?>

<div class="timeline">

<?php
foreach($education_records as $index => $record) {
    $alignment = ($index % 2 == 0) ? 'left' : 'right';
?>

  <div class="container <?php echo $alignment; ?>">
    <div class="content">
      <h2><?php echo htmlspecialchars($record['degree']); ?></h2>
      <p><?php echo htmlspecialchars($record['school_name']); ?></p>
      <p>End: <?php echo htmlspecialchars($record['end_date']); ?></p>
      <p>Start: <?php echo htmlspecialchars($record['start_date']); ?></p>
    </div>
  </div>

<?php
}
?>

</div>

<?php include dirname(__DIR__) . "/ProjectAssignment3/templates/footer.php"; ?>
