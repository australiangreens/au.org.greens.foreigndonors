(function($) {
  // Wait for element to exist in DOM to run callback.
  var waitForEl = function(selector, callback) {
    if ($(selector).length) {
      callback();
    } else {
      setTimeout(function() {
        waitForEl(selector, callback);
      }, 100);
    }
  };

  waitForEl('.layout-billing', function() {
    var foreignDonor = $('.foreigndonor-section');
    var prohibitedDonor = false;
    var billingSection = $('.layout-billing');
    billingSection.append(foreignDonor);
    if (CRM.vars.foreigndonors.domainId == 8) {
      prohibitedDonor = $('.prohibiteddonor-section');
      billingSection.append(prohibitedDonor);
    }
  });
})(CRM.$);
