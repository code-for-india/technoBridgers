<!DOCTYPE html>
<?=$head?>
<div class="container">
    <div class="row" style="padding: 20px;">

            <!-- Sidebar Column -->
            <div class="col-md-3">
              <?php echo $left; ?>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">

                <h3 style="text-transform: none;">Hall Card</h3>
                <div style="border: 1px solid #000; padding: 10px;">

                <img src="<?php echo $qr_code_link; ?>">
                <br>
                <?php
                $encode_qr = urlencode($qr_code_link);
                ?>
                <form method="post" action="/home/hallCardDetails">
                  <input type="hidden" name="url" value="<?php echo $encode_qr; ?>">
                  <input type="submit" class="btn btn-primary" value="Scan QR Code">
                </form>




              </div>
              </div>
            </div>


    </div>
</div>


<?=$foot?>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>



</body>
</html>
