<?php
/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 * 
 * Slider Manager Controller
 * Created by CMSMasters
 * 
 */


class cmsmsSliderController {
    private $control;
    private $status;
	
    public function __construct() {
        $res = '';
        $this->control = new cmsmsSliderManager();
		
        if (isset($_POST['action']) && $_POST['action'] == 'insertSlider') {
            $name = $_POST['slider']['header']['slider_name'];
			
            if ($name != '') {
                $sliderOptions = json_encode($_POST['slider']);
                $res = $this->control->insertSlider($name, $sliderOptions);
				
                if ($res != false) {
                    $this->status = '{"status":"success","id":"' . $res . '"}';
                } else {
                    $this->status = '{"status":"error","msg":"DB error"}';
                }
            } else {
                $this->status = '{"status":"error","msg":"Please enter name"}';
            }
        }
		
        if (isset($_POST['action']) && $_POST['action'] == 'updateSlider') {
            $id = $_POST['id'];
            $name = $_POST['slider']['header']['slider_name'];
			
            if ($name != '' && $id != '') {
                $sliderOptions = json_encode($_POST['slider']);
                $res = $this->control->updateSlider($id, $name, $sliderOptions);
				
                if ($res != false) {
                    $this->status = '{"status":"success"}';
                } else {
                    $this->status = '{"status":"error","msg":"DB error"}';
                }
            } else {
                $this->status = '{"status":"error","msg":"Incorrect id or name"}';
            }
        }
		
        if (isset($_POST['action']) && $_POST['action'] == 'deleteSlider') {
            $id = $_POST['id'];
			
            if ($id != '') {
                $res = $this->control->deleteSlider($id);
				
                if ($res != false) {
                    $this->status = '{"status":"success"}';
                } else {
                    $this->status = '{"status":"error","msg":"DB error"}';
                }
            } else {
                $this->status = '{"status":"error","msg":"wrong id"}';
            }
        }
		
        if (isset($_POST['action']) && $_POST['action'] == 'getSlider') {
            $id = $_POST['id'];
            $res = $this->control->getSlider($id);
			
            print_r($res['slider']);
        }
		
        if (isset($_POST['action']) && $_POST['action'] == 'getSliders') {
            $res = $this->control->getSliders();
			
            if (!empty($res)) {
                $sliders = json_encode($res);
				
                echo $sliders;
            } else {
                $this->status = '{"status":"error","msg":"DB error"}';
            }
        }
		
        echo($this->status);
    }
}

