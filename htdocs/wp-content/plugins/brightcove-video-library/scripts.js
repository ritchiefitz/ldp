//array that is returned from the brightcove query
var jsonArray;

//stores the word the user entered in to the search, if it's empty it will be ignored
var search = '';
// Store reference to the player
var player;

// Store reference to the modules in the player
var modVP;
var modExp;
var modCon;
// id of the selected video
var videoID;
var currentVideoArray; //entire array for current item

var perPage = 12;

// This method is called when the player loads with the ID of the player
// We can use that ID to get a reference to the player, and then the modules
// The name of this method can vary but should match the value you specified
// in the player publishing code for “templateLoadHandler".

function myTemplateLoaded(experienceID) {
  // Get a reference to the player itself
  player = brightcove.api.getExperience(experienceID);

  // Get a reference to individual modules in the player
  modVP = player.getModule(brightcove.api.modules.APIModules.VIDEO_PLAYER);
  modExp = player.getModule(brightcove.api.modules.APIModules.EXPERIENCE);
  modCon = player.getModule(brightcove.api.modules.APIModules.CONTENT);
  modVP.loadVideoByID(videoID);
  modVP.pause(true);

  }
  
        //Make the initial query when the page loads
        jQuery(document).ready(function(){
            make_query(0, 'modified_date');
            jQuery('#exchangable').load('/wp-content/plugins/brightcove-video-library/player.html');
            jQuery.ajaxSetup ({
                // Disable caching of .load()
                cache: false
            });
        });
        //make additional querys with parameters
        function make_query(page, sort){
            jQuery('#video_library').html('');
            jQuery('#pagination').html('');
            jQuery('#loading').show();
            
            //this part is weird, you create a dynamic script tag,
            // using the url to include parameters about your query
            var url = get_query_url(page,sort);

            var scriptTag = document.createElement("script");
            scriptTag.setAttribute("type", "text/javascript");
            scriptTag.setAttribute("charset", "utf-8");
            scriptTag.setAttribute("src", url);
            scriptTag.setAttribute("id", "return");
            jQuery('head').append(scriptTag);
        }
        //does the default query, unless the seach variable is set
        function get_query_url(page,sort){
            if(search == ''){
                return 'http://api.brightcove.com/services/library?command=find_all_videos&video_fields=id,name,videostillurl,tags,publisheddate,shortdescription&get_item_count=true&token=5lr_GNp0hRNSZA31TEWbzPQgygwb6H277DEXcZLPAmbBzVJVeVE2Ig..&page_size=' + perPage + '&page_number=' + page + '&sort_by=' + sort + '&callback=video_list_handler';
            }else return 'http://api.brightcove.com/services/library?command=search_videos&video_fields=id,name,videostillurl,tags,publisheddate,shortdescription&get_item_count=true&token=5lr_GNp0hRNSZA31TEWbzPQgygwb6H277DEXcZLPAmbBzVJVeVE2Ig..&page_size=' + perPage + '&page_number=' + page + '&sort_by=' + sort + '&all=' + search + '&callback=video_list_handler';
            
        }
        //this is called from the script created in make_query, it builds the tiles
        function video_list_handler(jsonData){
            jsonArray = jsonData;
            jQuery('#loading').hide();
            //see if there are any results
            if(jsonData['items'].length == 0){
                jQuery('#video_library').append("<p>Sorry, no videos matched your search</p>");
                return 0;
            }
            //print out the videos
            for (var i=0; i<jsonData["items"].length; i++) {
                
                var item = jsonData["items"][i];
                
                var wrap = document.createElement("div");
                wrap.setAttribute("class", "video-wrap");
                
                var textWrap = document.createElement("div");
                textWrap.setAttribute("class", "text-wrap");
				
                var playB = document.createElement("div");
                playB.setAttribute("class", "arrow-right");
                var linkString = "black_box(" + item.id + ")";
                playB.setAttribute("onclick", linkString);
                
                var thumb = document.createElement("img");
                thumb.setAttribute("class", "video-thumb");
                thumb.setAttribute("src", item.videoStillURL);
                thumb.setAttribute("alt", "Video Thumbnail");
                
                var link = document.createElement("a");
                link.setAttribute("class", "video-link");
                var linkString = "black_box(" + item.id + ")";
                link.setAttribute("onclick", linkString);
                
                var title = document.createElement("p");
                title.setAttribute("class", "video-title");
                title.appendChild(document.createTextNode(item.name));                
                
                var id = document.createElement("p");
                id.setAttribute("class", "video-id");
                id.appendChild(document.createTextNode("ID: " + item.id));   
                
                wrap.appendChild(playB);
                wrap.appendChild(thumb);
                wrap.appendChild(textWrap);
                textWrap.appendChild(link);
                textWrap.appendChild(id);
                link.appendChild(title);
                
                jQuery('#video_library').append(wrap);
            
            }
            //create the pagination
            var totalPages = Math.ceil(jsonData["total_count"] / jsonData["page_size"]);
            var pageNumber = jsonData['page_number'] + 1; // count starting at one, not 0
             // create the range
            var bottomRange;
            var topRange;
            
            //less than 10 - show all pages
            if(totalPages <= 10){
                bottomRange = 1;
                topRange = totalPages;
            }else{
                // if within 5 of beginning
                if(pageNumber - 4 <= 1){
                    bottomRange = 1;
                    topRange = 10;
                }
                //if within 5 of end
                else if(pageNumber + 5 >= totalPages){
                    bottomRange = totalPages - 10;
                    topRange = totalPages;
                }
                //Somewhere in the middle
                else{
                    bottomRange = pageNumber - 4;
                    topRange = pageNumber + 5;
                }
            }
            
            if(bottomRange != 1){
                //create the first page button
                    var link = document.createElement("a");
                    link.setAttribute("class", "page_number");
                    link.setAttribute("title", "First Page");
                    var pageString = "paginate(0)";
                    link.setAttribute("onclick", pageString);
                    link.appendChild(document.createTextNode('<<'));
                    jQuery('#pagination').append(link);
            }
            
            if(pageNumber != 1){
                    // create the back button
                    var link = document.createElement("a");
                    link.setAttribute("class", "page_number");
                    link.setAttribute("title", "Previous Page");
                    var pageString = "paginate(" + (jsonData['page_number'] - 1) + ")";
                    link.setAttribute("onclick", pageString);
                    link.appendChild(document.createTextNode('<'));
                    jQuery('#pagination').append(link);
            }         
           
            
            for(var i = bottomRange; i <= topRange; i++){ //start at 1 not 0
                if(i != (jsonData["page_number"] + 1)){ // check if it's the current page
                    var link = document.createElement("a");
                    link.setAttribute("class", "page_number");
                    link.setAttribute("title", "Go to page " + i);
                    var pageString = "paginate(" + (i-1) + ")";
                    link.setAttribute("onclick", pageString);
                    link.appendChild(document.createTextNode(i));
                    jQuery('#pagination').append(link);
                }else{
                    var currentPage = document.createElement("span");
                    currentPage.setAttribute("class", "current_page page_number");
                    currentPage.appendChild(document.createTextNode(i));
                    jQuery('#pagination').append(currentPage);
                }
            }
            if(pageNumber != totalPages){
                // create the forward button
                    var link = document.createElement("a");
                    link.setAttribute("class", "page_number");
                    link.setAttribute("title", "Next Page");
                    var pageString = "paginate(" + (jsonData['page_number'] + 1) + ")";
                    link.setAttribute("onclick", pageString);
                    link.appendChild(document.createTextNode('>'));
                    jQuery('#pagination').append(link);
            } 
            if(topRange != totalPages){
                // create the last page button
                    var link = document.createElement("a");
                    link.setAttribute("class", "page_number");
                    link.setAttribute("title", "Last Page - " + totalPages);
                    var pageString = "paginate(" + (totalPages - 1) + ")";
                    link.setAttribute("onclick", pageString);
                    link.appendChild(document.createTextNode('>>'));
                    jQuery('#pagination').append(link);
            } 
        }
        
        //make a new query when a page number is selected
        function paginate(pageNumber){
            make_query(pageNumber, 'modified_date');
        }
        //load the player box when a video is selected
        function black_box(selectedVideo){
            videoID = selectedVideo;
            //fill in the video information
            var currentItem;
            var matchFound = false;
            //find the right set of data in the array first
            for(var i = 0; i<jsonArray["items"].length && matchFound == false; i++){
                if(jsonArray["items"][i]["id"] == videoID){
                    matchFound = true;
                    currentItem = jsonArray["items"][i];
                }
            }
            currentVideoArray = currentItem;
            jQuery('#current-video-title').html(currentItem["name"]);
            
            var date = new Date(parseInt(currentItem["publishedDate"]));
            jQuery('#current-video-date').html(date.toLocaleDateString());
            
            var tags = currentItem["tags"];
            jQuery('#current-video-tags').html('');
            for(var i = 0; i < tags.length; i++){
                var tag = document.createElement("li");
                
                if(i == tags.length - 1){
                    tag.setAttribute("class", "single-tag last-tag");
                } else tag.setAttribute("class", "single-tag");
                tag.appendChild(document.createTextNode(tags[i]));
                jQuery('#current-video-tags').append(tag);
            }
            
            var shortDesc = currentItem["shortDescription"];
            jQuery('#short-desc').html(shortDesc);
           
            //display the box
            display_box('Video Preview');
            jQuery('#video-player').show();
            jQuery('#edit-box').show();
            //this code is for ie, because it doesn't reload the player every time
            if(modVP != undefined){
                modVP.loadVideoByID(videoID);
            }
        }
        function display_box(head){
            jQuery('#black-box').css('left', ((jQuery(window).width() / 2) - 250) + 'px'); //center the black box
            jQuery('#current-video-head').html(head);
            jQuery('#black-box').fadeIn('slow');
            jQuery('#mask').css("width", '100%');
            jQuery('#mask').css('height',jQuery('#wpwrap').height() + 30);
            jQuery('#mask').css("position",'absolute');
            //jQuery("body").css("overflow-y", "hidden");
            jQuery('#mask').fadeIn('slow');
            
        }
        //close the box when the (x) is selected and return to the video list
        function close_box(){
            jQuery('#black-box').fadeOut('slow');
            jQuery('#mask').fadeOut('slow');
            jQuery("body").css("overflow-y", "auto");
            
            if(modVP != undefined){
            modVP.pause(true);
            }
            
            //default is the player
            jQuery('#exchangable').load('/wp-content/plugins/brightcove-video-library/player.html');
        }
        //Search form
        jQuery('#search-button').click(function(e){
            e.preventDefault();
            var query = jQuery('#search-field').val();
            search = query;
            paginate(0);
            //create the undo button if it doesn't exist already
            if(search != '' && jQuery('#all-button').length == 0){
                jQuery('#search-button').after("<button id='all-button' class='form-button'>Undo Search</button>");
                jQuery('#all-button').click(function(e){
                   e.preventDefault();
                   search = '';
				   jQuery('#search-field').val('');
                   paginate(0);
                   jQuery(this).remove();
                });
            }
            
            
            return false;
        });
        //make enter trigger the button when they are typing
        jQuery('#search-field').keypress(function(e){
            if(e.which == 13){
                jQuery('#search-button').click();
            }
        });