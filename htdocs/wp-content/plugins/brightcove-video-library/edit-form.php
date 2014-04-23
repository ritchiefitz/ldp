<?php require_once("../../../wp-load.php");?>
<form id="edit-form" class="form" action="http://www.byuicomm.net/wp-content/plugins/brightcove-video-library/upload.php">
    <ul id="form-list">
        <li>
            <label for="title">*Title:</label>
            <input type="text" id="form-title" name="title" required size="40">
        </li><li>
            <label for="desc">*Description:</label>
            <textarea id="desc" name="desc" cols="40" rows="5" maxlength="250"></textarea>
			<p class="instructions"><span>250</span> characters remaining</p>
        </li><li>
            <label for="tag-input">Tags:</label>
            <input type="text" id="tag-input" name="tag-input" size="50">
            <p class="instructions">Please separate each tag with a comma and a single space</p>
        </li>
        <input type='hidden' name='action' value='edit' />
		<input id='edit-form-id' type='hidden' name='videoID' />
        <?php wp_nonce_field('edit-form-nonce','edit-form-nonce'); ?> 
    </ul>
    <a id="form-submit" href="#" class="form-button upload-form-button">Update Info</a>
    <a id="delete-button" onclick="show_delete()" class="form-button">Delete Video</a>
</form>
<form hidden id="delete-form" action="http://www.byuicomm.net/wp-content/plugins/brightcove-video-library/upload.php">
    <p>Are you sure you want to delete this video? It can't be undone!</p>
    <a id="delete-yes" class="form-button">Yes</a>
    <a id="delete-no" onclick="hide_delete()" class="form-button">No</a>
	<input type='hidden' name='action' value='delete' />
	<input id='delete-form-id' type='hidden' name='videoID' />
	<?php wp_nonce_field('delete-form-nonce','delete-form-nonce'); ?>
</form>