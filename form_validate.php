<!DOCTYPE html>
<html>
<head>
	<script src="//rickharrison.github.io/validate.js/validate.js"></script>
	<title></title>
</head>
<body>
<div class="container-fluid">

    <h1>Test form validation with validate.js</h1>
  
    <form method="POST" class="unpadded selfreg" id="selfreg" name="selfreg" autocomplete="off">

    <div class="errormessage" id="selfRegMessage">
    </div>

    <fieldset>
    <legend>Please enter the following information: (all fields must be completed)</legend>

    <div class="form-group">
      <label for="nfirst">Given Names:</label>
      <input class="form-control" name="nfirst" id="nfirst" value="">
    </div>

    <div class="form-group">
      <label for="nlast">Family Name:</label>
      <input class="form-control" name="nlast" id="nlast" value="">
    </div>

    <div class="form-group email-check">
      <label for="email">Do not enter anything in this field:</label>
      <input class="form-control" id="nEmail" type="text" name="nEmail" value="" />
    </div>

    <div class="form-group">
      <label for="street_aaddress">House no. &amp; Street:</label>
      <input class="form-control" name="stre_aaddress" id="stre_aaddress" value="">
    </div>

    <div class="form-group">
      <label for="city_aaddress">Suburb State Postcode:</label>
      <input class="form-control" name="city_aaddress" id="city_aaddress" value="">
      <span class="formLabelExample formNote">Please add 2 spaces between the city, state &amp; postcode. eg. SUTHERLAND [space][space] NSW [space][space] 2232</span>
    </div>

    <div class="form-group">
      <label for="zemailaddr">Email:</label>
      <input class="form-control" name="zemailaddr" id="zemailaddr" value="">
    </div>

    <div class="formgroup">
      <label for="tphone1">Phone:</label>
      <input class="form-control" name="tphone1" id="tphone1" value="">
      <span class="formLabelExample formNote">No spaces please, eg. 95234321</span>
    </div>

    <div class="form-group">
      <label for="F051birthdate">Date of Birth:</label>
      <input class="form-control" name="F051birthdate" id="F051birthdate" value="" >
      <span class="formLabelExample formNote">Enter your DOB in the format DD/MM/YYYY. eg. 29/01/1980</span>
    </div>

    <div class="warning">
      <p>Important: by submitting this form you are agreeing to comply with the restrictions set out on this page and with the Libary's general <a href="https://www.sutherlandshire.nsw.gov.au/Library/Membership/Conditions_of_Membership" target="_blank">Conditions of Membership</a>.</p>
      <p>To confirm your membership you must visit any Sutherland Shire Library within 6 weeks, complete a printed application form and show personal identification, whereupon you will be issued a permanent library card. If you don't confirm your account your membership will be cancelled and you will need to re-join.</p>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>

    </fieldset>

    </form>
  
  <div class="row">
    <h2>Some footer text.</h2>
  </div>
</div><!-- /container -->
<script type="text/javascript">
	var validator = new FormValidator('selfreg', [{
    name: 'nfirst',
    display: 'Given Names',
    rules: 'required'
  }, {
    name: 'nlast',
    display: 'Family Name',
    rules: 'required'
  }, {
    name: 'nEmail',
    display: 'do not enter',
    rules: 'max_length[0]'
  }, {    
    name: 'stre_aadress',
    display: 'Street Address',
    rules: 'required'
  }, {    
    name: 'city_aaddress',
    display: 'Suburb, State, Postcode',
    rules: 'required'
  }, {    
    name: 'zemailaddr',
    display: 'Email address',
    rules: 'required|valid_email'
  }, {    
    name: 'tphone1',
    display: 'Telephone No',
    rules: 'required|alpha_numeric'
  }, {
    name: 'F051birthdate',
    display: 'Date of Birth',
    rules: 'required|exact_length[10]'
  }], function(errors, event) {
      if (errors.length > 0) {
        // Show the errors
        
        var displayErrors = document.getElementById('selfRegMessage');
        var errorString = '';        
        for (var i = 0; i < errors.length; i++) {
          errorString += errors[i].message + '<br />';
        }
        
        displayErrors.innerHTML = errorString;
      }
  });




</script>

</body>
</html>