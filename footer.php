    <footer class="main-footer">
      <div class="wrapper">
        <div class="row">
          <?php
            dynamic_sidebar('Footer Contact');
            dynamic_sidebar('Footer Social Media');
          ?>
        </div>

        <div class="col-12 colophon">
          <?php echo get_theme_mod( 'lila_colophon' ); ?>
        </div>
      </div>
    </footer>

<?php wp_footer(); ?>
  </div> <!-- #page -->
</body>
</html>