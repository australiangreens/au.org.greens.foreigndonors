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
      <i id="foreigndonor-help" class="fa fa-question-circle" aria-hidden="true"></i>
    </label>
  </div>
  <div class="content">{$form.foreigndonor.html}</div>
</div>
{if $domainId eq '8'}
  <div class="crm-section prohibiteddonor-section">
    <div class="label">
      <label for="prohibiteddonor">I am not a prohibited donor <i id="prohibiteddonor-help" class="fa fa-question-circle" aria-hidden="true"></i></label>
    </div>
    <div class="content">
    {$form.prohibiteddonor.html}</div>
  </div>
{/if}
{* reposition block after #otherBlock *}
