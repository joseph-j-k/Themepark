<?php
include("Head.php");
$i=1;
$selqryP = "select * from tbl_package p inner join tbl_booking b on p.package_id = b.package_id inner join tbl_park pa on pa.park_id = p.park_id inner join tbl_user u on u.user_id = b.user_id where u.user_id = '".$_SESSION["uid"]."' and b.booking_id  = '".$_SESSION["bid"]."'";
$result1 = $conn -> query($selqryP);
$data = $result1 -> fetch_assoc();
?>

<br />
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ticket</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4, #fbc2eb);
            background-size: 400% 400%;
            animation: moveBackground 10s infinite;
            color: #333;
            line-height: 1.6;
        }

        @keyframes moveBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .ticket {
            width: 600px;
            background: #fff;
            border: 2px dashed #ff6f61;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            opacity: 0;
            transform: scale(0.8);
            animation: fadeInScale 1s forwards ease-out;
        }

        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-header h2 {
            color: #ff6f61;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .ticket-header p {
            font-size: 14px;
            color: #777;
        }

        .ticket-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .ticket-info div {
            flex: 1;
            text-align: center;
            font-size: 14px;
        }

        .ticket-info div h4 {
            color: #444;
            margin-bottom: 5px;
        }

        .ticket-info div p {
            color: #555;
        }

        .ticket-details {
            margin-top: 15px;
            font-size: 16px;
        }

        .ticket-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .ticket-details th, .ticket-details td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .ticket-details th {
            background-color: #f9fafb;
            color: #333;
        }

        .print-btn {
            text-align: center;
            margin-top: 20px;
        }

        .print-btn button {
            padding: 12px 25px;
            background: linear-gradient(90deg, #ff6f61, #ffc371);
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            font-size: 16px;
        }

        .print-btn button:hover {
            background: linear-gradient(90deg, #ff4c3b, #ff914d);
            transform: scale(1.05);
        }

        @media print {
            body {
                background: white;
            }
            .ticket {
                border: none;
                box-shadow: none;
            }
            .print-btn {
                display: none;
            }
        }
    </style>
  </head>
  <body>
    <div class="ticket" style="margin-left:350px;">
      <div class="ticket-header">
        <h2><?php echo $data["park_name"]; ?></h2>
        <p>GST TIN: 06AAFCD6498P1ZT</p>
        <p>Toll-Free: <a href="tel:18001236477" style="color: #00bb07;">1800-123-6477</a></p>
      </div>

      <div class="ticket-info">
        <div>
          <h4>Booking Date</h4>
          <p><?php echo $data["booking_date"]; ?></p>
        </div>
        <div>
          <h4>Ticket Number</h4>
          <p><?php echo 1000 + $data["user_id"]; ?></p>
        </div>
      </div>

      <div class="ticket-details">
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Count</th>
              <th>Package</th>
              <th>Total Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $data["user_name"]; ?></td>
              <td><?php echo $data["booking_head"]; ?></td>
              <td><?php echo $data["package_name"]; ?></td>
              <td><?php echo $data["package_price"]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="print-btn">
        <button onclick="window.print();">Print Ticket</button>
      </div>
    </div>
  </body>
</html>
<br />

<?php include("Foot.php"); ?>
