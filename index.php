<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropbox</title>
    <style>
        #chooser-demo {
            height: 100px;
            font-size: 24px;
        }
    </style><script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="h17y3pflq15a5q1"></script></head>
<body>
<section class="section">
    <div class="container">
        <a href="https://dl.dropboxusercontent.com/s/deroi5nwm6u7gdf/advice.png" class="dropbox-saver"></a>
        <a
                href="https://www.dropbox.com/s/u0bdwmkjmqld9l2/dbx-supporting-distributed-work.gif?dl=0"
                class="dropbox-embed"
                data-height="300px"
                data-width="600px"
        ></a>
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <div id="chooser-demo"></div>
                    <article class="message is-success" id="selected-link">
                        <div class="message-header">
                            <p>Success: Selected Link</p>
                        </div>
                        <div class="message-body">
                            <a href="" id="link"></a>
                        </div>
                    </article>
                </article>

            </div>

        </div>

    </div>

</section>
<script src="./script.js"></script>
<script>

    let selectedLink = document.getElementById("selected-link");
    selectedLink.style.display = "none";
    options = {

        // Required. Called when a user selects an item in the Chooser.
        success: function(files) {
            selectedLink.style.display = "block";
            let link = document.getElementById('link');
            link.innerHTML = files[0].link;
            link.href = files[0].link;
        },

        // Optional. Called when the user closes the dialog without selecting a file
        // and does not include any parameters.
        cancel: function() {
            selectedLink.style.display = "none";
            alert("Canceled")
        },

        // Optional. "preview" (default) is a preview link to the document for sharing,
        // "direct" is an expiring link to download the contents of the file. For more
        // information about link types, see Link types below.
        linkType: "preview", // or "direct"

        // Optional. A value of false (default) limits selection to a single file, while
        // true enables multiple file selection.
        multiselect: false, // or true

        // Optional. This is a list of file extensions. If specified, the user will
        // only be able to select files with these extensions. You may also specify
        // file types, such as "video" or "images" in the list. For more information,
        // see File types below. By default, all extensions are allowed.
        extensions: ['.pdf', '.doc', '.docx', '.png'],

        // Optional. A value of false (default) limits selection to files,
        // while true allows the user to select both folders and files.
        // You cannot specify `linkType: "direct"` when using `folderselect: true`.
        folderselect: false, // or true

        // Optional. A limit on the size of each file that may be selected, in bytes.
        // If specified, the user will only be able to select files with size
        // less than or equal to this limit.
        // For the purposes of this option, folders have size zero.
        //sizeLimit: 1024, // or any positive number
    };

    var button = Dropbox.createChooseButton(options);
    document.getElementById("chooser-demo").appendChild(button);

</script>
</body>

</html>