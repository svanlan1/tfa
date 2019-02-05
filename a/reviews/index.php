<?php require('../../core/config.php'); 
  if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }
  if(!$user->isAdmin($_SESSION['admin']) ) { header('Location: ../index.php'); exit(); };
  $title = 'Tacoma Film Alliance - Administration - Homepage';
  require('../../layout/commonHead.php');
?>
  <body>
    <?php require('../../layout/adminNav.php'); ?>
    <main>
      <div class="r75">
        <section class="homepage" id="filmSpotlight">
          <h2><img src="../../images/gavel.svg" alt="" /> Film Court Administration</h2>
          <div class="sectionContent">
            Lorem ipsum bullshit
          </div>
        </section>

      </div>
      <div class="r25">
        <?php
          require('../../layout/adminUserNav.php');
        ?>
        <!-- <article>
          <a href="add.php">Add a review</a>
        </article> -->
      </div>
    </main>






    <!-- JS -->
    <?php 
        require('../../layout/commonFooter.php');
        require('../../includes/commonScripts.php');
    ?>
    <script src="script.js"></script>
  </body>
</html>
