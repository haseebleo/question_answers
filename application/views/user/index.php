<div class="thumbnail span6 offset2 marginTop5">
    <?php echo validation_errors(); ?>
        <?php echo form_open('user/loginCheck', 'class="form-horizontal"'); ?>
        <!-- Form Name -->
        <legend>Sign In</legend>

        <!-- Text input-->
        <div class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input id="Email" name="email" placeholder="Enter your email address" class="input-xlarge" required="" type="text">
            </div>
        </div>

        <!-- Password input-->
        <div class="control-group">
            <label class="control-label" for="password">password</label>
            <div class="controls">
                <input id="Password" name="password" placeholder="Enter your password" class="input-xlarge" required="" type="password">
                <label> <a href="" class=""> Forget your password </a></label>   
            </div>
        </div>
        <!-- Button -->
        <div class="control-group">
            <div class="controls">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>

</div>