<?php
class Color  {
    
    private $hex;
    
    public function __construct($hex) {
        $this->hex = $hex;
    }
    
    public function get($alpha, $type) {
        
        $steps = (($alpha*100)/100) * 255;
        if($type == 'darker') {
            $steps *= -1;
        }
        
        $steps = max(-255, min(255, $steps));

        $this->hex = str_replace('#', '', $this->hex);
        if (strlen($this->hex) == 3) {
            $this->hex = str_repeat(substr($this->hex,0,1), 2).str_repeat(substr($this->hex,1,1), 2).str_repeat(substr($this->hex,2,1), 2);
        }

        $r = hexdec(substr($this->hex,0,2));
        $g = hexdec(substr($this->hex,2,2));
        $b = hexdec(substr($this->hex,4,2));

        $r = max(0,min(255,$r + $steps));
        $g = max(0,min(255,$g + $steps));  
        $b = max(0,min(255,$b + $steps));

        $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
        $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
        $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

        return '#'.$r_hex.$g_hex.$b_hex;
    }
    
    public function get_textcolor() {
        $this->hex = str_replace('#', '', $this->hex);

        $c_r = hexdec(substr($this->hex, 0, 2));
        $c_g = hexdec(substr($this->hex, 2, 2));
        $c_b = hexdec(substr($this->hex, 4, 2));

        $b = (($c_r * 299) + ($c_g * 587) + ($c_b * 114)) / 1000;
        
        if($b > 130) {
            return '#000000';
        } else {
            return '#FFFFFF';
        }
    }
    
}
?>