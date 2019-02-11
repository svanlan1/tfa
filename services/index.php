<?php require('../core/config.php'); 
//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
$title = 'Tacoma Film Alliance - Service tester';
require('../layout/commonHead.php');
?>
    <body>
        <?php if($user->is_logged_in()) { 
                require('../layout/postNav.php');
            } else {
                require ('../layout/preNav.php');
            } 
        ?>
        <main>
            <div class="r100">
                <section class="homepage" id="ourMission">
                    <h2>Service test</h2>
                    <div style="padding: 10px;">
                        <div class="row">
                            <label for="address">Service location</label>
                            <input type="text" id="address" aria-label="Address" placeholder="addPost.php" />
                        </div>
                        <div class="row">
                            <label for="type">Type</label>
                            <select id="type">
                                <option value=""></option>
                                <option value="get">GET</option>
                                <option value="set">SET</option>
                            </select>
                        </div>
                        <div class="parameters">
                            <div class="row">
                                <a href="javascript:;" id="addField">Add parameter</a>
                            </div>
                            <div class="half">
                                <input type="text" aria-label="Paramter 1" placeholder="Param 0" data-param="0" />
                            </div>
                            <div class="half">
                                <input type="text" aria-label="Value 1" placeholder="Value 0" data-value="0" />
                            </div>
                        </div>
                        <div class="row">
                            <button class="test">Test</button>
                        </div>
                    </div>
                    <textarea id="results" style="width: 96%; height: 400px; margin-left: 13px;"></textarea>
                </section>
            </div>
        </main>
        <!-- JS -->
        
        <?php 
            require('../layout/commonFooter.php');
            require('../includes/commonScripts.php');
        ?>
    </body>
</html>
