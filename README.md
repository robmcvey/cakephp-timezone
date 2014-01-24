# CakePHP Timezone Helper Plugin

Generates a user-friendly dropdown which is based on a users Country and current time.

![screen](/timezone-screen.png)

### Installation

_[Manual]_

* Download this: [http://github.com/robmcvey/cakephp-timezone/zipball/master](http://github.com/robmcvey/cakephp-timezone/zipball/master)
* Unzip that download.
* Copy the resulting folder to `app/Plugin`
* Rename the folder you just copied to `Timezone`

_[GIT Submodule]_

In your app directory type:

```shell
git submodule add -b master git://github.com/robmcvey/cakephp-timezone.git Plugin/Timezone
git submodule init
git submodule update
```

_[GIT Clone]_

In your `Plugin` directory type:

```shell
git clone -b master git://github.com/robmcvey/cakephp-timezone.git Timezone
```

### Usage

Remember to add `CakePlugin::load('Timezone');` to your app's bootstrap file.

Then add the helper to any of your controllers using;

```php
public $helpers = array('Timezone.Timezone');
```

In your view, you can then show a timezone select from within a form. E.g.

```php
<?php 
echo $this->Form->create('Post');
	echo $this->Timezone->select('timezone');
echo $this->Form->end(__('Submit'));
```

### Generated markup

```html
<optgroup label="United Kingdom">
	<option value="Europe/London">GMT +1:00 (12:01pm)</option>
</optgroup>
<optgroup label="United States">
	<option value="Pacific/Honolulu">GMT -10:00 (1:01am)</option>
	<option value="America/New_York">GMT -4:00 (7:01am)</option>
	<option value="America/North_Dakota/New_Salem">GMT -5:00 (6:01am)</option>
	<option value="America/Shiprock">GMT -6:00 (5:01am)</option>
	<option value="America/Phoenix">GMT -7:00 (4:01am)</option>
	<option value="America/Yakutat">GMT -8:00 (3:01am)</option>
	<option value="America/Adak">GMT -9:00 (2:01am)</option>
</optgroup>
<optgroup label="United States Minor Outlying Islands">
	<option value="Pacific/Wake">GMT +12:00 (23:01pm)</option>
	<option value="Pacific/Johnston">GMT -10:00 (1:01am)</option>
	<option value="Pacific/Midway">GMT -11:00 (0:01am)</option>
</optgroup>
```
