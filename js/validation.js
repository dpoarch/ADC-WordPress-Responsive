
function validateForm() {

	console.log("test");
    var fname = document.forms["shareform"]["fname"].value;
    var lname = document.forms["shareform"]["lname"].value;
    var email = document.forms["shareform"]["email"].value;
    var state = document.forms["shareform"]["state"].value;
    var story = document.forms["shareform"]["story"].value;
    var checkbox = document.forms["shareform"]["checkbox"].checked;
    var fail = true;
    if (fname.trim() == null || fname.trim() == "") {
        //alert("Name must be filled out");
        document.getElementById('fname').style.display = 'block';
        fail = false;
    }
    else{
    	document.getElementById('fname').style.display = 'none';
    }
    if (lname.trim() == null || lname.trim() == "") {
        //alert("Name must be filled out");
        document.getElementById('lname').style.display = 'block';
        fail = false;
    }
    else{
    	document.getElementById('lname').style.display = 'none';
    }
    if (email.trim()== null || email.trim() == "") {
        //alert("Name must be filled out");
        document.getElementById('email').style.display = 'block';
        fail = false;
        if(validateEmail(email)){
    		document.getElementById('email').style.display = 'none';
    	}
    	else{
    		document.getElementById('email').style.display = 'block';
        	fail = false;
    	}
    }
    else{
    	if(validateEmail(email)){
    		document.getElementById('email').style.display = 'none';
    	}
    	else{
    		document.getElementById('email').style.display = 'block';
        	fail = false;
    	}
    }
	if (state.trim() == null || state.trim() == "") {
        //alert("Name must be filled out");
        document.getElementById('state').style.display = 'block';
        fail = false;
    }
    else{
    	document.getElementById('state').style.display = 'none';
    }
    if (story.trim() == null || story.trim() == "") {
        //alert("Name must be filled out");
        document.getElementById('storySpan').style.display = 'block';
        fail = false;
    }
    else{
    	document.getElementById('storySpan').style.display = 'none';
    }
    if (checkbox == false) {
        //alert("Name must be filled out");
        document.getElementById('checkbx').style.display = 'block';
        fail = false;
    }
    else{
    	document.getElementById('checkbx').style.display = 'none';
    }
    if (checkImageType() == false) {
        //alert("Name must be filled out");
        document.getElementById('media2').style.display = 'block';
        fail = false;
    }
    else{
        document.getElementById('media2').style.display = 'none';
    }
    if (checkFileSize() == false) {
        //alert("Name must be filled out");
        document.getElementById('media').style.display = 'block';
        fail = false;
    }
    else{
        document.getElementById('media').style.display = 'none';
    }
    if (checkWords() == false) {
        //alert("Name must be filled out");
        document.getElementById('storymax').style.display = 'block';
        fail = false;
    }
    else{
        document.getElementById('storymax').style.display = 'none';
    }



    if(fail){
    hideMainModal();
    showFinalModal();
        return true;
    }
    
    return fail;
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function hideMainModal(){
    console.log("myModal Hide");
    jQuery('#myModal').modal('hide'); 
}

function showFinalModal(){
    console.log("shareModal show");
    jQuery('#shareModal').modal('show'); 
}

function checkImageType(){
    var file = document.getElementById('imageupload').files[0];
    if(document.getElementById('imageupload').files.length != 0){
        var fileType = file["type"];
        var ValidImageTypes = ["image/gif", "image/jpeg", "image/png", "video/mp4", "video/avi", "video/flv", "video/wmv"];

        if(fileType == ""){
        	if(file.name.split('.').pop() == 'flv'){
        		return true;
        	}
        }

        var ext = fileType;
        switch (ext.toLowerCase()) {
        case 'image/gif':
        case 'image/jpg':
        case 'image/jpeg':
        case 'image/png':
        case 'video/mp4':
        case 'video/avi':
        case 'video/flv':
        case 'video/x-ms-wmv':
        case 'video/quicktime':
        return true;
        }
    }
    else{
        return true;
    }

    return false;  
}

function checkFileSize(){
    if(document.getElementById('imageupload').files.length != 0){
        if(document.getElementById('imageupload').files[0].size > 100000000){
            return false; 
        }else{
            return true; 
        }
    }
    else{
        return true;
    }
}

function wordCount( val ){
    var wom = val.match(/\S+/g);
    return {
        charactersNoSpaces : val.replace(/\s+/g, '').length,
        characters         : val.length,
        words              : wom ? wom.length : 0,
        lines              : val.split(/\r*\n/).length
    };
}

function checkWords(){
    var v = wordCount(document.forms["shareform"]["story"].value);
    if(v.words > 200){
        return false;
    }else{
        return true;
    }
}

// jQuery( document ).ready(function() {
//     var storyField   = document.getElementById("story");
//     var result   = document.getElementById("result");

//     storyField.addEventListener("input", function(){
//       var v = wordCount( this.value );
//       result.innerHTML = (
//           "Words: "+ v.words + " (max. 200)"
//       );
//     }, false);
// });

jQuery(document).ready(function() {
    document.getElementById('urlfield').value = document.URL;

    jQuery("#story").on('keyup', function() {
        var words = this.value.match(/\S+/g).length;
        if (words > 200) {
            // Split the string on first 200 words and rejoin on spaces
            var trimmed = jQuery(this).val().split(/\s+/, 200).join(" ");
            // Add a space at the end to keep new typing making new words
            jQuery(this).val(trimmed + " ");
        }
        else {
            jQuery('#display_count').text(words);
            jQuery('#word_left').text(200-words);
        }
    });
 }); 