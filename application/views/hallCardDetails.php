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

                <h3 style="text-transform: none;">Candidate Details</h3>
                  <strong>Name: </strong><?php echo $candidate_data['candidate_name']; ?>
                  <br>
                  <strong>Roll Number: </strong><?php echo $candidate_data['candidate_roll_number']; ?>
                  <br>
                  <strong>Aadhaar Card Number: </strong><?php echo $candidate_data['candidate_aadhaar_card_number']; ?>
                  <br>
                  <form>
                    <div class="form-group">
                        <label>Finger Print</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Authenticate Candidate</button>
                    </div>
                  </form>
              </div>
            </div>


    </div>
</div>


<?=$foot?>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>



</body>
</html>
