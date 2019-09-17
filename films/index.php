<?php require('../core/config.php'); 
	//if($user->is_logged_in()){ header('Location: home.php'); exit(); }
	$title = 'Tacoma Film Alliance - Films';
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
      <div class="r80">
        <div class="center heading_level_1">
          Tacoma Film Alliance Member Films
        </div>
        <section class="homepage" id="filmSpotlight">
          <h2 class="header"><img src="../images/film_spotlight_banner.png" alt="Film spotlight"></h2>
          <div class="sectionContent">
            <iframe width="720" height="405" src="https://www.youtube.com/embed/?listType=playlist&list=PLRAvO_vjT7KvGDiemZ5BEnHIcN6uKe6Pp" frameborder="0" allowfullscreen></iframe>
          </div>
        </section>
      </div>
      <div class="r20">
       <?php if($user->is_logged_in()) { 
            require('../layout/userNav.php');
          } else {
            require('../layout/genericArticle.php');
          }
        ?>
      </div>      
    </main>
    <!-- JS -->
    <?php 
        require('../layout/commonFooter.php');
        require('../includes/commonScripts.php');
    ?>
  </body>
</html>