<?php echo '<br>
        <div class="footer-copyright-area" style="bottom:0px;width:100%">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019 <a href="#">AprenDev</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/main.js"></script>
    <script src="node_modules/monaco-editor/min/vs/loader.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="js/main-login.js"></script>
    <script>
    $(document).ready(function() {
            document.getElementById("resultado").value=null;
            document.getElementById("lenguajes").selectedIndex=null;
            document.getElementById("temas").selectedIndex=null;
    
        require.config({ paths: { "vs": "node_modules/monaco-editor/min/vs" }});
    
        require(["vs/editor/editor.main"], function() {
            //Inicializamos el editor en lenguaje HTML y con un texto que contiene las etiquetas iniciales
            var editor = monaco.editor.create(document.getElementById("container"), {
                value: "<?php\nfunction reto($a,$b){\n\n}\n?>",
                language: "php",
                theme: "vs-dark"
            });
        });
    });
        function temas(){
            var e = document.getElementById("temas"); //Selecciona el select con id "Temas"
            var tema = e.options[e.selectedIndex].value; //Recibe el valor seleccionado
            monaco.editor.setTheme(tema); //Establece el tema, según lo seleccionado
        }
    
        function lenguajes(){
            var e = document.getElementById("lenguajes"); //Selecciona el select con id "Lenguajes"
            var lenguaje = e.options[e.selectedIndex].value; //Recibe el valor seleccionado
            monaco.editor.setModelLanguage(window.monaco.editor.getModels()[0], lenguaje); //Establece el lenguaje, según lo seleccionado
            switch(lenguaje){
                case "php":
                monaco.editor.getModels()[0].setValue("<?php\nfunction reto($a,$b){\n\n}\n?>"); //Modifica el texto del editor, según el lenguaje
                break;
    
                case "javascript":
                monaco.editor.getModels()[0].setValue("function reto(a,b){\n\n}");
                break;
    
                case "html":
                monaco.editor.getModels()[0].setValue("<html>\n\n</html>");
                break;
            }
            
        }
    
        function test(){
            var code =monaco.editor.getModels()[0].getValue().replace(/(\r\n|\n|\r)/gm,""); //Eliminamos todos los espacios, saltos de linea,etc del valor
            var idReto=document.getElementById("idReto").value;
            var idPrueba1=document.getElementById("idPrueba1").value;
            var idPrueba2=document.getElementById("idPrueba2").value;
            var idPrueba3=document.getElementById("idPrueba3").value;
            
            $.ajax({
            type: "POST",
            url: "test.php", //lo enviamos a test.php para evaluar
            data: {code:code,idPrueba:idPrueba1,idReto}, //se envía el valor ya formateado
            success: function(data){
                if(data=="1"){
                document.getElementById("test1").innerHTML= " Correcto"
                }else{
                document.getElementById("test1").innerHTML= " Incorrecto"
            }
            },
        });

        $.ajax({
            type: "POST",
            url: "test.php", //lo enviamos a test.php para evaluar
            data: {code:code,idReto,idPrueba:idPrueba2}, //se envía el valor ya formateado
            success: function(data){
                if(data=="1"){
                document.getElementById("test2").innerHTML= " Correcto"
                }else{
                document.getElementById("test2").innerHTML= " Incorrecto"
            }
            },
        });
    
        $.ajax({
            type: "POST",
            url: "test.php", //lo enviamos a test.php para evaluar
            data: {code:code,idReto,idPrueba:idPrueba3}, //se envía el valor ya formateado
            success: function(data){
                if(data=="1"){
                document.getElementById("test3").innerHTML= " Correcto"
                }else{
                document.getElementById("test3").innerHTML= " Incorrecto"
            }
            },
        });
        }
    
        function handleData(data) {
            if(!isNaN(data)){
                document.getElementById("resultado").value=data; //Muestra el resultado de la función escrita en el editor en un input
            }else{
                document.getElementById("resultado").value="Error en tu código";
            }
      
    }
    </script>
</body>

</html>';
?>