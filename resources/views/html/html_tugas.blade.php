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

    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
  $("button").click(function(){
    $.ajax({url: "demo_test.txt", success: function(result){
      $("#div1").html(result);
    }});
  });
});
</script>
</head>
<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>

<button>Get External Content</button>


<script>
    $(document).ready(function(){
      $("button").click(function(){
        $.get("demo_test.asp", function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
        });
      });
    });
    </script>
    
    
    <button>Send an HTTP GET request to a page and get the result back</button>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Belajar Dasar Ajax</title>
    </head>
    
    <body>
        <h1>Tutorial Ajax <button id="btn-clear" onclick="clearResult()">Clear</button></h1>
        <div id="hasil"></div>
        <button id="button" onclick="loadContent()">Load Content</button>
    
        <script>
            function loadContent() {
                var xhr = new XMLHttpRequest();
                var url = "https://api.github.com/users/petanikode";
    
                xhr.onloadstart = function () {
                    document.getElementById("button").innerHTML = "Loading...";
                }
    
                xhr.onerror = function () {
                    alert("Gagal mengambil data");
                };
    
                xhr.onloadend = function () {
                    if (this.responseText !== "") {
                        var data = JSON.parse(this.responseText);
                        var img = document.createElement("img");
                        img.src = data.avatar_url;
                        var name = document.createElement("h3");
                        name.innerHTML = data.name;
    
                        document.getElementById("hasil").append(img, name);
                        document.getElementById("button").innerHTML = "Done";
    
                        setTimeout(function () {
                            document.getElementById("button").innerHTML = "Load Lagi";
                        }, 3000);
                    }
                };
    
                xhr.open("GET", url, true);
                xhr.send();
            }
    
            function clearResult() {
                document.getElementById("hasil").innerHTML = "";
            }
        </script>
    </body>

    {{-- LOAD --}}
    <h1>Load Data</h1>
    <pre id="result"></pre>
    
    <script>
        $("#result").load("https://api.github.com/users/petanikode");
    </script>

    <h1>Load Data</h1>
    <img id="avatar" src="" width="100" height="100">
    <br>
    <h3 id="name"></h3>
    <p id="location"></p>
    
    
    <script>
        var url = "https://api.github.com/users/petanikode";
        $.get(url, function(data, status){
            $("#avatar").attr("src", data.avatar_url);
            $("#name").text(data.name);
            $("#location").text(data.location);
        });
    </script>

<h1>Tutorial Ajax dengan Fetch</h1>
<button onclick="loadContent2()">Load Content</button>
<div id="hasil2"></div>

<script>
    function loadContent2(){
        var url = "https://jsonplaceholder.typicode.com/posts/";
        fetch(url).then(response => response.json())
            .then(function(data){
                var template = data.map(post => {
                    return `
                    <h3>${post.title}</h3>
                    <p>${post.body}</p>
                    <hr>
                    `;
                });

                document.getElementById("hasil2").innerHTML = template.join('<br>');
            }).catch(function(e){
                alert("gagal mengambil data");
            });
    }
</script>


<script>
window.$ = window.jquery = require('./node_modules/jquery');
window.dt = require('./node_modules/datatables.net')();
window.$('#table_id').DataTable();
</script>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table> 
   

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel DataTables Tutorial</title>

    <!-- Bootstrap CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            padding-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- App scripts -->
    @stack('scripts')
</body>

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'user/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>

    </div>
</div>

