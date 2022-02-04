<!-- Extends template page-->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
@extends('layouts.app')

<!-- Specify content -->
@section('content')


<div style="margin-left: 20px;">
    
    <h3>&nbsp;Coba HTML</h3>
</div>
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

        <!-- Alert message (start) -->
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('message') }}
        </div>
        @endif
        <!-- Alert message (end) -->
           
        {{-- <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('subjects.create')}}" style="margin-right: ">Add User</a>                        
        </div>

        <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('roles.role')}}" style="margin-right: ">User Role</a>                        
        </div>

        <div class='actionbutton'>                        
            <a class='btn btn-info float-right' href="{{route('pets')}}" style="margin-right: ">Pets</a>                        
        </div> --}}


        <table class="table" >
            <thead>
                <style>
                    /* CLASS  VS ID */
                    /* Style the element with the id "myHeader" */
                    #coba1 {
                      background-color: lightblue;
                      color: black;
                      padding: 40px;
                      text-align: center;
                    }
                    
                    /* Style all elements with the class name "city" */
                    .coba1 {
                      background-color: tomato;
                      color: white;
                      padding: 10px;
                    } 
                </style>
                <h2>Difference Between Class and ID</h2>
                <p>A class name can be used by multiple HTML elements, while an id name must only be used by one HTML element within the page:</p>
                <p>ID di define menggunakan "#" sedangkan <br>
                    CLASS di define menggunakan "."
                </p>

                <!-- An element with a unique id -->
                <h1 id="coba1">Intern</h1>
                
                <!-- Multiple elements with same class -->
                <h2 class="coba1">Andreas</h2>              
                <h2 class="coba1">Ricco</h2>
                <h2 class="coba1">Michael</h2>
                <h2 class="coba1">Immanuel</h2>
                
                <p>In this example, x, y, and z are variables.</p>

                <p id="demo"></p>
                
                <script>
                var x = 5;
                var y = 6;
                var z = x + y;
                document.getElementById("demo").innerHTML =
                "The value of z is: " + z;
                </script>
                
                <h1>JavaScript Variables</h1>
                <p>The dollar sign is treated as a letter in JavaScript names.</p>
                <p id="demo2"></p>
                <script>
                let $$$ = 2;
                let $myMoney = 5;
                document.getElementById("demo2").innerHTML = $$$ + $myMoney;
                </script>   
                
                {{-- COBA ALERT --}}
                <h2>COBA 3</h2>
                <button onclick="myFunction3()">Coba3</button>
                <p id="demo3"></p>
                <script>
                function myFunction3() {
                var txt;
                if (confirm("Press a button!")) {
                    txt = "You pressed OK!";
                } else {
                    txt = "You pressed Cancel!";
                }
                document.getElementById("demo3").innerHTML = txt;
                }
                </script>

                <h2>COBA 4</h2>
                <button onclick="myFunction2()">Try it</button>
                <p id="demo4"></p>
                <script>
                function myFunction2() {
                let text;
                let person = prompt("Please enter your name:", "Andreas");
                if (person == null || person == "") {
                    text = "User cancelled the prompt.";
                } else {
                    text = "Hello " + person + "! How are you today?";
                }
                document.getElementById("demo4").innerHTML = text;
                }
                </script>   
                
                {{-- CONSOLE LOG --}}
                <h1>The Console Object</h1>
                <h2>The log() Method</h2>
                <p>Remember to open the console (Press F12) before you click "Run".</p>
                <p>How to display an array in the console.</p>
                <script>
                const myArr = ["Andreas", "1", "2", "3"];
                console.log(myArr);
                console.log("halo tes");
                </script>
                
                <script>
        $( document ).ready(function() {
                    console.log( "ready!" );
                });

                </script>
                
                <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
                <script>
                $( document ).ready(function() {
                    console.log( "document loaded" );
                });
             
                $( window ).on( "load", function() {
                    console.log( "window loaded" );
                });
                </script>
                <h1>TES COBA i frame</h1>
          
                <iframe src="http://techcrunch.com"></iframe>
                
                <h1>COBA Arrays FIND</h1>                                
                <p id="demo7"></p>                
                <script>
                const ages = [3, 10, 18,21,25];                
                document.getElementById("demo7").innerHTML = ages.find(checkAge);                
                function checkAge(age) {
                    
                  return age > 18;
                }
                </script>      
                
                {{-- ON CLICK --}}
                <button onclick="window.print()">COBA TOMBOL ON CLICK</button>
                
                {{-- DOCUMENT READY --}}
                <script>
                    $(document).ready(function(){

                      getElementById("button").click(function(){
                        $("h4").slideToggle();
                      });
                    });
                    </script>              
                    
                    <h4>DOCUMENT READY COBA.</h4>                    
                    <button>Toggle between slide up and slide down for a p element</button>

                    {{-- CLICK --}}

                    <h1>HTML DOM Events 1</h1>
                    <h2>The onclick Event</h2>                    
                    <p>Use the addEventListener() method to attach a "click" event to a p element:</p> 
                    <p id="demo_1">Click me.</p>                    
                    <script>
                    document.getElementById("demo_1").addEventListener("click", myFunction_1);                    
                    function myFunction_1() {
                      document.getElementById("demo_1").innerHTML = "YOU CLICKED ME!";
                    }
                    </script>

                    <h1>HTML DOM Events 2</h1>
                    <h2>The onclick Event</h2>
                    <p>Use the HTML DOM to assign an "onclick" event to a p element:</p>
                    <p id="demo_2">Click me.</p>
                    <script>
                    document.getElementById("demo_2").onclick = function() {myFunction_2()};
                    function myFunction_2() {
                    document.getElementById("demo_2").innerHTML = "YOU CLICKED ME!";
                    }
                    </script>

                    {{-- ONCHANGE --}}
                    <p>Modify the text in the input field, then click outside the field to fire the onchange event.</p>

                    Enter some text: <input type="text" name="txt" value="Hello" onchange="myFunction_DOM1(this.value)">

                    <script>
                    function myFunction_DOM1(val) {
                    alert("The input value has changed. The new value is: " + val);
                    }
                    </script>

                    {{-- ONKEY --}}
                    <p>This example uses the HTML DOM to assign an "onkeypress" event to an input element.</p>
                    <p>Press a key inside the text field to set a red background color.</p>
                    <input type="text" id="demoz">
                    <script>
                    document.getElementById("demoz").onkeypress = function() {myFunction_DOM2()};
                    function myFunction_DOM2() {
                    document.getElementById("demoz").style.backgroundColor = "red";
                    }
                    </script>

                    {{-- REMOVE --}}
                
                    <script>
                    $(document).ready(function(){
                    $("button").click(function(){
                        $("h2").remove();
                    });
                    });
                    </script>
                    </head>
                    <body>

                    <p>COBA REMOVE P .</p>
                    <h2>COBA REMOVE H2 .</h2>
                    <h2>INI H2 .</h2>
                    <p>This is another paragraph.</p>
                    <button>Remove all p elements</button>

                    {{-- COBA PARENT --}}
                    <style>
                        .container2, .demo9 {
                          background-color: tomato;
                          color: white;
                          padding: 50px;
                          margin: 30px;
                        }
                        </style>
                        </head>
                        <body>                        
                        <div class="demo9"> Grandparent
                          <div class="demo container">Parent
                            <div id="myElement9" class="demo9">The parent of this div element will be selected.</div>
                          </div>
                        </div>
                        
                        <script>
                        var element = document.getElementById("myElement9");
                        var closest = element.closest(".container");
                        if (closest) {
                          closest.style.border = "20px solid yellow";
                        }
                        </script>

                        {{-- APPEND --}}
                        <script>
                            $(document).ready(function(){
                              $("#btn1").click(function(){
                                $("a").append(" <b>Appended text</b>.");
                              });
                              $("#btn2").click(function(){
                                $("ol").append("<li>Appended item</li>");
                              });
                            });
                            </script>                       
                            <a>This is a paragraph.</a>
                            <p>This is another paragraph.</p>                            
                            <ol>
                              <li>List item 1</li>
                              <li>List item 2</li>
                              <li>List item 3</li>
                            </ol>                            
                            <button id="btn1">Append text</button>
                            <button id="btn2">Append list item</button>

                        {{-- VAL --}}
                        <p>COBA VAL</p>
                        <script>
                            $(document).ready(function(){
                              $("button").click(function(){
                                $("input:text").val("Glenn Quagmire");
                              });
                            });
                            </script>
                            </head>
                            <body>
                            
                            <p>Name: <input type="text" name="user"></p>
                            
                            <button>Set the value of the input field</button>
                           

            </thead>
            <tbody>
                

            
            </tbody>
           
                
        </table>


        
            
    </div>
</div>
@stop
