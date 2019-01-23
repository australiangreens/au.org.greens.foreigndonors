# au.org.greens.foreigndonors

![Screenshot](/images/screenshot.png)

This extension adds a checkbox to CiviCRM Contribution and Event forms to enforce the affirmation of non-foreign donor status for contributors. This is required to satisfy recent changes to the Commonwealth Electoral Act (1918) regarding eligibility of donors to political parties and certain third parties in Australia.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM 4.7+

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.org.greens.foreigndonors@https://github.com/australiangreens/au.org.greens.foreigndonors/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/australiangreens/au.org.greens.foreigndonors.git
cv en foreigndonors
```

## Usage

The extension adds checkboxes to the settings forms for contributions and events. When ticked, the public-facing forms will include a mandatory checkbox. Contributions and event registrations cannot be made until unless this checkbox is ticked.

Every contribution created on a form including this checkbox will include a custom field specifying that non-foreign donor status was affirmed by the contributor.

## Known Issues


