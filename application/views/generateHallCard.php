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

                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Candidate Name</label>
                          <input type="text" class="form-control" name="candidate_name" placeholder="Candidate Name" required>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Candidate Roll Number</label>
                          <input type="text" class="form-control" name="candidate_roll_number" placeholder="Candidate Roll Number" required>
                      </div>
                  </div>




                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Candidate Aadhaar Card Number</label>
                          <input type="text" class="form-control" name="candidate_aadhaar_card_number" placeholder="Candidate Aadhaar Card Number">
                      </div>
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
