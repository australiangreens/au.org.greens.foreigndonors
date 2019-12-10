(function($) {
   $(function() {
     var fdHelpText = "<p>The <em>Commonwealth Electoral Act 1918</em> prohibits the knowing receipt of donations from foreign donors. Section 287AA of the Act defines Foreign donors to include: </p> <ul> <li>a foreign public enterprise;</li> <li>an entity (whether or not incorporated) that does not meet any of the following conditions: <ul> <li>the entity is incorporated in Australia;</li> <li>the entity's head office is in Australia;</li> <li>the entity's principal place of activity is, or is in, Australia;</li> </ul> </li> <li>an individual who is none of the following: <ul> <li>an elector;</li> <li>an Australian citizen;</li> <li>an Australian resident;</li> <li>a New Zealand citizen who holds a Subclass 444 (Special Category) visa under the <em>Migration Act 1958</em> (or if that Subclass ceases to exist, the kind of visa that replaces that Subclass)</li> </ul> </li> </ul>";
     if (CRM.vars.foreigndonors.domainId == 7) {
       fdHelpText = "<p>The Queensland <em>Electoral Act 1992</em> and <em>Local Government Electoral Act 2011</em> regulate political donations by minimising risk of corruption through the prohibition of certain donors. Property Developers and their associates for example are prohibited donors under these acts.</p>" + fdHelpText;
     }
     $("<style type='text/css'> .uitooltip { font-size: 0.75em; max-width: 300px;} </style>").appendTo("head");
     console.log($('i#foreigndonor-help'));
     console.log(CRM.$.ui.tooltip({ content: fdHelpText, items: "i#foreigndonor-help", tooltipClass: "uitooltip" }, $('i#foreigndonor-help')));
     console.log($('i#foreigndonor-help'));
     if ($('.prohibiteddonor-section').length) {
       $("<style type='text/css'> .uitooltip-prohibited { font-size: 0.75em; max-width: 600px;} </style>").appendTo("head");
       var pdHelpText = "<p>I confirm that I am not a prohibited donor engaged in property development, a tobacco business entity or a liquour or gambling business entity:</p>    <ul><li>1. property developer - I am not an individual or corporation:      <ul><li>(a)  that carries on a business mainly concerned with the residential or commercial development of land with the ultimate purpose of the sale or lease of the land for profit:        <ul><li>(i) who has made 1 relevant planning application, or someone has made the application on behalf of me, or a corporation that I work for, that is pending; or</li>          <li>(ii) who has made 3 or more relevant planning applications, or someone has made the applications on behalf of me, or a corporation that I work for that has been determined within the previous 7 years; or</li>          <li>(iii) who has engaged in any activity individually, or as a corporation for the dominant purpose of providing commercial premises where I, or my body corporate, or a related body corporate of my corporation is to carry on its business if my business sells or leases a substantial part of the premises; or</li>          <li>(iv) that is a close associate of a corporation set out in (a), (b) or (c) in this paragraph.</li></ul></li></ul></li>      <li>2. tobacco industry business entity - I am not:        <ul><li>(a) a corporation engaged in a business undertaking that is mainly concerned with the manufacture or sale of tobacco products; or</li>          <li>(b) a close associate of a corporation set out in (a) in this paragraph.</li>        </ul></li>      <li>3. liquor or gambling industry business entity - I am not:        <ul><li>(a) a corporation that is mainly concerned and has the ultimate purpose of making a profit from:          <ul><li>(i) the manufacture or sale of liquour products;</li>          <li>(ii) wagering, betting or other gambling (including the manufacture of machines used primarily for this purpose); or</li></ul>        </li>        <li>(b) a close associate of a corporation set out in (a) in this paragraph. </li></ul></li></ul><p>Close associate of an individual or corporation means I am not:</p>       <ul><li>(a) director or officer of the corporation or the spouse of such a director or officer,</li>            <li>(b) a related body corporate of the corporation,</li>            <li>(c) a person whose voting power in the corporation or a related body corporate of the corporation is greater than 20%, or the spouse of such a person,</li>            <li>(d) a corporation or a related body corporate of the corporation that is a stapled entity, the other stapled entity in relation to that stapled security,</li>            <li>(e) a person who holds more than 20% of the units in the trust of a unit trust if the corporation is a trustee, manager or responsible entity of a trust or a beneficiary of this trust,</li>            <li>(f) individually a person, or a corporation, that is a property developer in a joint venture or partnership with a property developer in connection with a relevant planning application made by or on behalf of the property developer who is likely to obtain a financial gain if the development would be, or is authorised by an approved planning application or is carried out.</li>            <li>(g) a spouse of the individual.</li>          </ul>";
        CRM.$.ui.tooltip({ content: pdHelpText, items: "i#prohibiteddonor-help", tooltipClass: "uitooltip-prohibited" }, $('i#prohibiteddonor-help'));
    }
  });
})(jQuery);
