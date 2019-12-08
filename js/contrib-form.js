(function($) {
  $('.foreigndonor-section').appendTo('.crm-group.custom_post_profile-group');
  if ($('.prohibiteddonor-section').length) {
    $('.prohibiteddonor-section').appendTo('.crm-group.custom_post_profile-group');
  }
})(CRM.$);
