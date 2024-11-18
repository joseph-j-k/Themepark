<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "select * from tbl_package p inner join tbl_category c on c.category_id = p.category_id inner join tbl_park pa on pa.park_id = p.park_id inner join tbl_place pl on pl.place_id = pa.place_id inner join tbl_district d on d.district_id = pl.district_id where true ";
        $row = "SELECT count(*) as count from tbl_package p inner join tbl_category c on c.category_id = p.category_id inner join tbl_park pa on pa.park_id = p.park_id inner join tbl_place pl on pl.place_id = pa.place_id inner join tbl_district d on d.district_id = pl.district_id where true ";


        if ($_GET["district"] != null) {

            $district = $_GET["district"];

            $sqlQry = $sqlQry." AND d.district_id IN(".$district.")";
            $row = $row." AND d.district_id IN(".$district.")";
        }
        if ($_GET["place"] != null) {

            $place = $_GET["place"];

            $sqlQry = $sqlQry." AND pl.place_id IN(".$place.")";
            $row = $row." AND pl.place_id IN(".$place.")";
        }
		
	       if ($_GET["category"] != null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
            $row = $row." AND c.category_id IN(".$category.")";
        }
	       if ($_GET["park"] != null) {

            $park = $_GET["park"];

            $sqlQry = $sqlQry." AND pa.park_id IN(".$park.")";
            $row = $row." AND pa.park_id IN(".$park.")";
        }

        if ($_GET["name"] != null) {

            $name = $_GET["name"];
    
            $sqlQry = $sqlQry . " AND package_name LIKE '" . $name . "%'";
        }
        
		//   echo $sqlQry;
        $resultS = $conn->query($sqlQry);
        $resultR = $conn->query($row);
        $resultS = $conn->query($sqlQry);
     
	 
        if ($resultR && $resultS) {  // Check if both queries were successful
            $rowR = $resultR->fetch_assoc();

        if ($rowR["count"] > 0) {
            while ($row1 = $resultS->fetch_assoc()) {
            ?>
                        <div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Park/Package/<?php echo $row1["package_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $row1["park_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price : <?php echo $row1["package_price"]; ?>/-
                                        </h4>
                                        <p align="center" style="color:black">
                                            <?php echo $row1["category_name"]; ?><br>
                                            <?php echo $row1["package_name"]; ?><br>
                                        </p>
                                           <a href="Schedule.php?pid=<?php echo $row1["package_id"]; ?>"  class="btn btn-success btn-block">Book Package</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    } else {
                        echo "<h4 align='center'>Package Not Found!!!!</h4>";
                    }
                } else {
                    echo "Error executing queries.";
                }
            }
            ?>