<div id="weblinktab" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   
	<div class="modal-content">
   <form class="standardForm" action="<?php echo $sugar_config['base_url'];?>ip_user/picfromweb/">

	  <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pic from a website</h4>
      </div>
      <div class="modal-body">
    
	<div class="form-group">
	
	<label>URL</label>
	<input name="url" type="text" placeholder="http://..." autofocus="" class="form-control" id="weblinkfield" onkeyup="enablesubmit('weblinkfield','btnweblink')">
	</div>
	
	
	
	
	
	
	
	
	
	



    

    



		
		
		
		
      </div>
      <div class="modal-footer">
	  <button class="btn btn-primary" id="btnweblink" type="submit" disabled="disabled">Next</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

</form>

    </div>

  </div>
</div>


<div class="ModalManager Module"><div class="Modal Module modalHasClose absoluteCenter hide" id="weblinktab-a">









































    











<div class="modalMask show"></div>

<div class="modalScroller">

    <div class="modalContainer show">

        <span class="positionModuleCaret"></span>

        <div class="modalContent">

            <div class="modalModule">

                

                

            <div class="AddPinURL Module inModal">





    

    <form class="standardForm" action="<?php echo $sugar_config['base_url'];?>ip_user/pinfromweb/">

        <h1>Pin from a website</h1>

        <div class="installBookmarklet">

            <p>

                Tip: to save links more quickly, <a href="/" class="pinmarkletLink">get the Pinterest browser button</a>.

            </p>

        </div>





<div class="findPins">

    <button class="Button Module btn hasText primary rounded" id="btnweblink" type="submit" disabled="disabled">







    









<span class="buttonText">

            

            Next

        </span>

        

</button>

    <div class="findPinsField">

        <input name="url" type="text" placeholder="http://..." autofocus="" class="hasError" id="weblinkfield" onkeyup="enablesubmit('weblinkfield','btnweblink')"><p class="formFieldMessage formErrorMessage">Where do you want to Pin from?</p>

    </div>

</div>





    </form>



</div></div>

            

                <button class="Button Module borderless cancelButton closeModal inModal show" onclick="closemodal('weblinktab')" type="button">















<em></em>

<span class="accessibilityText">Close</span>

</button>

            

        </div>

    </div>

</div>



</div></div>