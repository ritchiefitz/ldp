<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Slider Manager
 * Created by CMSMasters
 * 
 */


class cmsmsSliderManager {
    private $data;
    private $shortname;
	
    public function __construct() {
        global $wpdb, $shortname;
		
        $this->data = $wpdb;
        $this->shortname = $shortname;
    }
	
    public function insertSlider($name, $sliderOptions) {
        $res = $this->data->query($this->data->prepare("INSERT INTO " . $this->data->prefix . $this->shortname . "_sliders (name, slider) VALUES (%s, %s)", array($name, $sliderOptions)));
		
        return $this->data->insert_id;
    }
	
    public function updateSlider($id, $name, $sliderOptions) {
        $res = $this->data->query($this->data->prepare("UPDATE " . $this->data->prefix . $this->shortname . "_sliders SET slider=%s, name=%s  WHERE id=%d", array($sliderOptions, $name, $id)));
		
        return $res;
    }
	
    public function deleteSlider($id) {
        $res = $this->data->query($this->data->prepare("DELETE from " . $this->data->prefix . $this->shortname . "_sliders WHERE id=%d", $id));
		
        return $res;
    }
	
    public function getSliders() {
        $res = $this->data->get_results("SELECT id, name FROM " . $this->data->prefix . $this->shortname . "_sliders", ARRAY_A);
		
        return $res;
    }
	
    public function getSlider($id) {
        $res = $this->data->get_results($this->data->prepare("SELECT slider FROM " . $this->data->prefix . $this->shortname . "_sliders WHERE id=%d", $id), ARRAY_A);
		
        if (!empty($res)) {
            return $res[0];
        } else {
            return false;
        }
    }
}

