
        <section class="content">
        <div class="row">
         <section class="col-lg-12 connectedSortable">
         <div class="box">
        <h2 style="margin-top:0px">Setting <?php echo $button ?></h2>
         <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Copyright <?php echo form_error('copyright') ?></label>
            <input type="text" class="form-control" name="copyright" id="copyright" placeholder="Copyright" value="<?php echo $copyright; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('setting') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>

        </div>
    </section>
    </div>
    </section>    
    