# Timezone Helper

Generates a user-friendly dropdown which is based on a users Country and current time.

### Screenshot

![screen](/timezone-screen.png)

### Usuage

```php
$this->Timezone->select('input_name', $options, $attributes);
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
