@include('/mobile/common/start')
@csrf
<input id="attachFile" type="file" name="filePath">
<input id="attachFilePath" type="hidden">
<script>
    $('input[name="filePath"]').change(function(){
        if($("#attachFile").val() === ""){
            // 파일 취소
            cancel();
        } else {
            save();
        }
    });

    function save() {

        const imageInput = $("#attachFile")[0];
        const formData = new FormData();
        formData.append("file", imageInput.files[0]);
        formData.append("oldFilePath", $("#attachFilePath").val());

        $.ajax({
            type:"POST",
            url: "/fileUpload",
            processData: false,
            contentType: false,
            data: formData,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success: function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    $("#attachFilePath").val(data.filePath);
                    alert("path = "+data.filePath);
                } else {
                    alert(data.message);
                }
            },
            err: function(err){
                console.log("err:", err)
            }
        });
        alert('save')
    }
    function cancel() {
        alert('cancel')

    }
</script>
@include('/mobile/common/end')

