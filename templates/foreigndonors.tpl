{* template block that contains the foreign donor affirmation field *}
<div id="foreigndonor">
  <div>{$form.foreigndonor.html}</div>
{if $domainId eq '7'}
  <div>I am an Australian Citizen or Permanent Resident, and not a prohibited donor as per Queensland legislation</div>
{else}
  <div>I am an Australian Citizen or Permanent Resident</div>
{/if}
</div>
{if $domainId eq '8'}
  <div id="prohibiteddonor">
    <div>{$form.prohibiteddonor.html}</div>
    <div>I am not a prohibited donor as per NSW Electoral Funding Act 2018</div>
    <p>Under the NSW Electoral Funding Act it is an offence for any political party to take donations from a prohibited donor and parties have to pay hefty fines and/or people can be imprisioned if they take donations from prohibited donors.</p>
    <p>I confirm that I am not a prohibited donor engaged in property development, a tobacco business entity or a liquour or gambling business entity:</p>
    <ul><li>1. property developer - I am not an individual or corporation:
      <ul><li>(a)  that carries on a business mainly concerned with the residential or commercial development of land with the ultimate purpose of the sale or lease of the land for profit:
        <ul><li>(i) who has made 1 relevant planning application, or someone has made the application on behalf of me, or a corporation that I work for, that is pending; or</li>
          <li>(ii) who has made 3 or more relevant planning applications, or someone has made the applications on behalf of me, or a corporation that I work for that has been determined within the previous 7 years; or</li>
          <li>(iii) who has engaged in any activity individually, or as a corporation for the dominant purpose of providing commercial premises where I, or my body corporate, or a related body corporate of my corporation is to carry on its business if my business sells or leases a substantial part of the premises; or</li>
          <li>(iv) that is a close associate of a corporation set out in (a), (b) or (c) in this paragraph.</li></ul></li></ul></li>
      <li>2. tobacco industry business entity - I am not:
        <ul><li>(a) a corporation engaged in a business undertaking that is mainly concerned with the manufacture or sale of tobacco products; or</li>
          <li>(b) a close associate of a corporation set out in (a) in this paragraph.</li>
        </ul></li>
      <li>3. liquor or gambling industry business entity - I am not:
        <ul><li>(a) a corporation that is mainly concerned and has the ultimate purpose of making a profit from:
          <ul><li>(i) the manufacture or sale of liquour products;</li>
            <li>(ii) wagering, betting or other gambling (including the manufacture of machines used primarily for this purpose); or</li></ul>
          </li>
          <li>(b) a close associate of a corporation set out in (a) in this paragraph.</li>
        </ul>
      </li>
    </ul>
    <p> Close associate of an individual or corporation means I am not:</p>
      <ul><li>(a) director or officer of the corporation or the spouse of such a director or officer,</li>
         <li>(b) a related body corporate of the corporation,</li>
         <li>(c) a person whose voting power in the corporation or a related body corporate of the corporation is greater than 20%, or the spouse of such a person,</li>
         <li>(d) a corporation or a related body corporate of the corporation that is a stapled entity, the other stapled entity in relation to that stapled security,</li>
         <li>(e) a person who holds more than 20% of the units in the trust of a unit trust if the corporation is a trustee, manager or responsible entity of a trust or a beneficiary of this trust,</li>
        <li>(f) individually a person, or a corporation, that is a property developer in a joint venture or partnership with a property developer in connection with a relevant planning application made by, or on behalf of the property developer who is likely to obtain a financial gain if the development would be, or is authorised by an approved planning application or is carried out.</li>
        <li>(g) a spouse of the individual.</li>
      </ul>
  </div>
{/if}
{* reposition block after #otherBlock *}
