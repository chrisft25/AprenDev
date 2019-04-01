<div class="container-fluid">
            <div class="row" style="display:flex">
                <div class="col-12 col-lg-4" style="display:flexbox">
                    <div style="overflow-y:scroll;width:100%;height:100%;border:1px solid white;background-color:white;text-align:center">
                    <h2><?php echo $title; ?></h2>
                    <p><?php echo $content; ?></p>
                    <code><?php echo $example; ?></code>
                </div>
                </div>
                <div class="col-12 col-lg-8" style="border: solid 1px white;flex:1">
                <div class="row">
                    <div id="container" style="width:100%; height:500px;border:1px solid white"></div>
                <select onchange="lenguajes()" name="lenguajes" id="lenguajes">
                    <option value="html" selected>HTML</option>
                    <option value="php">PHP</option>
                    <option value="javascript">Javascript</option>
                
                </select>
                <select onchange="temas()" name="temas" id="temas">
                    <option value="vs-dark" selected>Dark</option>
                    <option value="vs">Light</option>
                    <option value="hc-black">Contraste alto</option>
                </select>
                
                <!-- <button onclick="alert(monaco.editor.getModels()[0].getValue().replace(/(\n)/gm,'\\n')); monaco.editor.getModels()[0].setValue(monaco.editor.getModels()[0].getValue().replace(/(\n)/gm,'\\n').replace(/(\\n)/gm,'\n'));">Prueba</button> -->
                <button onclick="test()">Retornar valor</button>
                <input type="text" name="resultado" id="resultado"/>
                </div>
            <br>
            <div class="row" style="overflow-y:scroll;height:100px;">
                    <div id="faq" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="questionOne">
                            <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#faq" href="#answerOne" aria-expanded="false" aria-controls="answerOne">
                            Test 1
                            </a>
                            </h5>
                            </div>
                            <div id="answerOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionOne">
                            <div class="panel-body">
                            <?php echo $test1; ?>
                            </div>
                            </div>
                            </div>
                            
                            <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="questionTwo">
                            <h5 class="panel-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerTwo" aria-expanded="false" aria-controls="answerTwo">
                            Test 2
                            </a>
                            </h5>
                            </div>
                            <div id="answerTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                            <div class="panel-body">
                            <?php echo $test2; ?>
                            </div>
                            </div>
                            </div>
                            <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="questionThree">
                                    <h5 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answerThree" aria-expanded="false" aria-controls="answerThree">
                                    Test 3
                                    </a>
                                    </h5>
                                    </div>
                                    <div id="answerThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                    <div class="panel-body">
                                    <?php echo $test3; ?>
                                    </div>
                                    </div>
                                    </div>

                            
                            </div>
            </div>
        </div>
            </div>
        </div>