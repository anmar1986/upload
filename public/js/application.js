var datafile = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    browse_button: 'uploadFile', // i can pass in id here
    container: document.getElementById('container'), //  or DOM Element itself
    chunk_size: '1mb',
    url: BASE_URL,
    max_file_count: 1,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    //ADD FILE FILTERS HERE
    filters: {
        /* mime_types: [
        		{title : "XML files", extensions : "xml"},
        	]
        */
    },
     

    // Flash settings
    flash_swf_url: PUBLIC_URL,

    // Silverlight settings
    silverlight_xap_url: PRIVATE_URL,
     

    init: {
        PostInit: function() {
            document.getElementById('filelist').innerHTML = ''; 
            document.getElementById('upload').onclick = function() {
                datafile.start();
                return false;
            };
        },

        FilesAdded: function(up, files) {
            plupload.each(files, function(file) {
                document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
            });
        },

        UploadProgress: function(up, file) {
            document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },

        Error: function(up, err) {
            document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
        }
    }
});

datafile.init();