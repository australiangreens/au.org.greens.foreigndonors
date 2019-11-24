{* template block that contains the foreign donor affirmation field *}
<div id="foreigndonor">
  <div>{$form.foreigndonor.html}</div>
{if $domainId eq '7'}
  <div>I am an Australian Citizen or Permanent Resident, and not a prohibited donor as per Queensland legislation</div>
{elseif $domainId eq '8'}
  <div>I am an Australian Citizen or Permanent Resident, and not a prohibited donor as per NSW Electoral Funding legislation</div>
{else}
  <div>I am an Australian Citizen or Permanent Resident</div>
{/if}
</div>
{* reposition block after #otherBlock *}
