/**
 * @package WordPress
 * @subpackage Willbridge
 * @since Willbridge 1.0
 */

/**
 * Slider Manager v3.0 - jQuery Slider Manager
 * 
 * (c) Copyright Steven "cmsmasters" Masters
 * http://cmsmastrs.net/
 * For sale on ThemeForest.net
 */

 
var sliderManager = { 
	_config : {}, 
	_oData : {}, 
	oSlide : {}, 
	slideCounter : 0, 
	categoryCounter : 0, 
	_oSlideInputId : {}, 
	pageConfig : function () { 
		this.config = { 
			responsiveSliderFields : { 
				header : { 
					'slider_name' : { 
						title : 'Slider Name', 
						value : '', 
						type : 'slider_name' 
					}, 
					'slider_type' : { 
						title : 'Slider type', 
						value : 'responsive', 
						type : 'hidden' 
					}, 
					'slider_id' : { 
						title : 'Slider id', 
						value : '', 
						type : 'hidden' 
					} 
				}, 
				footer : { 
					'animation-category' : { 
						description : 'Animation Settings', 
						'slider_height' : { 
							title : 'Slider Height (in percentage of slider width)', 
							value : '41', 
							min : '1', 
							max : '100', 
							step : '1', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'slider_animation' : { 
							title : 'Slider Animation Speed (in seconds)', 
							value : '0.6', 
							min : '0.1', 
							max : '999', 
							step : '0.1', 
							null : 'false', 
							type : 'spinner' 
						},
						'slider_pause' : { 
							title : 'Slider Pause Time (in seconds)', 
							value : '7', 
							min : '0.1', 
							max : '999', 
							step : '0.1', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'slider_effect' : { 
							title : 'Slider Animation Effect', 
							value : 'slide', 
							type : 'select', 
							select : { 
								'slide' : 'Slide', 
								'fadeSlide' : 'Fade-Slide', 
								'fade' : 'Fade' 
							} 
						}, 
						'slider_easing' : { 
							title : 'Slider Animation Easing', 
							value : 'easeInOutExpo', 
							type : 'select', 
							select : { 
								'linear' : 'None', 
								'easeInQuad' : 'Ease-In-Quad', 
								'easeOutQuad' : 'Ease-Out-Quad', 
								'easeInOutQuad' : 'Ease-In-Out-Quad', 
								'easeInCubic' : 'Ease-In-Cubic', 
								'easeOutCubic' : 'Ease-Out-Cubic', 
								'easeInOutCubic' : 'Ease-In-Out-Cubic', 
								'easeInQuart' : 'Ease-In-Quart', 
								'easeOutQuart' : 'Ease-Out-Quart', 
								'easeInOutQuart' : 'Ease-In-Out-Quart', 
								'easeInQuint' : 'Ease-In-Quint', 
								'easeOutQuint' : 'Ease-Out-Quint', 
								'easeInOutQuint' : 'Ease-In-Out-Quint', 
								'easeInSine' : 'Ease-In-Sine', 
								'easeOutSine' : 'Ease-Out-Sine', 
								'easeInOutSine' : 'Ease-In-Out-Sine', 
								'easeInExpo' : 'Ease-In-Expo', 
								'easeOutExpo' : 'Ease-Out-Expo', 
								'easeInOutExpo' : 'Ease-In-Out-Expo', 
								'easeInCirc' : 'Ease-In-Circ', 
								'easeOutCirc' : 'Ease-Out-Circ', 
								'easeInOutCirc' : 'Ease-In-Out-Circ', 
								'easeInElastic' : 'Ease-In-Elastic', 
								'easeOutElastic' : 'Ease-Out-Elastic', 
								'easeInOutElastic' : 'Ease-In-Out-Elastic', 
								'easeInBack' : 'Ease-In-Back', 
								'easeOutBack' : 'Ease-Out-Back', 
								'easeInOutBack' : 'Ease-In-Out-Back', 
								'easeInBounce' : 'Ease-In-Bounce', 
								'easeOutBounce' : 'Ease-Out-Bounce', 
								'easeInOutBounce' : 'Ease-In-Out-Bounce' 
							} 
						}, 
						'active_slide' : { 
							title : 'Active Slide', 
							value : '1', 
							min : '1',  
							max : '999', 
							step : '1', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'slides_caption': { 
							title : 'Show Slides Captions', 
							value : 'true', 
							type : 'checkbox' 
						} 
					}, 
					'controls-category' : { 
						description : 'Controls Settings', 
						'touch_controls' : { 
							title : 'Enable Touch Control', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'button_controls' : { 
							title : 'Enable Keyboard Buttons Control', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'slides_navigation' : { 
							title : 'Show Slides Navigation', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'arrow_navigation' : { 
							title : 'Show Arrow Navigation', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'slider_timer' : { 
							title : 'Show Timer', 
							value : 'false', 
							type : 'checkbox' 
						} 
					}, 
					'mouse-over-category' : { 
						description : 'MouseOver Settings', 
						'pause_on_hover' : { 
							title : 'Pause on Mouseover', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slides_navigation_hover' : { 
							title : 'Show Slides Navigation Only on Mouseover', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'arrow_navigation_hover' : { 
							title : 'Show Arrow Navigation Only on Mouseover', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slider_timer_hover' : { 
							title : 'Show Timer Only on Mouseover', 
							value : 'false', 
							type : 'checkbox' 
						} 
					} 
				} 
			}, 
			responsiveSlideFields : { 
				header : { 
					'upload_img' : { 
						title : 'Upload Image', 
						value : '', 
						type : 'upload_img' 
					}, 
					'slide_title' : { 
						title : 'Slider Name', 
						value : '', 
						type : 'slide_name' 
					} 
				}, 
				footer : { 
					'caption-category' : { 
						description : 'Caption Settings', 
						'show_caption' : { 
							title : 'Show Caption', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slide_caption_pos' : { 
							title : 'Caption Position', 
							value : 'right', 
							type : 'select', 
							select : { 
								'top' : 'Top', 
								'bottom' : 'Bottom', 
								'left' : 'Left', 
								'right' : 'Right' 
							} 
						}, 
						'caption_title' : { 
							title : 'Caption Title', 
							value : '', 
							type : 'text' 
						}, 
						'caption_subtitle' : { 
							title : 'Caption Subtitle', 
							value : '', 
							type : 'text' 
						}, 
						'caption_text' : { 
							title : 'Caption Text', 
							value : '', 
							type : 'textarea' 
						}, 
						'caption_link_enable' : { 
							title : 'Enable Caption Link/Button', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slide_caption_text_or_button' : { 
							title : 'Use Text Link/Button', 
							value : 'true', 
							type : 'select', 
							select : { 
								'button' : 'Use Button', 
								'link' : 'Use Text Link' 
							} 
						}, 
						'slide_caption_url_text' : { 
							title : 'Link/Button Text', 
							value : '', 
							type : 'text' 
						}, 
						'slide_link_text_value' : { 
							title : 'Link/Button URL', 
							value : '', 
							type : 'text' 
						}, 
						'slide_link_target' : { 
							title : 'Open Link In New Tab', 
							value : 'false', 
							type : 'checkbox' 
						} 
					}, 
					'video-category' : { 
						description : 'Video Settings', 
						'slide_add_video' : { 
							title : 'Add Video To Slide', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slide_video_url' : { 
							title : 'Video URL', 
							value : '', 
							type : 'text' 
						} 
					}, 
					'image-category' : { 
						description : 'Slide Image Settings', 
						'slide_img_pos' : { 
							title : 'Slide Image Size & Position', 
							value : 'fullwidth', 
							type : 'select', 
							select : { 
								'full-img' : 'Full Width Slide Image', 
								'left-img' : 'Left Slide Image', 
								'right-img' : 'Right Slide Image' 
							} 
						}, 
						'slide_as_link_add' : { 
							title : 'Use Slide Image As Link', 
							value : 'false', 
							type : 'checkbox' 
						}, 
						'slide_as_link_url' : { 
							title : 'Slide Image Link URL', 
							value : '', 
							type : 'text' 
						}, 
						'slide_as_link_target' : { 
							title : 'Open Slide Image Link In New Tab', 
							value : 'false', 
							type : 'checkbox' 
						} 
					} 
				} 
			}, 
			revolutionSliderFields : { 
			   header : { 
					'slider_name' : { 
						title : 'Slider Name', 
						value : '', 
						type : 'slider_name' 
					}, 
					'slider_type' : { 
						title : 'Slider type', 
						value : 'revolution', 
						type : 'hidden' 
					}, 
					'slider_id' : { 
						title : 'Slider id', 
						value : '', 
						type : 'hidden' 
					} 
				}, 
				footer : { 
					'revolution-animation-category' : { 
						description : 'Animation Settings', 
						'revolution_slider_height' : { 
							title : 'Slider Height', 
							value : '493', 
							min : '5', 
							max : '10000', 
							step : '5', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'revolution_slider_delay' : { 
							title : 'Slider Pause Time (in seconds)', 
							value : '7', 
							min : '0.1', 
							max : '999', 
							step : '0.1', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'revolution_slider_navi' : { 
							title : 'Slider Navigation', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'revolution_slider_touch' : { 
							title : 'Enable Touch Control', 
							value : 'true', 
							type : 'checkbox' 
						}, 
						'revolution_slider_timer' : { 
							title : 'Show Timer', 
							value : 'false', 
							type : 'checkbox' 
						} 
					}, 
					'revolution-hover-category' : { 
						description : 'Mouseover Settings', 
						'revolution_slider_pause_on_hover' : { 
							title : 'Pause on Mouseover', 
							value : 'true', 
							type : 'checkbox' 
						} 
					} 
				} 
			}, 
			revolutionSlideFields : { 
				header : { 
					'upload_img' : { 
						title : 'Upload Image', 
						value : '', 
						type : 'upload_img' 
					}, 
					'slide_title' : { 
						title : 'Slider Name', 
						value : '', 
						type : 'slide_name' 
					} 
				}, 
				footer : { 
					'animation-cat' : { 
						description : 'Animation Settings', 
						'slide_img_transition' : { 
							title : 'Slide Image Animation Type', 
							value : 'boxfade', 
							type : 'select', 
							select : { 
								'boxfade' : 'Box Fade', 
								'boxslide' : 'Box Slide', 
								'slotzoom-horizontal' : 'Slot Zoom Horizontal', 
								'slotslide-horizontal' : 'Slot Slide Horizontal', 
								'slotfade-horizontal' : 'Slot Fade Horizontal', 
								'slotzoom-vertical' : 'Slot Zoom Vertical', 
								'slotslide-vertical' : 'Slot Slide Vertical', 
								'slotfade-vertical' : 'Slot Fade Vertical', 
								'curtain-1' : 'Curtain First', 
								'curtain-2' : 'Curtain Second', 
								'curtain-3' : 'Curtain Third', 
								'slideup' : 'Slide Up', 
								'slidedown' : 'Slide Down', 
								'slideleft' : 'Slide Left', 
								'slideright' : 'Slide Right', 
								'fade' : 'Fade' 
							} 
						}, 
						'slide_slot_amount' : { 
							title : 'Slide Image Animation Slot Amount', 
							value : '7', 
							min : '1', 
							max : '50', 
							step : '1', 
							null : 'false', 
							type : 'spinner' 
						}, 
						'slide_pause' : { 
							title : 'Slide Custom Pause Time (in seconds)', 
							value : '0', 
							min : '0', 
							max : '100', 
							step : '0.1', 
							null : 'true', 
							type : 'spinner' 
						} 
					}, 
					'link-cat' : { 
						description : 'Slide Link Settings', 
						'slide_link' : { 
							title : 'Slide Link URL', 
							value : '', 
							type : 'text' 
						} 
					},  
					'border-cat' : { 
						'border_field' : { 
							title : '', 
							value : '', 
							type : 'hidden' 
						} 
					} 
				} 
			}, 
			revolutionSlideCats : { 
				image : { 
					description : 'Image', 
					'upload_img' : { 
						title : 'Upload Image', 
						value : '', 
						type : 'upload_img' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'image', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				}, 
				heading1 : { 
					description : 'Heading 1',
					'slide_obj_heading_1_text' : { 
						title : 'Heading Text', 
						value : '', 
						type : 'text', 
						wrapper : 'custom-textarea' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_width' : { 
						title : 'Heading Width', 
						value : 'w35', 
						type : 'select', 
						select : { 
							'w5' : '5%', 
							'w10' : '10%', 
							'w15' : '15%', 
							'w20' : '20%', 
							'w25' : '25%', 
							'w30' : '30%', 
							'w35' : '35%', 
							'w40' : '40%', 
							'w45' : '45%', 
							'w50' : '50%', 
							'w55' : '55%', 
							'w60' : '60%', 
							'w65' : '65%', 
							'w70' : '70%', 
							'w75' : '75%', 
							'w80' : '80%', 
							'w85' : '85%', 
							'w90' : '90%', 
							'w95' : '95%', 
							'w100' : '100%' 
						}, 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'heading1', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				}, 
				heading2 : { 
					description : 'Heading 2',
					'slide_obj_heading_2_text' : { 
						title : 'Heading Text', 
						value : '', 
						type : 'text', 
						wrapper : 'custom-textarea' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_width' : { 
						title : 'Heading Width', 
						value : 'w35', 
						type : 'select', 
						select : { 
							'w5' : '5%', 
							'w10' : '10%', 
							'w15' : '15%', 
							'w20' : '20%', 
							'w25' : '25%', 
							'w30' : '30%', 
							'w35' : '35%', 
							'w40' : '40%', 
							'w45' : '45%', 
							'w50' : '50%', 
							'w55' : '55%', 
							'w60' : '60%', 
							'w65' : '65%', 
							'w70' : '70%', 
							'w75' : '75%', 
							'w80' : '80%', 
							'w85' : '85%', 
							'w90' : '90%', 
							'w95' : '95%', 
							'w100' : '100%' 
						}, 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'heading2', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				}, 
				heading3 : { 
					description : 'Heading 3',
					'slide_obj_heading_3_text' : { 
						title : 'Colored Heading Text', 
						value : '', 
						type : 'text', 
						wrapper : 'custom-textarea' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_width' : { 
						title : 'Heading Width', 
						value : 'w35', 
						type : 'select', 
						select : { 
							'w5' : '5%', 
							'w10' : '10%', 
							'w15' : '15%', 
							'w20' : '20%', 
							'w25' : '25%', 
							'w30' : '30%', 
							'w35' : '35%', 
							'w40' : '40%', 
							'w45' : '45%', 
							'w50' : '50%', 
							'w55' : '55%', 
							'w60' : '60%', 
							'w65' : '65%', 
							'w70' : '70%', 
							'w75' : '75%', 
							'w80' : '80%', 
							'w85' : '85%', 
							'w90' : '90%', 
							'w95' : '95%', 
							'w100' : '100%' 
						}, 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'heading3', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				}, 
				butn : { 
					description : 'Button', 
					'slide_obj_button_text' : { 
						title : 'Button Text', 
						value : '', 
						type : 'text', 
						wrapper : 'button-link' 
					}, 
					'slide_obj_button_link' : { 
						title : 'Button Link', 
						value : '', 
						type : 'text', 
						wrapper : 'button-link' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_button_size' : { 
						title : 'Button Size', 
						value : 'button_large', 
						type : 'select', 
						select : { 
							'button' : 'Standard', 
							'button_medium' : 'Medium', 
							'button_large' : 'Large' 
						}, 
						wrapper : 'button-size' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'butn', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				}, 
				video : { 
					description : 'Video',
					'slide_obj_video_url' : { 
						title : 'Video URL', 
						value : '', 
						type : 'text', 
						wrapper : 'custom-textarea' 
					}, 
					'slide_obj_remove_button' : { 
						title : '', 
						value : '', 
						type : 'rm_button' 
					}, 
					'slide_obj_width' : { 
						title : 'Text Width', 
						value : 'w35', 
						type : 'select', 
						select : { 
							'w5' : '5%', 
							'w10' : '10%', 
							'w15' : '15%', 
							'w20' : '20%', 
							'w25' : '25%', 
							'w30' : '30%', 
							'w35' : '35%', 
							'w40' : '40%', 
							'w45' : '45%', 
							'w50' : '50%', 
							'w55' : '55%', 
							'w60' : '60%', 
							'w65' : '65%', 
							'w70' : '70%', 
							'w75' : '75%', 
							'w80' : '80%', 
							'w85' : '85%', 
							'w90' : '90%', 
							'w95' : '95%', 
							'w100' : '100%' 
						}, 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_width' : { 
						title : 'Video Width', 
						value : '640', 
						min : '5', 
						max : '10000', 
						step : '5', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_height' : { 
						title : 'Video Height', 
						value : '360', 
						min : '5', 
						max : '10000', 
						step : '5', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'custom-size' 
					}, 
					'slide_obj_position_top' : { 
						title : 'Position Top', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_position_left' : { 
						title : 'Position Left', 
						value : '0', 
						min : '0', 
						max : '1000000', 
						step : '5', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-position' 
					}, 
					'slide_obj_cat_type' : { 
						title : '', 
						value : 'video', 
						type : 'hidden' 
					}, 
					'slide_obj_animation_type' : { 
						title : 'Animation Type', 
						value : 'lfb', 
						type : 'select', 
						select : { 
							'sft' : 'Short from Top', 
							'sfb' : 'Short from Bottom', 
							'sfr' : 'Short from Right', 
							'sfl' : 'Short from Left', 
							'lft' : 'Long from Top', 
							'lfb' : 'Long from Bottom', 
							'lfr' : 'Long from Right', 
							'lfl' : 'Long from Left', 
							'fade' : 'Fade In' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_easing' : { 
						title : 'Animation Easing', 
						value : 'easeOutBack', 
						type : 'select', 
						select : { 
							'linear' : 'None', 
							'easeInQuad' : 'Ease-In-Quad', 
							'easeOutQuad' : 'Ease-Out-Quad', 
							'easeInOutQuad' : 'Ease-In-Out-Quad', 
							'easeInCubic' : 'Ease-In-Cubic', 
							'easeOutCubic' : 'Ease-Out-Cubic', 
							'easeInOutCubic' : 'Ease-In-Out-Cubic', 
							'easeInQuart' : 'Ease-In-Quart', 
							'easeOutQuart' : 'Ease-Out-Quart', 
							'easeInOutQuart' : 'Ease-In-Out-Quart', 
							'easeInQuint' : 'Ease-In-Quint', 
							'easeOutQuint' : 'Ease-Out-Quint', 
							'easeInOutQuint' : 'Ease-In-Out-Quint', 
							'easeInSine' : 'Ease-In-Sine', 
							'easeOutSine' : 'Ease-Out-Sine', 
							'easeInOutSine' : 'Ease-In-Out-Sine', 
							'easeInExpo' : 'Ease-In-Expo', 
							'easeOutExpo' : 'Ease-Out-Expo', 
							'easeInOutExpo' : 'Ease-In-Out-Expo', 
							'easeInCirc' : 'Ease-In-Circ', 
							'easeOutCirc' : 'Ease-Out-Circ', 
							'easeInOutCirc' : 'Ease-In-Out-Circ', 
							'easeInElastic' : 'Ease-In-Elastic', 
							'easeOutElastic' : 'Ease-Out-Elastic', 
							'easeInOutElastic' : 'Ease-In-Out-Elastic', 
							'easeInBack' : 'Ease-In-Back', 
							'easeOutBack' : 'Ease-Out-Back', 
							'easeInOutBack' : 'Ease-In-Out-Back', 
							'easeInBounce' : 'Ease-In-Bounce', 
							'easeOutBounce' : 'Ease-Out-Bounce', 
							'easeInOutBounce' : 'Ease-In-Out-Bounce' 
						}, 
						wrapper : 'button-animation' 
					}, 
					'slide_obj_animation_speed' : { 
						title : 'Animation Speed (in seconds)', 
						value : '0.5', 
						min : '0.1', 
						max : '100', 
						step : '0.1', 
						null : 'false', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					}, 
					'slide_obj_animation_pause' : { 
						title : 'Animation Pause Before Show (in seconds)', 
						value : '0.3', 
						min : '0', 
						max : '100', 
						step : '0.1', 
						null : 'true', 
						type : 'spinner', 
						wrapper : 'button-speed' 
					} 
				} 
			} 
		} 
	}, 
	init : function () { 
		sliderManager.actionUri = jQuery('#actionUri').val();
		sliderManager.slideCounter = jQuery('#slideCounter').val();
		sliderManager.categoryCounter = jQuery('#categoryCounter').val();
		
		sliderManager._config = new sliderManager.pageConfig().config;
		
		sliderManager._registerEvents();
	}, 
	initConfig : function () { 
		sliderManager._config = new sliderManager.pageConfig().config;
		
		jQuery.ajaxSetup( { 
			async : false 
		} );
	}, 
	sortableInit : function () { 
		jQuery('#sortable_slides').sortable( { 
			handle : '[name="sortableImg"]', 
			cursor : 'move' 
		} );
	}, 
	sortableObjectInit : function () { 
		jQuery('.slide_footer').each(function () { 
			jQuery(this).sortable( { 
				items : '> div.sortable_cat', 
				cursor : 'move' 
			} );
		} );
	}, 
	hidingInit : function () { 
        jQuery('input[name="show_caption"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
                jQuery(this).parent().parent().nextAll().hide();
            }
        } );
        
        jQuery('input[name="caption_link_enable"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
                jQuery(this).parent().parent().nextAll().hide();
            }
        } );
        
        jQuery('input[name="slide_add_video"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
                jQuery(this).parent().parent().nextAll().hide();
            }
        } );
        
        jQuery('input[name="slide_as_link_add"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
                jQuery(this).parent().parent().nextAll().hide();
            }
        } );
        
        jQuery('input[name="slides_navigation"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
				jQuery('input[name="slides_navigation_hover"]').parent().parent().hide();
            }
        } );
		
        jQuery('input[name="arrow_navigation"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
				jQuery('input[name="arrow_navigation_hover"]').parent().parent().hide();
            }
        } );
        
        jQuery('input[name="slider_timer"]').each(function () { 
            if (!(jQuery(this).is(':checked'))) {
				jQuery('input[name="slider_timer_hover"]').parent().parent().hide();
            }
        } );
        
        jQuery('select[name="revolution_slider_nav"]').each(function () { 
            if (jQuery(this).val() !== 'thumb') {
				jQuery(this).parent().nextAll().hide();
            }
        } );
        
	},
	hidingEvents : function () { 
        jQuery(document).delegate('input[name="show_caption"]', 'change', function () { 
            if (!(jQuery(this).is(':checked'))) {
				jQuery(this).parent().parent().nextAll().hide();
			} else {
				jQuery(this).parent().parent().parent().find('select[name="slide_caption_pos"]').parent().show();
				jQuery(this).parent().parent().parent().find('input[name="caption_title"]').parent().show();
				jQuery(this).parent().parent().parent().find('input[name="caption_subtitle"]').parent().show();
				jQuery(this).parent().parent().parent().find('textarea[name="caption_text"]').parent().show();
				jQuery(this).parent().parent().parent().find('input[name="caption_link_enable"]').parent().parent().show();
				
				if (!(jQuery(this).parent().parent().parent().find('input[name="caption_link_enable"]').is(':checked'))) {
					jQuery(this).parent().parent().parent().find('select[name="slide_caption_text_or_button"]').parent().hide();
					jQuery(this).parent().parent().parent().find('input[name="slide_caption_url_text"]').parent().hide();
					jQuery(this).parent().parent().parent().find('input[name="slide_link_text_value"]').parent().hide();
					jQuery(this).parent().parent().parent().find('input[name="slide_link_target"]').parent().parent().hide();
				} else {
					jQuery(this).parent().parent().parent().find('select[name="slide_caption_text_or_button"]').parent().show();
					jQuery(this).parent().parent().parent().find('input[name="slide_caption_url_text"]').parent().show();
					jQuery(this).parent().parent().parent().find('input[name="slide_link_text_value"]').parent().show();
					jQuery(this).parent().parent().parent().find('input[name="slide_link_target"]').parent().parent().show();
				}
			}
        } );
		
        jQuery(document).delegate('input[name="caption_link_enable"]', 'change', function () { 
            jQuery(this).parent().parent().nextAll().toggle();
        } );
		
        jQuery(document).delegate('input[name="slide_add_video"]', 'change', function () { 
            jQuery(this).parent().parent().nextAll().toggle();
        } );
		
        jQuery(document).delegate('input[name="slide_as_link_add"]', 'change', function () { 
            jQuery(this).parent().parent().nextAll().toggle();
        } );
		
        jQuery(document).delegate('input[name="slides_navigation"]', 'change', function () { 
            jQuery('input[name="slides_navigation_hover"]').parent().parent().toggle();
        } );
		
        jQuery(document).delegate('input[name="arrow_navigation"]', 'change', function () { 
            jQuery('input[name="arrow_navigation_hover"]').parent().parent().toggle();
        } );
		
        jQuery(document).delegate('input[name="slider_timer"]', 'change', function () { 
            jQuery('input[name="slider_timer_hover"]').parent().parent().toggle();
        } );
		
        jQuery(document).delegate('select[name="revolution_slider_nav"]', 'change', function () { 
			if (jQuery(this).val() === 'thumb') {
				jQuery(this).parent().nextAll().show();
			} else {
				jQuery(this).parent().nextAll().hide();
			}
        } );
		
	},
	_registerEvents : function () { 
		jQuery(document).delegate('.slide_title_text', 'click', function () { 
			jQuery(this).hide();
			jQuery(this).next().show().focus();
		} );
		
		jQuery(document).delegate('.slide_title_input', 'focusin', function () { 
			if (jQuery(this).val() === 'You can enter slide name here') {
				jQuery(this).val('');
			}
		} );
		
		jQuery(document).delegate('.slide_title_input', 'focusout', function () { 
			if (jQuery(this).val() === '') { 
				jQuery(this).val('You can enter slide name here');
			}
		} );
		
		jQuery(document).delegate('.slide_title_input', 'blur', function () { 
			var title_name = jQuery(this).val();
			
			jQuery(this).hide();
			jQuery(this).prev().text(title_name);
			jQuery(this).prev().show();
		} );
		
		jQuery(document).delegate('[name="slide_upload_button"], [class="img_choose_image"]', 'click', function () { 
			sliderManager._oSlideInputId = jQuery(this).parent().find('.upload_img_link');
			
			tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			
			return false;
		} );
		
		jQuery(document).delegate('.img_remove', 'click', function () { 
			jQuery(this).parent().parent().find('>input[type="hidden"]').val('');
			
			jQuery(this).parent().removeAttr('style').find('>img').fadeOut('fast', function () { 
				jQuery(this).remove();
			} );
			
			jQuery(this).remove();
			
			return false;
		} );
		
		window.send_to_editor = function (html) { 
			var imgurl = jQuery('img', html).attr('src'), 
				input = sliderManager._oSlideInputId, 
				actionUri = jQuery('#actionUri').val();
			
			jQuery(input).val(imgurl);
			jQuery(input).parent().find('.img_choose_image').replaceWith('<div class="img_choose_image" style="background:none; position:relative;">' + 
				'<img src="' + imgurl + '" alt="" style="width:100%; position:absolute; top:0; left:0;" />' + 
				'<a href="#" class="img_remove" title="Remove Image">Remove Image</a>' + 
			'</div>');
			
			tb_remove();
		}
		
		jQuery('#addSlider').click(function () { 
			jQuery(this).next().next().next().find('img.submit_loader').show();
			
			var slider_name = prompt('Please enter slider name');
			
			if (slider_name === '' || slider_name === null) {
				jQuery(this).next().next().next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			sliderManager.initConfig();
			
			var type = jQuery('#slider_type_selection').val();
			
			sliderManager.createSlider(type);
			
			sliderManager.sortableInit();
			sliderManager.hidingInit();
			sliderManager.hidingEvents();
			
			jQuery('[name="slider_name"]').val(slider_name);
			
			jQuery(this).hide();
			jQuery('#slider_type_selection').hide();
			jQuery('#cancel_slider').show();
			
			jQuery(this).next().next().next().find('img.submit_loader').fadeOut('fast');
		} );
		
		jQuery(document).delegate('#cancel_slider', 'click', function () { 
			jQuery(this).next().find('img.submit_loader').show();
			
			if (confirm('Are you sure? All data will be lost.') === false) {
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			jQuery('.clsep').slideUp('fast', function () { 
				jQuery('#slider_manager_tab').empty();
			} );
			
			jQuery('#cancel_slider').hide();
			jQuery('#saveAsSlider').hide();
			jQuery('#slider_type_selection').show();
			jQuery('#addSlider').show();
			
			jQuery(this).next().find('img.submit_loader').fadeOut('fast');
		} );
		
		jQuery('#editSlider').click(function () { 
			jQuery(this).next().find('img.submit_loader').show();
			
			var id = jQuery('#sliderChoose').val();
			
			if (jQuery('[name="slider_id"]').val() === id && id !== '') {
				alert('You are already editing this slider');
				
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			} else if (id === '') {
				alert('Please select your slider or create a new');
				
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			if (!jQuery('#slider_manager_tab').is(':empty')) {
				if (confirm('Are you sure? All data will be lost.') === false) {
					jQuery(this).next().find('img.submit_loader').fadeOut('fast');
					
					return false;
				}
			}
			
			sliderManager.loadDataHandler(id);
		} );
		
		jQuery('#deleteSlider').click(function () { 
			jQuery(this).next().find('img.submit_loader').show();
			
			var id = jQuery('#sliderChoose').val();
			
			if (id === '') {
				alert('Choose slider to delete');
				
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			if (confirm('Are you sure? All data will be lost.') === false) {
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			sliderManager.deleteDataHandler(id);
			
			var curr_id = jQuery('[name="slider_id"]').val();
			
			if (id === curr_id) {
				jQuery('.clsep').slideUp('fast', function () { 
					jQuery('#slider_manager_tab').empty();
				} );
				
				jQuery('#addSlider').show();
				jQuery('#saveAsSlider').hide();
				jQuery('#cancel_slider').hide();
				jQuery('#slider_type_selection').show();
			}
			
			jQuery('html, body').animate( { 
				scrollTop : 0 
			}, 300);
			
			jQuery(this).next().find('img.submit_loader').fadeOut('fast');
			
			jQuery('#settings_error').slideDown('fast').delay(1000).slideUp('slow');
		} );
		
		jQuery(document).delegate('#saveAsSlider', 'click', function () { 
			jQuery(this).next().find('img.submit_loader').show();
			
			var id = jQuery('[name="slider_id"]').val(), 
				sn = prompt('Please enter slider name');
			
			if (sn === null || sn === '') {
				jQuery(this).next().find('img.submit_loader').fadeOut('fast');
				
				return false;
			}
			
			jQuery('[name="slider_name"]').val(sn);
			
			sliderManager.saveDataHandler();
			
			jQuery('.clsep').slideUp('fast', function () { 
				jQuery('#slider_manager_tab').empty();
			} );
			
			jQuery(this).hide();
			jQuery('#cancel_slider').hide();
			jQuery('#slider_type_selection').show();
			jQuery('#addSlider').show();
			
			jQuery('html, body').animate( { 
				scrollTop : 0 
			}, 300);
			
			jQuery(this).next().find('img.submit_loader').fadeOut('fast');
			
			jQuery('#settings_save').slideDown('fast').delay(1000).slideUp('slow');
		} );
		
		jQuery(document).delegate('#save_slider, #save_slider_top', 'click', function () { 
			jQuery(this).next().find('img.submit_loader').show();
			
			var id = jQuery('[name="slider_id"]').val();
			
			if (id === '') {
				sliderManager.saveDataHandler();
			} else {
				sliderManager.updateDataHandler();
			}
			
			jQuery('.clsep').slideUp('fast', function () { 
				jQuery('#slider_manager_tab').empty();
			} );
			
			jQuery('#cancel_slider').hide();
			jQuery('#saveAsSlider').hide();
			jQuery('#slider_type_selection').show();
			jQuery('#addSlider').show();
			
			jQuery('html, body').animate( { 
				scrollTop : 0 
			}, 300);
			
			jQuery(this).next().find('img.submit_loader').fadeOut('fast');
			
			jQuery('#settings_save').slideDown('fast').delay(1000).slideUp('slow');
		} );
		
		jQuery(document).delegate('#add_slide', 'click', function () { 
			sliderManager.initConfig();
			
			var type = jQuery('[name="slider_type"]').val();
			
			sliderManager.createSlide(type);
			sliderManager.sortableInit();
			sliderManager.hidingInit();
		} );
		
		jQuery(document).delegate('[name="delete_slide"]', 'click', function () { 
			if (confirm('Are you sure? This slide data will be lost.') === false) {
				return false;
			}
			
			jQuery(this).parent().parent().fadeOut('fast', function () { 
				jQuery(this).remove();
			} );
		} );
		
		jQuery(document).delegate('[name="add_category"]', 'click', function () { 
			sliderManager.initConfig();
			
			var type = jQuery('[name="slider_type"]').val(), 
				cat_type = jQuery(this).prev().val(), 
				cat = sliderManager._config.revolutionSlideCats[cat_type], 
				parentid = jQuery(this).parent().prev();
			
			sliderManager.createCategory(type, cat, cat_type, parentid);
			sliderManager.sortableObjectInit();
			sliderManager.hidingInit();
		} );
		
		jQuery(document).delegate('[name="delete_object"]', 'click', function () { 
			if (confirm('Are you sure? This object data will be lost.') === false) {
				return false;
			}
			
			jQuery(this).parent().fadeOut('fast', function () { 
				jQuery(this).remove();
			} );
		} );
		
		jQuery(document).delegate('[name="expand_slide_button"]', 'click', function () { 
			jQuery(this).hide();
			jQuery(this).next().show();
			jQuery(this).parent().next().slideDown('fast');
			jQuery(this).parent().next().next().slideDown('fast');
			
			sliderManager.hidingInit();
			sliderManager.sortableObjectInit();
		} );
		
		jQuery(document).delegate('[name="hide_slide_button"]', 'click', function () { 
			jQuery(this).hide();
			jQuery(this).prev().show();
			jQuery(this).parent().next().slideUp('fast');
			jQuery(this).parent().next().next().slideUp('fast');
		} );
		
		jQuery(document).delegate('[name="max_all"]', 'click', function () { 
			jQuery('.slide_footer').slideDown('fast');
			jQuery('.add_cat_wrapper').slideDown('fast');
			
			jQuery('[name="expand_slide_button"]').each(function () { 
				jQuery(this).hide();
			} );
			
			jQuery('[name="hide_slide_button"]').each(function () { 
				jQuery(this).show();
			} );
			
			sliderManager.hidingInit();
			sliderManager.sortableObjectInit();
		} );
		
		jQuery(document).delegate('[name="min_all"]', 'click', function () { 
			jQuery('.slide_footer').slideUp('fast');
			jQuery('.add_cat_wrapper').slideUp('fast');
			
			jQuery('[name="expand_slide_button"]').each(function () { 
				jQuery(this).show();
			} );
			
			jQuery('[name="hide_slide_button"]').each(function () { 
				jQuery(this).hide();
			} );
		} );
	}, 
	createSlider : function (type) { 
		jQuery('#slideCounter').val(0);
		jQuery('#categoryCounter').val(0);
		
		var c = jQuery('#categoryCounter').val(), 
			sf = sliderManager._config[type + 'SliderFields'], 
			data, 
			id, 
			option, 
			i;
		
		sliderManager.createSliderHtml(type);
		
		for (i in sf.header) {
		   data = sf.header[i];
		   id = i;
		   option = sliderManager.createOption(data, id, c);
		   
		   jQuery('#slider_header_content').append(option);
		}
		
		for (i in sf.footer) {
			sliderManager.createCategory(type, sf.footer[i], i, '#slider_footer_content');
		}
		
		sliderManager.createSlide(type);
		
		jQuery('#slider_manager_tab').parent().slideDown('fast');
	}, 
	createSlide : function (type) { 
		var sl = sliderManager._config[type + 'SlideFields'], 
			c = jQuery('#slideCounter').val(), 
			data, 
			id, 
			option, 
			i;
		
		sliderManager.createSlideHtml(type, c);
		
		for (i in sl.header) {
		   data = sl.header[i];
		   id = i;
		   option = sliderManager.createOption(data, id, c);
		   
		   jQuery('#slide' + c + ' .slide_header').append(option);
		}
		
		for (i in sl.footer) {
			sliderManager.createCategory(type, sl.footer[i], i, '#slide' + c + ' .slide_footer');
		}
		
		jQuery('#slideCounter').val(Number(c) + 1);
	}, 
	createCategory : function (type, data, name, parentid) { 
		var c = jQuery('#categoryCounter').val(), 
			cat, 
			div, 
			option, 
			x;
		
		if (data.customdescription === undefined || data.customdescription === 'undefined') {
			data.customdescription = '';
		}
		
		if (data.description === undefined || data.description === 'undefined') {
			data.description = '';
		}
		
		div = '<div id="' + name + '_' + c + '" class="' + name + ' saved_cat' + ((name === 'image' || name === 'heading1' || name === 'heading2' || name === 'heading3' || name === 'butn' || name === 'video') ? ' sortable_cat' : '') + '" style="display:none;">' + 
			((data.description === '') ? '' : '<h4>' + data.description + '</h4>') + 
			data.customdescription + 
		'</div>';
		
		jQuery(parentid).append(div);
		
		jQuery(parentid).find('#' + name + '_' + c).slideDown('fast');
		
		for (x in data) {
			if (x !== 'description' && x !== 'customdescription') {
				option = sliderManager.createOption(data[x], x, c);
				
				if (data[x]['wrapper'] === undefined || data[x]['wrapper'] === 'undefined') {
					jQuery('#' + name + '_' + c).append(option);
				} else {
					if (jQuery('#' + name + '_' + c + ' .' + data[x]['wrapper']).length === 0) {
						jQuery('#' + name + '_' + c).append('<div class="' + data[x]['wrapper'] + '"></div>');
					}
					
					jQuery('#' + name + '_' + c + ' .' + data[x]['wrapper']).append(option);
				}
			}
		}
		
		jQuery('#categoryCounter').val(Number(c) + 1);
	}, 
	createOption : function (data, id, c) { 
		if (c === undefined) {
			var c = '';
		}
		
		var actionUri = jQuery('#actionUri').val(), 
			input, 
			temp = '';
		
		data.value = sliderManager.stripslashes(data.value);
		
		switch (data.type) {
		case 'text':
			input = '<div class="text_wrapper">' + 
				'<div class="cl"></div>' + 
				'<span class="label">' + data.title + '</span>' + 
				'<div class="cl"></div>' + 
				'<input id="' + id + c + '" name="' + id + '" type="text" class="saved_value" value="' + data.value + '" size="50" />' + 
				'<div class="cl"></div>' + 
			'</div>';
		break;
		case 'textarea':
			input = '<div class="text_wrapper">' + 
				'<div class="cl"></div>' + 
				'<span class="label">' + data.title + '</span>' + 
				'<div class="cl"></div>' + 
				'<textarea id="' + id + c + '" name="' + id + '" class="saved_value">' + data.value + '</textarea>' + 
				'<div class="cl"></div>' + 
			'</div>';
		break;
		case 'checkbox':
			var checked = '';
			
			if (data.value === 'true') {
				checked = ' checked="checked"';
			}
			
			input = '<div class="checkbox_wrapper">' + 
				'<div class="cl"></div>' + 
				'<div class="check_parent">' + 
					'<input name="' + id + '" id="' + id + c + '"' + checked + ' type="checkbox" class="saved_value" />' + 
					'<label for="' + id + c + '" style="margin:14px 0;">' + 
						'<span class="labelon">' + data.title + '</span>' + 
					'</label>' + 
				'</div>' + 
			'</div>';
		break;
		case 'upload_img':
			input = '<div class="upload_img_wrapper">' + 
				'<input type="hidden" class="upload_img_link saved_value" name="upload_img" value="' + data.value + '" />' + 
				'<input id="' + id + c + '" class="upload" type="button" name="slide_upload_button" value="Upload Image" />';
			
			if (data.value !== '') {
				input += '<div class="img_choose_image" style="background:none; position:relative;">' + 
					'<img src="' + data.value + '" alt="" style="width:100%; position:absolute; top:0; left:0;" />' + 
					'<a href="#" class="img_remove" title="Remove Image">Remove Image</a>' + 
				'</div>';
			} else {
				input += '<div class="img_choose_image"></div>';
			}
			
			input += '</div>';
		break;
		case 'hidden':
			input = '<input type="hidden" value="' + data.value + '" name="' + id + '" id="' + id + c + '" class="saved_value" />';
		break;
		case 'select':
			input = '<div class="select_wrapper" style="margin-bottom:20px; overflow:hidden;">' + 
				'<span class="label" style="margin:0 0 10px;">' + data.title + '</span>' + 
				'<div class="cl"></div>' + 
				'<select name="' + id + '" id="' + id + c + '" class="saved_value">';
			
			for (var i in data.select) {
				if (data.value !== '' && i === data.value) {
					input += '<option value="' + i + '" selected="selected">' + data.select[i] + '</option>';
				} else {
					input += '<option value="' + i + '">' + data.select[i] + '</option>';
				}
			}
			
			input += '</select>' + 
			'</div>';
		break;
		case 'spinner':
			input = '<div class="spinner_wrapper">' + 
				'<span class="label" style="margin:0 0 10px;">' + data.title + '</span>' + 
				'<div class="cl"></div>' + 
				'<span class="spinner-wrpr" style="margin: 0 0 20px 0;">' + 
					'<input type="text" value="' + data.value + '" id="' + id + c +  '" class="spinner saved_value" name="' + id + '" size="5" maxlength="5" style="margin-right:30px; margin-left:30px; text-align:center; float:none; margin-top:0;" />' + 
				'</span>' + 
			'</div>' + 
			'<script type="text/javascript"> ' + 
				"jQuery('#" + id + c + "').spinner( { " + 
					'min : ' + data.min + ', ' + 
					'max : ' + data.max + ', ' + 
					'step : ' + data.step + ', ' + 
					'allowNull : ' + data.null + ' ' + 
				'} ); ' + 
			'</script>';
		break;
		case 'slider_name':
			input = '<div class="fl">' + 
				'<h2 class="fb_h2">Slider Name <span style="color:#ff0000;">*</span></h2>' + 
				'<input id="slider_name' + c + '" class="saved_value" type="text" style="margin:12px 0 14px;" size="50" value="' + data.value + '" name="slider_name" />' + 
			'</div>';
		break;
		case 'slide_name':
			input = '<div class="fl slide_name">';
			
			if (data.value !== '') {
				input += '<h4 id="' + id + c +  '" class="slide_title_text" >' + data.value + '</h4>';
			} else {
				input += '<h4 id="' + id + c +  '" class="slide_title_text" >You can enter slide name here</h4>';
			}
			
			input += '<input id="' + id + c +  '" class="slide_title_input saved_value" style="width:200px; display:none;" type="text" value="' + data.value + '" name="' + id + '" />' + 
			'</div>';
		break;
		case 'rm_button':
			input = '<input id="delete_obj' + id + c + '" class="delete small_but fr" type="button" name="delete_object" value="" />';
		break;
		}
		
		if (data.style !== undefined) {
		   temp += '<div style="' + data.style + '">' + input + '</div>';
		   
		   input = temp;
		}
		
		return input;
	}, 
	createSliderHtml : function (type) { 
		var actionUri = jQuery('#actionUri').val(), 
			block;
		
		block = '<div id="' + type + '">' + 
			'<div id="slider_header">' + 
				'<div id="slider_header_content">' + 
					'<div class="fr">' + 
						'<h2 style="text-align:right;" class="fb_h2">' + type.slice(0, 1).toUpperCase() + type.slice(1) + ' Slider</h2>' + 
						'<input class="fr" type="button" id="save_slider_top" name="save_slider_top" value="Save Slider" style="margin:12px 0 0;" />' + 
						'<div class="fr" style="margin:19px 0 0;">' + 
							'<img class="submit_loader" style="display:none; margin:0 10px 0 0;" src="' + actionUri + '/theme/administrator/images/wpspin_light.gif" alt="Loading" />' + 
						'</div>' + 
					'</div>' + 
				'</div>' + 
				'<div id="slider_header_nav">' + 
					'<h3>Add / Remove / Edit Slides</h3>' + 
					'<input type="button" id="max_all" class="fr" name="max_all" value="Maximize All"/>' + 
					'<input type="button" id="min_all" class="fr" name="min_all" value="Minimize All" />' + 
				'</div>' + 
			'</div>' + 
			'<ul id="sortable_slides" class="ui-sortable slides_block sep_bold"></ul>' + 
			'<div class="slider_nav">' + 
				'<input type="button" id="add_slide" name="add_slide" class="add" value="Add New Slide" />' + 
			'</div>' + 
			'<div id="slider_footer" class="sep_bold">' + 
				'<div id="slider_footer_content">' + 
					'<h2>General Slider Settings</h2>' + 
				'</div>' + 
				'<div class="cl"></div>' + 
				'<div id="slider_footer_nav">' + 
					'<input class="fl" type="button" id="save_slider" name="save_slider" value="Save Slider" />' + 
					'<div class="fl" style="margin:7px 0 0;">' + 
						'<img class="submit_loader" style="display:none; margin:0 0 0 10px;" src="' + actionUri + '/theme/administrator/images/wpspin_light.gif" alt="Loading" />' + 
					'</div>' + 
				'</div>' + 
			'</div>' + 
		'</div>';
		
		jQuery('#slider_manager_tab').empty();
		jQuery('#slider_manager_tab').append(block);
	}, 
	createSlideHtml : function (type, c) { 
		if (c === undefined) {
			c = '';
		}
		
		var block;
		
		block = '<li id="slide' + c + '" class="new_slide" style="display:none;">' + 
			'<div id="slide_header' + c + '" class="sep sep_bot slide_header" >' + 
				'<div id="sortableImg' + c + '" class="sortableImg fr" name="sortableImg"></div>' + 
				'<input id="delete_slide' + c + '" class="delete small_but fr" type="button" value=""  name="delete_slide" />' + 
				'<input id="expand_slide_button' + c + '" class="edit fr " type="button"  name="expand_slide_button" value="Enhanced View" />' + 
				'<input id="hide_slide_button' + c + '" class="hide fr" type="button" name="hide_slide_button" style="display:none;" value="Hide Details" />' + 
			'</div>' + 
			'<div id="slide_footer' + c + '" class="slide_footer" style="display:none;background-color:#f1f1f2;"></div>';
		
		if (type === 'revolution') { 
			block += '<div class="add_cat_wrapper" style="display:none;">' + 
				'<select>' + 
					'<option value="image">Image</option>' + 
					'<option value="heading1">Heading 1</option>' + 
					'<option value="heading2">Heading 2</option>' + 
					'<option value="heading3">Heading 3</option>' + 
					'<option value="butn">Button</option>' + 
					'<option value="video">Video</option>' + 
				'</select>' + 
				'<input type="button" value="Add Object" name="add_category" class="add" id="add_category' + c + '" />' + 
			'</div>'
		}
		
		block += '<div class="cl"></div>' + 
		'</li>';
		
		jQuery('#sortable_slides').append(block);
		
		jQuery('#sortable_slides').find('#slide' + c).slideDown('fast');
	}, 
	saveData : function () { 
		var sD = { 
				slider : { 
					header : {}, 
					footer : {}, 
					slides : {} 
				} 
			}, 
			tab, 
			slides, 
			cats, 
			cat, 
			inputs, 
			id, 
			sh, 
			sf;
		
		tab = jQuery('#slider_manager_tab');
		
		inputs = jQuery(tab).find('#slider_header .saved_value');
		
		inputs.each(function () { 
			sD['slider']['header'][this.name] = jQuery(this).val();
		} );
		
		cats = jQuery(tab).find('#slider_footer_content .saved_cat');
		
		jQuery(cats).each(function () { 
			cat = this.id
			sD['slider']['footer'][cat] = {};
			inputs = '';
			inputs = jQuery(this).find('.saved_value');
			inputs.each(function () { 
				if (this.type === 'checkbox') {
					sD['slider']['footer'][cat][this.name]= this.checked;
				} else {
					sD['slider']['footer'][cat][this.name] = jQuery(this).val();
				}
			} );
		} );
		
		slides = jQuery(tab).find('#sortable_slides .new_slide');
		
		slides.each(function () { 
			sh = jQuery(this).find('.slide_header');
			sf = jQuery(this).find('.slide_footer');
			id = this.id;
			sD['slider']['slides'][id] = { 
				header : {}, 
				footer : {} 
			};
			
			inputs = '';
			inputs = jQuery(sh).find('.saved_value');
			
			inputs.each(function () { 
				if (this.type === 'checkbox') {
					sD['slider']['slides'][id]['header'][this.name] = this.checked;
				} else {
					sD['slider']['slides'][id]['header'][this.name] = jQuery(this).val();
				}
			} );
			
			cats = jQuery(sf).find('.saved_cat');
			
			jQuery(cats).each(function () { 
				cat = this.id;
				sD['slider']['slides'][id]['footer'][cat] = {};
				inputs = '';
				inputs = jQuery(this).find('.saved_value');
				
				inputs.each(function () { 
					if (this.type === 'checkbox') {
						sD['slider']['slides'][id]['footer'][cat][this.name] = this.checked;
					} else {
						sD['slider']['slides'][id]['footer'][cat][this.name] = jQuery(this).val();
					}
				} );
			} );
		} );
		
		return sD;
	}, 
	loadData : function (loadedValue) { 
		sliderManager.initConfig();
		
		jQuery('#slideCounter').val(0);
		jQuery('#categoryCounter').val(0);
		
		var type = loadedValue.slider.header.slider_type, 
			c = jQuery('#slideCounter').val(), 
			cc =  jQuery('#categoryCounter').val(), 
			sf = sliderManager._config[type + 'SliderFields'], 
			data, 
			id, 
			option, 
			i, 
			sl, 
			k, 
			j, 
			x, 
			slicedid;
		
		sliderManager.createSliderHtml(type);
		
		for (i in sf.header) {
			data = sf.header[i];
			data.value = loadedValue.slider.header[i];
			id = i;
			option = sliderManager.createOption(data, id, c);
			
			jQuery('#slider_header_content').append(option);
		}
		
		for (i in sf.footer) {
			cc = jQuery('#categoryCounter').val();
			
			for (x in sf.footer[i]) {
				if (x !== 'description' && x !== 'customdescription') {
					sf.footer[i][x].value = loadedValue.slider.footer[i + '_' + cc][x];
				}
			}
			
			sliderManager.createCategory(type, sf.footer[i], i, '#slider_footer_content');
		}
		
		for (k in loadedValue.slider.slides) {
			if (type === 'revolution') {
				var temp = sliderManager.mergeR(sliderManager._config[type + 'SlideFields'].footer, sliderManager._config['revolutionSlideCats']);
				
				sliderManager._config[type + 'SlideFields'].footer = temp;
				sl = sliderManager._config[type + 'SlideFields'];
			} else {
				sl = sliderManager._config[type + 'SlideFields'];
			}
			
			c = jQuery('#slideCounter').val();
			
			sliderManager.createSlideHtml(type, c);
			
			for (j in sl.header) {
				data = sl.header[j];
				data.value = loadedValue.slider.slides[k].header[j];
				id = j;
				option = sliderManager.createOption(data, id, c);
				
				jQuery('#slide' + c + ' .slide_header').append(option);
			}
			
			var slidef = loadedValue.slider.slides[k].footer;
			
			for (j in slidef) {
				cc = jQuery('#categoryCounter').val();
				slicedid = j.split('_')[0];
				
				for (x in slidef[j]) {
					if (x !== 'description' && x !== 'customdescription') {
						sl.footer[slicedid][x].value = loadedValue.slider.slides[k].footer[j][x];
					}
				}
				
				sliderManager.createCategory(type, sl.footer[slicedid], slicedid, '#slide' + c + ' .slide_footer');
			}
			
			jQuery('#slideCounter').val(+ c + 1);
		}
		
		jQuery('#slider_manager_tab').parent().slideDown('fast');
		
		sliderManager.sortableInit();
	}, 
	mergeR : function (obj1, obj2) { 
		for (var p in obj2) {
			try { 
				if (obj2[p].constructor === Object) {
					obj1[p] = MergeRecursive(obj1[p], obj2[p]);
				} else {
					obj1[p] = obj2[p];
				}
			} catch (e) { 
				obj1[p] = obj2[p];
			}
		}
		
		return obj1;
	}, 
	updateSlidersSelect : function (data) { 
		jQuery('#sliderChoose').empty();
		
		jQuery('#sliderChoose').append(jQuery('<option />').attr('value', '').text('Select your slider here'));
		
		if (data.length === 0) {
			return false;
		}
		
		for (var i = 0, il = data.length; i < il; i += 1) {
			jQuery('#sliderChoose').append(jQuery('<option />').attr('value', data[i].id).text(data[i].name));
		}
	}, 
	loadDataHandler : function (id) { 
		var actionUri = jQuery('#actionUri').val();
		
		jQuery.post(actionUri + '/theme/functions/slider-manager-operator.php', { 
			'action' : 'getSlider', 
			'id' : id 
		}, function (data) { 
			sliderManager.loadData( { 
				'slider' : data 
			} );
			
			sliderManager.hidingInit();
			sliderManager.hidingEvents();
			
			jQuery('[name="slider_id"]').val(id);
			
			jQuery('#saveAsSlider').show();
			jQuery('#addSlider').hide();
			jQuery('#slider_type_selection').hide();
			jQuery('#cancel_slider').show();
			
			jQuery('#editSlider').next().find('img.submit_loader').fadeOut('fast');
		}, 'json');
	}, 
	saveDataHandler : function () { 
		var sD = sliderManager.saveData(), 
			actionUri = jQuery('#actionUri').val();
		
		sD.action = 'insertSlider';
		
		jQuery.post(actionUri + '/theme/functions/slider-manager-operator.php', sD, function (data) { 
			if (data.status !== 'success') {
				alert(data.msg);
			} else {
				jQuery('[name="slider_id"]').val(data.id);
				
				sliderManager.getSlidersHandler();
			}
		}, 'json');
	}, 
	deleteDataHandler : function (id) { 
		var actionUri = jQuery('#actionUri').val();
		
		jQuery.post(actionUri + '/theme/functions/slider-manager-operator.php', { 
			'action' : 'deleteSlider', 
			'id' : id 
		}, function (data) { 
			if (data.status !== 'success') {
				alert(data.msg);
			} else {
				sliderManager.getSlidersHandler();
			}
		}, 'json');
	}, 
	updateDataHandler : function () { 
		var sD = sliderManager.saveData();
		
		sD.action = 'updateSlider';
		sD.id = jQuery('[name="slider_id"]').val();
		
		var actionUri = jQuery('#actionUri').val();
		
		jQuery.post(actionUri + '/theme/functions/slider-manager-operator.php', sD, function (data) { 
			if (data.status !== 'success') {
				alert(data.msg);
			} else {
				sliderManager.getSlidersHandler();
			}
		}, 'json');
	}, 
	getSlidersHandler : function () { 
		var actionUri = jQuery('#actionUri').val();
		
		jQuery.post(actionUri + '/theme/functions/slider-manager-operator.php', { 
			'action' : 'getSliders' 
		}, function (data) { 
			sliderManager.updateSlidersSelect(data);
		}, 'json');
	}, 
	stripslashes : function (str) { 
		return (str + '').replace(/\\(.?)/g, function (s, n1) { 
			switch (n1) { 
				case '\\':
					return '\\';
				case '0':
					return '\u0000';
				case '':
					return '';
				default:
					return n1;
			}
		} );
	} 
};

jQuery(function () {
    sliderManager.init();
} );

