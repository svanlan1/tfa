<?php require('../../core/config.php'); 
	if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
	$title = 'Tacoma Film Alliance - Films';
	require('../../layout/commonHead.php');
?>
  <body>
    <?php if($user->is_logged_in()) { 
        require('../../layout/postNav.php');
      } else {
        require ('../../layout/preNav.php');
      } 
    ?>
    <main>
      <div class="r75">
        <section class="homepage" id="filmSpotlight">
          <h2 class="header"><img src="../../images/spotlight_header.png" alt="February spotlight" /></h2>
          <div class="sectionContent" style="flex-flow:column;">
            <div class="container">
                <div class="actionsRow">
                    <button class="addFilm">Add a film</button>
                </div>
                <ul></ul>
                <div class="actionsRow arBottom">
                    <a href="all.php" class="viewAll">View all member films</a>
                </div>
            </div>
          </div>
        </section>   
      </div>
      <div class="r25">
        <?php
            require('../../layout/userNav.php');
        ?>
      </div>
    </main>
    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
  </body>
</html>