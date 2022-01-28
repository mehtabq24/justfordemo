<!DOCTYPE html>
<html>
<head>
	<title></title>


</head>
<body>

	<ul id="cat_list" class="category">

         <li id="cat_4"><a href="javascript:void" class="main-category">WOMEN’S</a>
            
              <ul id="subcat" class="subcategory">
                
                <li id="cat_14">
                 <a href="category_collect_product.php?subcat_name=essentials&amp;cat_id=14" style="">Essentials                      </a>
                </li>

             
               </ul>
          </li>


  
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


        <script type="text/javascript">
    
$(document).ready(function(){

      var cat_id = "#cat_";


    $("#subcat li a").hide();

    $(cat_id+" ul li a").show();

    //window.console&&console.log(cat_id+" ul li");

    $("#cat_list li").click(function(){
    
    $("#subcat li a").hide();

    $("#"+this.id + " ul li a").toggle(500); 

      //window.console&&console.log("#"+this.id+ " ul li a");

      });

    $('#women').click(function(){
      
 //     $("#"+this.id + " ul").toggle();
    });

});
    
</script>


</body>
</html>