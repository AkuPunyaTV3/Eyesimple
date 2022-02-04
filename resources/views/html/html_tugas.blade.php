<!-- Extends template page-->
<!DOCTYPE html>
<!-- Specify content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div style="margin-left: 20px;">
    
    <h3>&nbsp;HTML TUGAS</h3>
</div>
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        
        <button onclick="console_log()">Console Log</button> 
        
         <script>
            function console_log() {
              console.log("console log");
            }
        </script>
        
        <button onclick="alert_()">Alert</button>
        <script>
        function alert_() {
        alert("alert");
        }
        </script>

        
        <button onclick="confirm_()">Confirm</button>
        <script>
        function confirm_() {
        confirm("Press a button!");
        }
        </script>
  

<select id="select" onchange="">
    <option value="Choose">Choose</option>
    <option value="a">1</option>
    <option value="b" selected>2</option>
    <option value="c">3</option>
</select>


<button id="btn3">text</button>
<script>  


let select = document.querySelector("select");
let status = document.querySelector("h1");

select.addEventListener("change", (e) => {
    alert(select.value);
    status.innerText = select.value;
    
});


</script>

<style>
    li{
        list-style: none;
    }
</style>

<script>    
    $(document).ready(function(){            
        var x=2;
      $("#btn2").click(function(){          
        $("ol").append("<li id='li_'> "+x+++" <button onclick='remove_()'>remove</button></li>");        
      });
    });
    </script>   

    <ol >
      <li id="li_">1 <button onclick="remove_()">remove</button></li>     
    </ol>
    <script>
        function remove_() {          
            var myobj = document.getElementById("li_");
            myobj.remove();
        }
        </script>    
    <button id="btn2">Append</button>
    

    <button class="btn1">show</button>
   
    
    <button class="btn2">hide</button>
    <p id="#p_append" style="display:inline">Nice</p>
    {{-- <label></label> --}}
    <button id="btn_html">html</button>

 

    <button id="btn_html_append">append html</button>
    
    <script>
        $(document).ready(function(){
         var thisOptionValue=[];
         var n=0;
        
        $('#btn_html').click(function(){
            $("p").text("asd");  
    });

    $('#btn3').click(function(){
        $("select option").each(function(){
            
        thisOptionValue[n++]=$(this).val()+"\n";  
    }); 
        alert (thisOptionValue);
    }); 
           
    $(".btn1").click(function(){
        $("ol").show();
    });
    $(".btn2").click(function(){
        $("ol").hide();
    });
    $("#btn_html_append").click(function(){
        $("p").append(" tambahan");
    });

    });
</script>
    </div>
</div>

