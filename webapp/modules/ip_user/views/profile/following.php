<ul class="nav nav-tabs">
  <li class="active" onclick="followingtopic('<?php echo $_REQUEST['user']->id;?>')" ><a data-toggle="tab" href="#followingcontent">Topics</a></li>
  <li onclick="followingpeople('<?php echo $_REQUEST['user']->id;?>')"> <a data-toggle="tab"  href="#followingcontent">People</a></li>
  <li onclick="followingboard('<?php echo $_REQUEST['user']->id;?>')"><a data-toggle="tab" href="#followingcontent">Boards</a></li>
</ul>

<div class="tab-content">
  <div id="followingcontent" class="tab-pane fade in active">
<?php require 'webapp/modules/ip_user/views/followingtopic.php';?>  
  
  </div>
  
  
</div>


<div class="Module UserProfileContent hide">



























    

        

            <div class="FollowingSwitcher Module">



<div class="navigateBar">

    <div class="navigateScope centeredWithinWrapper">

<button class="Button Module btn hasText leftRounded navScopeBtn selected" type="button" onclick="followingtopic('<?php echo $_REQUEST['user']->id;?>')">



<span class="buttonText">

            

            Topics

        </span>

        

</button>



        <button class="Button Module btn hasText navScopeBtn" type="button" onclick="followingpeople('<?php echo $_REQUEST['user']->id;?>')">







    









<span class="buttonText">

            

            People

        </span>

        

</button>



        <button class="Button Module btn hasText rightRounded navScopeBtn" type="button" onclick="followingboard('<?php echo $_REQUEST['user']->id;?>')">







    









<span class="buttonText">

            

            Boards

        </span>

        

</button>

    </div>

</div>

</div>



            <div class="Module UserProfileFollowingGrid">

















    

    

        

    



    <div class="Grid Module">









<div class="GridItems Module centeredWithinWrapper fixedHeightLayout padItems" id="followingcontent-a">

<?php require 'webapp/modules/ip_user/views/followingtopic.php';?>

</div>

























<div class="seeMoreButtonWrapper">

    

</div>

</div>





</div>

        

    <div class="EmptyStateCard EmptyStateCardProfileFollowing Module">



<section class="centerContent">

    

    <div class="icon"></div>



</section>

<header class="text">

     

</header>

<footer class="text">

    

    

        Follow topics, boards or people to get fresh Pins in your home feed.

    



</footer>

<section class="actionButton">

    

    

        <button class=" Button Module NavigateButton btn hasText primary rounded" data-element-type="220" type="button">







    









<span class="buttonText">

            

            Search for things to follow

        </span>

        

</button>

    



</section>





</div>



</div>