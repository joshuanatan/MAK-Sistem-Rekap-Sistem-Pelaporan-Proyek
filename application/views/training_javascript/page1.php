<html id = "htmlid" class = "htmlclass">
    <body>
        <input type = "text" style = "height:100px" id = "textbox1">
        <button type = "button" onclick = "function1()">Hello</button>
        <select onchange = "function2()" id = "select1">
            <option value = 1>Option 1</option>
            <option value = 2>Option 2</option>
        </select> 
    </body>
</html>


<script src = "<?php echo base_url();?>asset_training/jquery-3.6.0.min.js"></script>
<script>
function function1(){
    $.ajax({
        url:"<?php echo base_url();?>ws/dummy/get_data_select",
        type:"GET",
        dataType:"JSON",
        success:function(respond){
            var html = "";
            for(var a = 0; a<respond.length; a++){
                html += `<option value =${respond[a]}>Opsi ${respond[a]}</option>`;
            }
            $("#select1").html(html);
        }
    });
    
}
</script>

