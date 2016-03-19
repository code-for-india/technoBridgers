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
                  <?php if ($candidate_data['candidate_aadhaar_card_number']!=""){ ?>
                  <strong>Aadhaar Card Number: </strong><?php echo $candidate_data['candidate_aadhaar_card_number']; ?>
                  <br>
                  <p><strong>ISO 19794-4 format fingerprint Template</strong> <?=$candidate_data['finger_print_template']?></p>
                  <?php } ?>
                  <form>
                    <div class="form-group">
                        <label>Finger Print</label>
                        <div class="row hidden showPrint">
                          <div class="col-sm-6">
                            <p>0x239, 0x1, 0x255, 0x255, 0x255, 0x255, 0x2, 0x0, 0x130, 0x3, 0x1, 0x103, 0x12, 0x0, 0x0, 0x255, 0x254, 0x255..</p>
                          </div>
                          <div class="col-sm-6">
                            <img src="http://blog.timesunion.com/opinion/files/2011/06/0610_WVvoterID.jpg" class="img-responsive" style="max-width:200px;">    
                          </div>
                        </div>
                        <button class="getFingerPrint btn btn-primary">Get Finger Print</button>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-primary" onclick="return false;">Authenticate Candidate</button>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <?php if(isset($candidate_data['candidate_aadhaar_card_number']) && $candidate_data['candidate_aadhaar_card_number'] != '') {?>
                        <div class="form-group">
                            <a class="btn btn-success" href="http://auth.uidai.gov.in/" target="_blank">Authenticate using Aadhar API</a>
                        </div>
                        <?php } ?>
                        
                      </div>  
                    </div>
                  </form>
              </div>
            </div>
    </div>
</div>
<?=$foot?>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).on('click','.getFingerPrint',function(){
    $('.getFingerPrint').fadeOut('fast');
    $('.showPrint').removeClass('hidden');
    return false;
  });
</script>
</body>
</html>
