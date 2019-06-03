    <footer>
      <div class="columns">
        <div class="column is-one-half">
          <h3 class="title  has-text-centered has-text-white is-3">Subscribe to our newsletter</h3>
          <div class="field is-grouped">
            <p class="control is-expanded has-icons-left">
              <input class="input is-rounded" type="text" placeholder="Name">
              <span class="icon is-left">
                <i class="fas fa-id-card"></i>
              </span>
            </p>
            <p class="control is-expanded has-icons-left">
              <input class="input is-rounded" type="text" placeholder="Surname">
              <span class="icon is-left">
                <i class="fas fa-id-card"></i>
              </span>
            </p>
          </div>
          <div class="field is-grouped">
            <p class="control is-expanded has-icons-left">
              <input class="input is-rounded" type="text" placeholder="E-mail">
              <span class="icon is-left">
                <i class="fas fa-envelope"></i>
              </span>
            </p>
            <p class="control">
                <input class="button is-primary" type="submit" value="Subscribe">
            </p>
          </div>
        </div>
        <div class="column has-text-centered">
        </div>
        <div class="column has-text-centered is-one-fifth">
          <img 
            src="<?php echo get_bloginfo('template_directory'); ?>/dist/images/perlur-logo-mono-white_h100px.png"
            style="height: 100px;" />
            <p class="has-text-white">
              2019 
              <?php 
                if (date('Y') > 2019) {
                  echo ' - '.date('Y');
                }
              ?> © <strong class="has-text-white">PERLUR Group</strong><br/>
              All rights reserved.
            </p>
        </div>
      </div>
    </footer>
  </body>
</html>