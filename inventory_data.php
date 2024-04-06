  <?php

    include 'db_connection.php';

    // Check if the 'id' parameter exists in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare and execute the SQL query
        $sql = "SELECT ii.*, iu.*
                FROM inventory_item AS ii
                INNER JOIN inventory_unit AS iu ON ii.id = iu.item_id
                WHERE ii.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {

                $date = $row["date"];
                $name = $row["name"];
                $bl5 = $row["bl5"];
                $bl5_unit = $row["bl5_unit"];
                $bl6 = $row["bl6"];
                $bl6_unit = $row["bl6_unit"];
                $bl7 = $row["bl7"];
                $bl7_unit = $row["bl7_unit"];
                $bl9 = $row["bl9"];
                $bl9_unit = $row["bl9_unit"];
                $sp5 = $row["sp5"];
                $sp5_unit = $row["sp5_unit"];
                $sp6 = $row["sp6"];
                $sp6_unit = $row["sp6_unit"];
                $sp7 = $row["sp7"];
                $sp7_unit = $row["sp7_unit"];
                $sp9 = $row["sp9"];
                $sp9_unit = $row["sp9_unit"];
                $wl5 = $row["wl5"];
                $wl5_unit = $row["wl5_unit"];
                $wl6 = $row["wl6"];
                $wl6_unit = $row["wl6_unit"];
                $wl7 = $row["wl7"];
                $wl7_unit = $row["wl7_unit"];
                $wl9 = $row["wl9"];
                $wl9_unit = $row["wl9_unit"];
                $ld8 = $row["ld8"];
                $ld8_unit = $row["ld8_unit"];
                $ld9 = $row["ld9"];
                $ld9_unit = $row["ld9_unit"];
                $ld11 = $row["ld11"];
                $ld11_unit = $row["ld11_unit"];
                $dld = $row["dld"];
                $dld_unit = $row["dld_unit"];
                $pp = $row["pp"];
                $pp_unit = $row["pp_unit"];
                $cups50 = $row["cups50"];
                $cups50_unit = $row["cups50_unit"];
                $cups60 = $row["cups60"];
                $cups60_unit = $row["cups60_unit"];
                $cups80 = $row["cups80"];
                $cups80_unit = $row["cups80_unit"];
                $cups100 = $row["cups100"];
                $cups100_unit = $row["cups100_unit"];
                $cups150 = $row["cups150"];
                $cups150_unit = $row["cups150_unit"];
                $cups210 = $row["cups210"];
                $cups210_unit = $row["cups210_unit"];
                $cups250 = $row["cups250"];
                $cups250_unit = $row["cups250_unit"];
                $bd5 = $row["bd5"];
                $bd5_unit = $row["bd5_unit"];
                $bd6 = $row["bd6"];
                $bd6_unit = $row["bd6_unit"];
                $bd7 = $row["bd7"];
                $bd7_unit = $row["bd7_unit"];
                $cp5 = $row["cp5"];
                $cp5_unit = $row["cp5_unit"];
                $cp6 = $row["cp6"];
                $cp6_unit = $row["cp6_unit"];
                $cp7 = $row["cp7"];
                $cp7_unit = $row["cp7_unit"];
                $cp9 = $row["cp9"];
                $cp9_unit = $row["cp9_unit"];
            }
        } else {
            echo "0 results";
        }

        $stmt->close();
    } else {
        echo "Invalid ID provided.";
    }

    $conn->close();
    ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <title>Display Data</title>
      <style>
          .container1 {
              height: auto;
              margin-top: 20px;
              padding: 15px 15px 20px;
              border: 1px solid #ccc;
              border-radius: 10px;
              box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
              font-family: 'Poppins', sans-serif;
          }

          .container1 #date {
              font-size: 18px;
              font-weight: 700;
          }

          .container {
              height: auto;
              margin-top: 20px;
              padding: 5px 25px 25px;
              border: 1px solid #ccc;
              border-radius: 10px;
              box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
              font-family: 'Poppins', sans-serif;
          }

          .item {
              margin-top: 10px;
          }

          .home-icon {
              margin-top: 10px;
              margin-left: 10px;
              width: 50px;
              cursor: pointer;
              font-size: 30px;
          }

          .container label {
              color: #333366;
              font-weight: 400;
              font-size: 16px;
          }

          .container .item .data {
              position: absolute;
              right: 0;
              margin-right: 100px;
              font-size: 16px;
              font-weight: 600;
              color: blue;
          }

          .container .item .unit {
              position: absolute;
              right: 0;
              margin-right: 75px;
              font-size: 16px;
              font-weight: 600;
              color: green;
          }

          .back-icon {
              position: absolute;
              right: 0;
              margin-right: 22px;
              margin-top: 10px;
              color: #333;
              font-size: 30px;
              cursor: pointer;
          }

          .edit-icon {
              position: absolute;
              margin-top: -30px;
              right: 0;
              margin-right: 20px;
              color: #333;
              font-size: 18px;
              cursor: pointer;
          }
      </style>
  </head>

  <body>
      <a href="index.html" class="toggle-buttons">
          <i id="homeIcon" class="fas fa-home home-icon"></i>
      </a>
      <a href="view_inventory.php" class="toggle-button"><i class="fas fa-arrow-left back-icon"></i></a>
      <br><br>
      <hr>
      <div class="container1">
          <label for="date" id="date">Date: </label>
          <span id="date"><?php echo $date; ?></span>
          <br>
          <label for="name">Name :</label>
          <span id="name"><?php echo $name; ?></span>
         <a href='edit_inventory.php?id=<?php echo $_GET['id']; ?>'><i class="fas fa-edit edit-icon"></i></a>

      </div>

      <div class="container">
          <h3>Black Loose</h3>
          <!-- Items for Black Loose -->
          <div class="item">
              <label for="bl5">5-inch BL:</label>
              <span class="data"><?php echo $bl5; ?></span>
              <span class="unit"><?php echo $bl5_unit; ?></span>
          </div>
          <div class="item">
              <label for="bl6">6-inch BL:</label>
              <span class="data"><?php echo $bl6; ?></span>
              <span class="unit"><?php echo $bl6_unit; ?></span>
          </div>
          <div class="item">
              <label for="bl7">7-inch BL:</label>
              <span class="data"><?php echo $bl7; ?></span>
              <span class="unit"><?php echo $bl7_unit; ?></span>
          </div>
          <div class="item">
              <label for="bl9">9-inch BL:</label>
              <span class="data"><?php echo $bl9; ?></span>
              <span class="unit"><?php echo $bl9_unit; ?></span>
          </div>
      </div>

      <!-- Repeat similar structure for other containers -->
      <!-- Container for Star Packet -->
      <div class="container">
          <h3>Star Packet</h3>
          <!-- Items for Star Packet -->
          <div class="item">
              <label for="sp5">5-inch SP:</label>
              <span class="data"><?php echo $sp5; ?></span>
              <span class="unit"><?php echo $sp5_unit; ?></span>
          </div>
          <div class="item">
              <label for="sp6">6-inch SP:</label>
              <span class="data"><?php echo $sp6; ?></span>
              <span class="unit"><?php echo $sp6_unit; ?></span>
          </div>
          <div class="item">
              <label for="sp7">7-inch SP:</label>
              <span class="data"><?php echo $sp7; ?></span>
              <span class="unit"><?php echo $sp7_unit; ?></span>
          </div>
          <div class="item">
              <label for="sp9">9-inch SP:</label>
              <span class="data"><?php echo $sp9; ?></span>
              <span class="unit"><?php echo $sp9_unit; ?></span>
          </div>
      </div>

      <!-- Container for White Loose -->
      <div class="container">
          <h3>White Loose</h3>
          <!-- Items for White Loose -->
          <div class="item">
              <label for="wl5">5-inch WL:</label>
              <span class="data"><?php echo $wl5; ?></span>
              <span class="unit"><?php echo $wl5_unit; ?></span>
          </div>
          <div class="item">
              <label for="wl6">6-inch WL:</label>
              <span class="data"><?php echo $wl6; ?></span>
              <span class="unit"><?php echo $wl6_unit; ?></span>
          </div>
          <div class="item">
              <label for="wl7">7-inch WL:</label>
              <span class="data"><?php echo $wl7; ?></span>
              <span class="unit"><?php echo $wl7_unit; ?></span>
          </div>
          <div class="item">
              <label for="wl9">9-inch WL:</label>
              <span class="data"><?php echo $wl9; ?></span>
              <span class="unit"><?php echo $wl9_unit; ?></span>
          </div>
      </div>
      <div class="container">
          <h3>L/D SOMA</h3>
          <!-- Items for L/D SOMA -->
          <div class="item">
              <label for="ld8">8-inch L/D:</label>
              <span class="data"><?php echo $ld8; ?></span>
              <span class="unit"><?php echo $ld8_unit; ?></span>
          </div>
          <div class="item">
              <label for="ld9">9-inch L/D:</label>
              <span class="data"><?php echo $ld9; ?></span>
              <span class="unit"><?php echo $ld9_unit; ?></span>
          </div>
          <div class="item">
              <label for="ld11">11-inch L/D:</label>
              <span class="data"><?php echo $ld11; ?></span>
              <span class="unit"><?php echo $ld11_unit; ?></span>
          </div>
          <div class="item">
              <label for="dld">DLD:</label>
              <span class="data"><?php echo $dld; ?></span>
              <span class="unit"><?php echo $dld_unit; ?></span>
          </div>
          <div class="item">
              <label for="pp">PP:</label>
              <span class="data"><?php echo $pp; ?></span>
              <span class="unit"><?php echo $pp_unit; ?></span>
          </div>
      </div>

      <!-- Container for Cups -->
      <div class="container">
          <h3>CUPS</h3>
          <!-- Items for Cups -->
          <div class="item">
              <label for="cups50">50 ml:</label>
              <span class="data"><?php echo $cups50; ?></span>
              <span class="unit"><?php echo $cups50_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups60">60 ml:</label>
              <span class="data"><?php echo $cups60; ?></span>
              <span class="unit"><?php echo $cups60_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups80">80 ml:</label>
              <span class="data"><?php echo $cups80; ?></span>
              <span class="unit"><?php echo $cups80_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups100">100 ml:</label>
              <span class="data"><?php echo $cups100; ?></span>
              <span class="unit"><?php echo $cups100_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups150">150 ml:</label>
              <span class="data"><?php echo $cups150; ?></span>
              <span class="unit"><?php echo $cups150_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups210">210 ml:</label>
              <span class="data"><?php echo $cups210; ?></span>
              <span class="unit"><?php echo $cups210_unit; ?></span>
          </div>
          <div class="item">
              <label for="cups250">250 ml:</label>
              <span class="data"><?php echo $cups250; ?></span>
              <span class="unit"><?php echo $cups250_unit; ?></span>
          </div>
      </div>

      <!-- Container for Black Delhi -->
      <div class="container">
          <h3>Black Delhi</h3>
          <!-- Items for Black Delhi -->
          <div class="item">
              <label for="bd5">5-inch BD:</label>
              <span class="data"><?php echo $bd5; ?></span>
              <span class="unit"><?php echo $bd5_unit; ?></span>
          </div>
          <div class="item">
              <label for="bd6">6-inch BD:</label>
              <span class="data"><?php echo $bd6; ?></span>
              <span class="unit"><?php echo $bd6_unit; ?></span>
          </div>
          <div class="item">
              <label for="bd7">7-inch BD:</label>
              <span class="data"><?php echo $bd7; ?></span>
              <span class="unit"><?php echo $bd7_unit; ?></span>
          </div>
      </div>

      <!-- Container for Cover -->
      <div class="container">
          <h3>Cover</h3>
          <!-- Items for Cover -->
          <div class="item">
              <label for="cp5">5-inch Cover:</label>
              <span class="data"><?php echo $cp5; ?></span>
              <span class="unit"><?php echo $cp5_unit; ?></span>
          </div>
          <div class="item">
              <label for="cp6">6-inch Cover:</label>
              <span class="data"><?php echo $cp6; ?></span>
              <span class="unit"><?php echo $cp6_unit; ?></span>
          </div>
          <div class="item">
              <label for="cp7">7-inch Cover:</label>
              <span class="data"><?php echo $cp7; ?></span>
              <span class="unit"><?php echo $cp7_unit; ?></span>
          </div>
          <div class="item">
              <label for="cp9">9-inch Cover:</label>
              <span class="data"><?php echo $cp9; ?></span>
              <span class="unit"><?php echo $cp9_unit; ?></span>
          </div>
      </div>
      <hr>
  </body>

  </html>