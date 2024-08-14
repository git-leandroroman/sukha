<?php 

  get_header();

    ?>
    <main>
      <div class="container">
        <div class="row">
          <?php
          if (have_posts()) :
            while (have_posts()) : the_post();
              the_content();
            endwhile;
          endif; 
          ?>
        </div>
      </div>
    </main>
    <?php


  get_footer();