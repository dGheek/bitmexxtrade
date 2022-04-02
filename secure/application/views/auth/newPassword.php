        <!-- Login Container -->
        <div class="dt-login--container">

            <!-- Login Content -->
            <div class="dt-login__content-wrapper">

                <!-- Login Background Section -->
                <div class="dt-login__bg-section">

                    <div class="dt-login__bg-content">
                        <!-- Login Title -->
                        <h1 class="dt-login__title"><?php echo lang('change_password') ?></h1>
                        <!-- /login title -->

                        <p class="f-16"><?php echo lang('change_your_password') ?></p>
                    </div>


                    <!-- Brand logo -->
                    <div class="dt-login__logo">
                        <a class="dt-brand__logo-link" href="https://bitmexxtrade.com/">
                            <img class="dt-brand__logo-img" src="<?php echo $this->security->xss_clean($this->logoWhite) ?>" alt="Logo">
                        </a>
                    </div>
                    <!-- /brand logo -->

                </div>
                <!-- /login background section -->

                <!-- Login Content Section -->
                <div class="dt-login__content">
                    <ul style="float: right;background-color: #f4f4f4;padding: 5px;">
                        <li class="dt-nav__item dropdown">

                            <!-- Dropdown Link -->
                          
                            <!-- /dropdown link -->

                            <!-- Dropdown Option -->
                            <div id="ytWidget"></div><script src="https://translate.yandex.net/website-widget/v1/widget.js?widgetId=ytWidget&pageLang=en&widgetTheme=light&autoMode=false" type="text/javascript"></script>
                            <!-- /dropdown option -->

                        </li>
                    </ul>
                    <!-- Login Content Inner -->
                    <div class="dt-login__content-inner">
                        <?php $this->load->helper('form'); ?>
                        <h2 class="f-20"><?php echo lang('enter_your_new_password') ?></h2>
                        <!-- Form -->
                        <?php echo form_open(base_url( 'createPasswordUser' ));?>
                            <input type="email" name="email" value="<?php echo $email; ?>" readonly required hidden />
                            <input type="text" name="activation_code" value="<?php echo $activation_code; ?>" readonly required hidden />
                            
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-1"><?php echo lang('new_password') ?></label>
                                <input type="password" class="form-control" name="password" id="password-1"
                                    aria-describedby="password-1" placeholder="<?php echo lang('new_password') ?>">
                                <?php echo form_error('password'); ?>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="sr-only" for="password-2"><?php echo lang('confirm_password') ?></label>
                                <input type="password" class="form-control" name="cpassword" id="password-2"
                                    placeholder="<?php echo lang('confirm_password') ?>">
                                <?php echo form_error('cpassword'); ?>
                            </div>
                            <!-- /form group -->

                            <!-- Form Group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary text-uppercase"><?php echo lang('change_password') ?></button>
                            </div>
                            <!-- /form group -->

                        <?php echo form_close();?>
                        <!-- /form -->

                    </div>
                    <!-- /login content inner -->
                </div>
                <!-- /login content section -->

            </div>
            <!-- /login content -->

        </div>
        <!-- /login container -->