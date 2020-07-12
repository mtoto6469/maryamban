/**
 * Created by hadise on 11/17/2017.
 */


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#upload-image").change(function(){
    readURL(this);
});

