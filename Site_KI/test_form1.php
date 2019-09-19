<div class="form-group has-error">
   <div class="col-lg-12">
      <label class="control-label" for="firstname">Name</label>
      <input type="text" class="form-control required" id="firstname" name="firstname">
    </div>
</div>

<script type="text/javascript">
  $('#myForm').on('submit', function(e) {
    var firstName = $('#firstname');

    // Check if there is an entered value
    if(!firstName.val()) {
      // Add errors highlight
      firstName.closest('.form-group').removeClass('has-success').addClass('has-error');

      // Stop submission of the form
      e.preventDefault();
    } else {
      // Remove the errors highlight
      firstName.closest('.form-group').removeClass('has-error').addClass('has-success');
    }
  });
</script>