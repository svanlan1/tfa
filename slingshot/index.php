<?php require('../core/config.php'); 
  //if($user->is_logged_in()){ header('Location: home.php'); exit(); }
  $title = 'Tacoma Film Alliance - Slingshot';
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
        <section class="homepage" id="ourMission">
          <h2><img src="../images/slingshot.svg" alt="" /> Slingshot</h2>
          <div class="sectionContent" style="flex-flow: column;">
            <div class="storyBanner" style="background: url('/sandbox/images/slingshot_film.jpg') 0px center / cover no-repeat;"></div>
            <div class="storySetup">
              <span class="byline">by Slingshot Committee on Jan 25, 2018 at 11:59am</span>
              <div class="lede">What is Slingshot?</div>
            </div>
            <div class="storyContent">
              <p>
                Slingshot is a sub-group of members from the Tacoma Film Alliance who are dedicated to producing one short film per month.  Each  month, Slingshot writers will
                submit a script (up to 2), which will be voted upon by said members.  That film is given a 2 month window for pre-production, and we then film on the last Sunday of
                the month.
              </p>
              <p>
                <h3>Slingshot Monthly Film:  Guidelines for Success</h3>
                <dl>

                  <dt>Purpose</dt>
                  <dd>to write, produce, and exhibit a short film together each month, for the mutual improvement of our filmmaking skills and for making beneficial connections.</dd>

                  <dt>Emphasis</dt>
                  <dd>strong emphasis and preference is given to making films by writer-directors. strong emphasis is given to writing original short scripts (because a great film starts with a great script) and then having that writer direct that script. our emphasis is making films, not just talking about making films.</dd>

                  <dt>Voting</dt>
                  <dd>voting is always done in secret and by approval voting. if there is a tie, then a run-off vote is held.</dd>

                  <dt>Teams</dt>
                  <dd>each slingshot team is composed of a steering committee plus a selection committee. the steering committee directs all activities of the slingshot team.  the selection committee selects the scripts to be made into short films.</dd>

                  <dt>Steering</dt>
                  <dd>the steering committee consists of between three and five members of the Tacoma Film Alliance who agree to meet the ongoing writing requirements, and are accepted to the steering committee. joining the steering committee requires applying and being confirmed by a unanimous secret vote of the current steering committee. for simplicity, a person may only be on one steering committee at a time.</dd>

                  <dt>Selection</dt>
                  <dd>the selection committee consists of all persons on the steering committee, plus any number of Tacoma Film Alliance members, who have successfully worked on at least two slingshot films, and who are voted to join the selection committee by a simple majority vote of the steering committee. All persons on the selection committee may submit up to two original short scripts each month, by the deadline, for voting upon by the selection committee.</dd>

                  <dt>Splitting</dt>
                  <dd>if the steering committee exceeds 5 persons the whole slingshot team divides into two separate teams, so that each team again has a steering committee of between 3 and 5 persons plus a selection team. teams are called “slingshot alpha team”, “slingshot bravo team”,  “slingshot charlie team”, etc. a slingshot team with less than 3 persons on the steering committee disbands.</dd>

                  <dt>Meetings</dt>
                  <dd>meetings of the steering and selection committees are held together in person every first and third tuesday of the month, with an additional meeting the fifth tuesday if agreed by the steering committee.</dd>

                  <dt>Removal</dt>
                  <dd>any person may be removed from a committee and/or slingshot team by a simple majority vote of the steering committee.</dd>

                  <dt>Writing</dt>
                  <dd>each person on the steering committee agrees to submit in writing at least one original short film idea per month to a common forum of that committee, but weekly idea submitting is encouraged. each person on the steering committee also agrees to submit in writing at least one completed original short film script each month to the same forum. The due date for ideas and scripts is by midnight on the 3rd Sunday of each month.</dd>

                  <dt>Filming</dt>
                  <dd>each month, the selection committee votes on which short film script the team produces two months following e.g. voting in january determines the film shot in march. this vote is held during the three days following the third sunday of each month. the writer of the selected script has first right-of-refusal to direct and edit that film. if the writer declines to direct and/or edit, voting determines a willing director and/or editor.</dd>

                  <dt>Releases</dt>
                  <dd>the director of each short is responsible for obtaining and retaining all necessary releases required.</dd>

                  <dt>Editing</dt>
                  <dd>final editing of each short is completed within 60 calendar days of the last day of shooting, and exhibited in person or online to the participants within 30 days after.</dd>

                  <dt>Credits</dt>
                  <dd>each completed short film must include, as part of the credits, the logo of the Tacoma Film Alliance, its website address, and the production number assigned to it.</dd>

                  <dt>Copyright</dt>
                  <dd>scripts remain copyright of the author. each completed short film is copyright of the director and/or their designated production company.</dd>

                  <dt>Advice</dt>
                  <dd>these are only guidelines for success and each steering committee can vote to change them as they see fit.</dd>

                </dl>
              </p>
            </div>
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