<?php
require 'color.php';

$original_color = '#ff0000';

$color = new Color($original_color);

$light_color = $color->get(.75, 'lighter'); // Getting color 75% lighter
$dark_color = $color->get(.5, 'darker'); // Getting color 50% darker

$textcolor = $color->get_textcolor();

?>
Original Color (<?php echo $original_color; ?>):
<div style="background-color:<?php echo $original_color; ?>;width:100px;height:100px;"></div>
<br/>

Lighter Color (<?php echo $light_color; ?>):
<div style="background-color:<?php echo $light_color; ?>;width:100px;height:100px;"></div>
<br/>

Darker Color (<?php echo $dark_color; ?>):
<div style="background-color:<?php echo $dark_color; ?>;width:100px;height:100px;"></div>
<br/>
Text color that fits on the original color (<?php echo $textcolor; ?>):<br/>
<div style="background-color:<?php echo $original_color; ?>;width:100px;height:100px;color:<?php echo $textcolor; ?>;font-size:90px;text-align:center">07</div>