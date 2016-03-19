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

                <h3 style="text-transform: none;">Generate Hall Card</h3>
                <form method="post" action="/home/generateHC">
                  <div class="form-group">
                      <label>Candidate Name</label>
                      <input type="text" class="form-control" name="candidate_name" placeholder="Candidate Name" required>
                  </div>
                  <div class="form-group">
                      <label>Candidate Roll Number</label>
                      <input type="number" class="form-control" name="candidate_roll_number" placeholder="Candidate Roll Number" required>
                  </div>
                  <div class="form-group">
                      <label>Candidate Aadhaar Card Number</label>
                      <input type="number" class="form-control" name="candidate_aadhaar_card_number" placeholder="Candidate Aadhaar Card Number">
                  </div>
                  <div class="form-group">
                    <label>ISO 19794-4 format fingerprint Template</label>
                    <input type="text" class="form-control" rows="5" name="finger-print-template" value="0x239, 0x1, 0x255, 0x255, 0x255, 0x255, 0x2, 0x0, 0x130, 0x3, 0x1, 0x103, 0x12, 0x0, 0x0, 0x255, 0x254, 0x255.">
                  </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="<?php echo $csrf_token_name ?>" value="<?php echo $csrf_token ?>">
                        <button type="submit" class="btn btn-lg" style="background: #000; color: #fff; float: right;">Generate Hall Card</button>
                    </div>
                </div>

                </form>


            </div>


    </div>
</div>


<?=$foot?>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>



</body>
</html>
