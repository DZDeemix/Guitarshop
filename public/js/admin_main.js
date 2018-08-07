

var getAlias = function(str) {
    var res = '';
    var rus = [' ', '(', ')', ',', '/', '0','1','2','3','4','5','6','7','8','9', 'а', 'б', 'в','г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    var lat = ['-', '', '', '', '', '0','1','2','3','4','5','6','7','8','9', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];
    for(i = 0; i < str.length; i++){
        symbol = lat[rus.indexOf(str[i].toLowerCase())];
        if(symbol) {
            res += symbol;
        } else {
            if(lat.indexOf(str[i]) > -1){
                res += str[i];
            }
        }
    }
    return res;
};

$('body')
    .on('keyup', '#title', function () {
        if ($(this).val())
            $('#alias').val(getAlias($(this).val().toLowerCase()));
        else
            $('#alias').val('');
    })
;

/*$(document).ready(function() {
 $('#table_id').DataTable({
 responsive: true
 });
 });*/





/*Dropzone.options.myAwesomeDropzone= {
    method: 'POST',
    withCredentials: true,
    autoProcessQueue: false,

    addRemoveLinks: true,
    maxFiles: 10,
    maxFilesize: 10,
    acceptedFiles: 'image/!*',
    headers: {
        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        'X-Requested-With': 'XMLHttpRequest'
    }
};*/
/*
// Disable AutoDiscover
Dropzone.autoDiscover = false;


 url: 'add',
 paramName: "covers",


// Set Dropzone Options
Dropzone.options.myAwesomeDropzone = {
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 20,
    maxFiles: 20,
    addRemoveLinks: true,
    acceptedFiles: ".jpg, .jpeg, .png",
    maxFilesize: 1,
    dictDefaultMessage: "Перетащи файлы или кликни!"
}

// Initialize Dropzone
var myDropzone = new Dropzone("#my-awesome-dropzone", {url: "add"});

// Initialize Submit Button
var submitButton = document.querySelector("#submit");

// Submit Button Event on click
submitButton.addEventListener("click", function(e) {
    e.preventDefault();
    // Serialize Form
    var form = $('#item-form').serialize();
    $.ajax({
        type: 'post',
        // First, validate form
        url: '/validate-item',
        data: form,
        success: function(){
            // if dropzone has files processqueue and submit formdata with dropzone
            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue();
            } else {
                // if dropzone has no files store item without images
                $.ajax({
                    type: 'post',
                    url: '/store-item',
                    data:form,
                    success: function(){
                        window.location="{{URL::to('/items')}}";
                    }
                });
            }
        },
        error: function(data){
            // on validate error show errors (using sweet alert)
            var result = $.parseJSON(data.responseText);
            var arr = [];
            $.each(result, function(key, value) {
                arr += value + "\n";
            });
            swal({
                title: "Error!",
                text: arr,
                type: "error",
                confirmButtonText: "Ok"
            });
        }
    });
});

// on sending via dropzone append token and form values (using serializeObject jquery Plugin)
myDropzone.on("sendingmultiple", function(file, xhr, formData) {
    formData.append('_token', '{{ csrf_token() }}');
    var formValues = $('#item-form').serializeObject()
    $.each(formValues, function(key, value){
        formData.append(key, value);
    });
});

// on success redirect
myDropzone.on("successmultiple", function(){
    window.location="{{URL::to('/items')}}";
});

// on error show errors
myDropzone.on("errormultiple", function(file, errorMessage, xhr){
    var arr = [];
    $.each(errorMessage, function(key, value) {
        arr += value + "\n";
    });
    swal({
        title: "Error!",
        text: arr,
        type: "error",
        confirmButtonText: "Ok"
    });
});
*/
