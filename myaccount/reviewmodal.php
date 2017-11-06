<?php
	require_once("../config/config.php");


	try {
		$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('SELECT item_list FROM orders WHERE order_id = :oid');
		$stmt->bindParam(":oid", $modal_order_id);
		$stmt->execute();

		$res = $stmt->fetch();

	}
	catch(PDOException $e){
		echo "Database error";
	}
?>

<style>
  .write-review-star{
    color: #f05f40;
  }
  .submit-review-btn{
    padding: 20px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border: 1px solid #f05f40;
    border-left: 0px;
    cursor: pointer;
    background-color: #fa845e;
    color: #fff;
  }
  .input-group-addon-btn{
    padding: 0px;

  }
  .submitreviewerror{
    margin-left: 15px;
    display: none;
    font-size: 12px;
  }
</style>

<div id="review-modal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review your recent order:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php
        foreach(explode(",", $res[0]) as $r){

          $stmt2 = $conn->prepare('SELECT item_name FROM items WHERE item_id = :iid');
          $stmt2->bindParam(":iid", $r);
          $stmt2->execute();

          $name = $stmt2->fetch();
        ?>
        <div>
          <form class="submitreviewform">
          <input type="hidden" name="id" value="<?php echo $r; ?>"/>
          <div>
            <a href="/shop/item/?id=<?php echo $r; ?>" style="margin-left:10px;font-size:18px;color:#000"><?php echo $name[0]; ?></a>
            <div class="input-group">
              <span class="input-group-addon">
                <i data-val="1" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
                <i data-val="2" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
                <i data-val="3" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
                <i data-val="4" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
                <i data-val="5" class='fa fa-star-o write-review-star' aria-hidden='true'></i>
                <input type="hidden" name="stars" class="stars-selected" value="0" />
              </span>
              <textarea style="min-height: 62px" name="review" type="text" class="form-control review-text" ></textarea>
              <span class="input-group-addon input-group-addon-btn">
                <button class="submit-review-btn" type="submit">Submit</button>
              </span>
            </div>

            <div class="submitreviewerror">You must give this review stars</div>
          </div>
          </form>
          <div class="review-submitted" style="text-align:center; display:none; color: #48AE48"> Review submitted! Thank you. </div>
          <hr style="border-width:1px; max-width:100%; margin-top:20px; margin-bottom:20px;">
        </div>

        <?php
        }
        ?>

      </div>
    </div>
  </div>
</div>
