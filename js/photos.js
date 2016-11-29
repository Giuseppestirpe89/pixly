function getRandomSize(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

var allImages = "";
var folder = "/getimages.php";

$.ajax({
    url : folder,
    success: function (data) {
      json = ($.parseJSON(data));
      
      $.each(json, function(data1, value) {
        $("#photos").append( "<img src='../event/Mysteryland/"+ value +"'>" );
        console.log(value);
      });
      
    }
})



//style button 2 for upload images
$(function () {
    var ol = $('#upload ol');
    $('#drop a').click(function () {
        $(this).parent().find('input').click();
    });
    $('body').on('click', '#openUpload', function (e) {
        e.preventDefault();
        $('#upload ol').empty();
        $('#uploadModal').modal('show');
    });


    $('#upload').fileupload({
        messages: {
            maxFileSize: "File is too big",
            minFileSize: "File is too small",
            acceptFileTypes: "Filetype not allowed",
            maxNumberOfFiles: "Too many files",
            uploadedBytes: "Uploaded bytes exceed file size",
            emptyResult: "Empty file upload result"
        },
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        //url: 'AJAX.ashx',
        url: 'http://jquery-file-upload.appspot.com/',
        dataType: 'json',
        disableImageLoad: true,
        headers: {
            Accept: "application/json"
        },
        accept: 'application/json',
        maxFileSize: 10000000, //5mb
        maxNumberOfFiles: 5,
        sequentialUploads: true,
        //singleFileUploads: false,
        //resizeMaxWidth: 1920,
        //resizeMaxHeight: 1200,
        //acceptFileTypes: /(.|\/)(gif|jpe?g|png|pdf)$/i,
        uploadTemplateId: null,
        downloadTemplateId: null,
        uploadTemplate: function (o) {
            var rows = $();
            $.each(o.files, function (index, file) {
                var row = $('<li class="template-upload fade upload-file">' +
                    '<div class="upload-progress-bar progress" style="width: 0%;"></div>' +
                    '<div class="upload-file-info">' +
                    '<div class="filename-col"><span class="filename"></span></div>' +
                    '<div class="filesize-col"><span class="size"></span></div>' +
                    '<div class="error-col"><span class="error field-validation-error"></span></div>' +
                    '<div class="actions-col">' +
                    '<button class="btn btn-xs btn-danger cancel removeFile" data-toggle="tooltip" data-placement="left" title="" data-original-title="Remove file">' +
                    '<i class="glyphicon glyphicon-ban-circle"></i> <span></span>' +
                    '</button> ' +
                    '<button class="btn btn-success start"><i class="glyphicon glyphicon-upload"></i> <span>Start</span></button>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
                row.find('.filename').text(file.name);
                row.find('.size').text(o.formatFileSize(file.size));
                if (file.error) {
                    row.find('.error').text(file.error);
                }
                rows = rows.add(row);
            });
            return rows;
        },
        downloadTemplate: function (o) {
            var rows = $();
            $.each(o.files, function (index, file) {
                var row = $('<li class="template-download fade upload-file complete">' +
                    '</div>' +
                    '</li>');

                row.find('.size').text(o.formatFileSize(file.size));
                if (file.error) {
                    row.find('.filename').text(file.name);
                    row.find('.error').text(file.error);
                    row.removeClass('complete').addClass('error');
                } else {
                    row.find('.filename').text(file.name);
                }
                rows = rows.add(row);
            });
            return rows;
        }
    });

    $('#upload').bind('fileuploadprocessalways', function (e, data) {
        var currentFile = data.files[data.index];
        if (data.files.error && currentFile.error) {
            //console.log(currentFile.error);
            data.context.find(".start").prop('disabled', true);
            data.context.find('.error').text(currentFile.error);
            return;
        }
    });


    $('#upload').bind('fileuploadadd', function (e, data) {
        setTimeout(function () {
            $('.removeFile').tooltip();
        }, 0);
        //$('.removeFile').tooltip();
        //console.log('add');
    })
        .bind('fileuploadprogress', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        data.context.find('.progress').css('width', progress + '%');
        //console.log(progress);
    })
        .bind('fileuploadfail', function (e, data) {
        console.log('fail');
    }).bind('fileuploadstart', function (e) {
        console.log('start');
    })

});

