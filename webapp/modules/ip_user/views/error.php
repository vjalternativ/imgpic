<?php if(isset($_SESSION['error']) && $_SESSION['error']!="") {
?>

    <div class="Module Nags">


                                        <div class="Module NagBase NagEmail">
    <div class="centeredWithinWrapper">
                
                            
            <div class="message"><?php echo $_SESSION['error'];?></div>
        
                    </div>
</div>
            
        </div>
		
		<?php
		unset($_SESSION['error']);
		}
		
		?>