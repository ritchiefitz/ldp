(function() {
    tinymce.create('tinymce.plugins.brightcove_video', {
        init : function(ed, url) {
            ed.addButton('brightcove_video', {
                title : 'Add a Brightcove Video',
                image : '/wp-content/plugins/brightcove-video-library/play.png',
                onclick : function() {
                    var id = prompt("Insert the Video ID"); 
                    ed.selection.setContent('[Brightcove Video]'+id+'[/Brightcove Video]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('brightcove_video', tinymce.plugins.brightcove_video);
})();
