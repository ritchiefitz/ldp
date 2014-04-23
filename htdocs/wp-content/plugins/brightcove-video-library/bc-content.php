	 <div id="black-box" hidden>
        <div id="black-box-top"> <h1 id="current-video-head">Video Preview</h1>
            <a onclick="close_box()" id="close-box">(X)</a></div>
                    <div id="video-player">
            <!-- Start of Brightcove Player -->

<div style="display:none">
Used in the video library to preview videos 
</div>

<!--
By use of this code snippet, I agree to the Brightcove Publisher T and C 
found at https://accounts.brightcove.com/en/terms-and-conditions/. 
1654994569001

-->

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

<object id="myExperience" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="615" />
  <param name="height" value="346" />
  <param name="playerID" value="1283574741001" />
  <param name="playerKey" value="AQ~~,AAAAocwtmPk~,RTQzrMOt-UB6M3Nb5_Mf4-_iPw2RxZ7Q" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  <param name="includeAPI" value="true" />
  <param name="templateLoadHandler" value="myTemplateLoaded" />
</object>

<!-- 
This script tag will cause the Brightcove Players defined above it to be created as soon
as the line is read by the browser. If you wish to have the player instantiated only after
the rest of the HTML is processed and the page load is complete, remove the line.
-->
<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player -->
        </div> 
        <div id="exchangable"></div>
        <?php if(current_user_can('edit_pages')){ ?>
            <div id="edit-box"><a id="edit-button" class="form-button" onclick="get_edit_form()">Edit Video Data</a></div>
        <?php }?>
    </div>
    <!-- End of black box -->
    <div id="gallery-head">
    <div id="search-box">
        <input name="search" id="search-field" size="50">
        <button id="search-button" class="form-button">Search</button>
    </div>
    <?php if(current_user_can('edit_posts')){ ?>
        <button onclick="get_upload_form()" class="form-button" id="get-upload-button">Upload a New Video</button>
    <?php } ?></div>
    
    <img id="loading" src="<?php echo plugins_url( 'ajax-loader.gif', __FILE__ )?>" alt="loading..." title="loader">
    <div id="video_library">
        
    </div>
    <div id="page-wrap"><div id="pagination"></div></div>
<script>
jQuery('#wpwrap').before('<div id="mask" onclick="close_box()"></div>');
jQuery('#mask').css('height',jQuery('#wpwrap').height());
</script>