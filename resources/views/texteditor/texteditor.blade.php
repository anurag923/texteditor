<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Text editor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script>
    <script>
        $( function() {
        $( "#draggable" ).draggable();
        } );

        $( function() {
        $( "#blah" ).draggable();
        } );
    </script>
</head>
<body>
<section>
<div class="container">
<div class="row">
<div class="col-6">
<div class="form-row mt-5 mb-5">
<input type="text" name="" id="" class="form-control">
</div>
<div class="form-row mb-5">
<input type="text" name="" id="" class="form-control">
</div>
<div class="form-row mb-5">
<input type="text" name="" id="" class="form-control">
</div>
<div class="form-row mb-5">
<input type="text" name="" id="" class="form-control">
</div>
<form runat="server">
  <input type='file' id="imgInp" />
</form>
</div>
<div class="col-6 mb-5 text-white" style="background:darkgreen;" id="html-content-holder">
    <h3 id="draggable"></h3>
    <img id="blah" src="#" alt="your image" width="300" height="300"/>
</div>
</div>
</div>
<div class="row">
<div class="col-6"></div>
<input id="btn-Preview-Image" type="button"
                value="Preview" /> 
          
    <a id="btn-Convert-Html2Image" href="#">
        Download
    </a>
<div id="previewImage" class="col-6"></div>
<button id="savetodb">save</button>
</div>
<div class="row">
<div class="col-6"></div>
<div class="col-6">
    <button id="bold" class="btn btn-danger"><i class="fa fa-bold" aria-hidden="true"></i></button>
    <button id="italic" class="btn btn-danger"><i class="fa fa-italic" aria-hidden="true"></i></button>
    <select name="" id="font">
    <option value="" selected>Fonts</option>
    <option value="Times New Roman">Times New Roman</option>
    <option value="Times">Times</option>
    <option value="serif">serif</option>
    <option value="Arial">Arial</option>
    <option value="Helvetica">Helvetica</option>
    <option value="sans-serif">sans-serif</option>
    <option value="Lucida Console">Lucida Console</option>
    <option value="Courier">Courier</option>
    <option value="monospace">monospace</option>
    <option value="Tangerine">Tangerine</option>
    </select>

    <select name="" id="fontsize">
    <option value="" selected>Font-size</option>
    <option value="8px">8px</option>
    <option value="9px">9px</option>
    <option value="10px">10px</option>
    <option value="11px">11px</option>
    <option value="12px">12px</option>
    <option value="14px">14px</option>
    <option value="16px">16px</option>
    <option value="18px">18px</option>
    <option value="20px">20px</option>
    <option value="22px">22px</option>
    <option value="24px">24px</option>
    <option value="26px">26px</option>
    <option value="28px">28px</option>
    <option value="36px">36px</option>
    <option value="48px">48px</option>
    <option value="72px">72px</option>
    </select>
    <input type="color" name="" id="color" value="">
    <input type="color" name="" id="canvascolor" value="">
</div>
</div>
</section>

<script>
        $(document).ready(function() {
          
            // Global variable
            var element = $("#html-content-holder"); 
          
            // Global variable
            var getCanvas; 
  
            $("#btn-Preview-Image").on('click', function() {
                html2canvas(element, 
                {   scale:2,
                    onrendered: function(canvas) {
                        $("#previewImage").append(canvas);
                        getCanvas = canvas;
                    }
                });
            });
  
            $("#btn-Convert-Html2Image").on('click', function() {
                var imgageData = 
                    getCanvas.toDataURL("image/png");
              
                // Now browser starts downloading 
                // it instead of just showing it
                var newData = imgageData.replace(
                /^data:image\/png/, "data:application/octet-stream");
              
                $("#btn-Convert-Html2Image").attr(
                "download", "GeeksForGeeks.png").attr(
                "href", newData);
            });
        });
    </script>
<script>
$(document).ready(function(){
    $(".form-control").keyup(function(){
        var text = $(this).val();
        $('#draggable').html(text);
    })

    $("#bold").click(function(){
        $("#draggable").css("font-weight", "bold");
    });
    $("#font").click(function(){
        var fontvalue = $(this).val();
        $("#draggable").css("font-family", fontvalue);
    });
    $("#fontsize").click(function(){
        var fontsize = $(this).val();
        $("#draggable").css("font-size", fontsize);
    });
    $("#italic").click(function(){
        $("#draggable").css("font-style", "italic");
    });
    $("#color").change(function(){
       var color = $(this).val();
       $("#draggable").css("color",color);
    });

    $("#canvascolor").change(function(){
       var color = $(this).val();
       $("#html-content-holder").css({background:color});
    });
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

})
</script>
<script>
$(document).ready(function(){
    $("#savetodb").click(function(){
        var canvas=document.getElementsByTagName("canvas");
        var dataUrl=canvas[0].toDataURL();
        alert(dataUrl);
        var csrf = '{{csrf_token()}}';
        $.ajax({
        type: "POST",
        url: "http://localhost:8000/texteditor",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            image: dataUrl,
            csrf:   csrf
        },
        success: function(result){
        console.log(result);
  }
})
.done(function(respond){console.log("done: "+respond);})
.fail(function(respond){console.log("fail");})
.always(function(respond){console.log("always");})
    })
})
</script>
</body>
</html>