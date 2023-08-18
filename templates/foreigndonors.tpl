{* template block that contains the foreign donor affirmation field *}
<div class="crm-section foreigndonor-section">
  {if $foreignPageId eq '2857' || $foreignPageId eq '2879' || $foreignPageId eq '2880'}
    <div class="content description">
      <h3>Information required for legislative compliance (non citizens/residents may still apply but must ring the office to do so (07) 3357 8458)</h3>
    </div>
  {/if}
  <div class="label">
    <label for="foreigndonor">
      {if $domainId eq '7'}
         I am an Australian Citizen or Permanent Resident, and not a prohibited donor as per Queensland legislation
      {else}
         I am an Australian Citizen or Permanent Resident
         {if $domainId eq '8'}
            and am not a foreign donor
         {/if}
      {/if}
    </label>
    <i id="foreigndonor-help" class="fa fa-question-circle" aria-hidden="true" onclick="foreignDonorClicked()"></i>
  </div>
  <div class="content">{$form.foreigndonor.html}</div>
</div>
{* inject prohibited donor checkbox for NSW domain and NSW fin type forms *}
{if $addNSWProhibitedDonor}
  <div class="crm-section prohibiteddonor-section nsw-prohibited-donor">
    <div class="label">
      <label for="prohibiteddonor">I am not a prohibited donor</label>
      <i id="prohibiteddonor-help" class="fa fa-question-circle" aria-hidden="true" onclick="prohibitedDonorNSWClicked()"></i>
    </div>
    <div class="content">
    {$form.prohibiteddonor.html}</div>
  </div>
{else}
  {if $addACTProhibitedDonor}
    <div class="crm-section prohibiteddonor-section act-prohibited-donor">
      <div class="label">
        <label for="prohibiteddonor">I am not a prohibited donor</label>
        <i id="prohibiteddonor-help" class="fa fa-question-circle" aria-hidden="true" onclick="prohibitedDonorACTClicked()"></i>
      </div>
      <div class="content">
      {$form.prohibiteddonor.html}</div>
    </div>
  {/if}
{/if}
{* reposition block after #otherBlock *}

<div class="modal fade" id="foreigndonor-help-modal" tabindex="-1" role="dialog" aria-labelledby="foreigndonor-help-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="foreigndonor-help-title">Definitions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="foreigndonor-help-modal-body" class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
