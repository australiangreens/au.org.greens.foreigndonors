(function($) {
  $('#billing-payment-block').on('crmLoad', function() {
    var paymentFieldsDiv = $('#payment_information');
    paymentFieldsDiv.append('<div id="foreigndonor"><div><input id="foreigndonor" name="foreigndonor" type="checkbox" value="1" class="crm-form-checkbox required"></div><div>' + CRM.vars.foreigndonors.label + '</div></div>');
    if (CRM.vars.foreigndonors.domainId == 8) {
      paymentFieldsDiv.append('<div id="prohibiteddonor"><div><input id="prohibiteddonor" name="prohibiteddonor" type="checkbox" value="1" class="crm-form-checkbox required"></div><div>You must affirm you are not a prohibited donor as per NSW Electoral legislation</div></div>');
    }
  });
  var paymentFieldsDiv = $('#payment_information');
    paymentFieldsDiv.append('<div id="foreigndonor"><div><input id="foreigndonor" name="foreigndonor" type="checkbox" value="1" class="crm-form-checkbox required"></div><div>' + CRM.vars.foreigndonors.label + '</div></div>');
  if (CRM.vars.foreigndonors.domainId == 8) {
    paymentFieldsDiv.append('<div id="prohibiteddonor"><div><input id="prohibiteddonor" name="prohibiteddonor" type="checkbox" value="1" class="crm-form-checkbox required"></div><div>You must affirm you are not a prohibited donor as per NSW Electoral legislation</div></div>');
  }
})(CRM.$);
