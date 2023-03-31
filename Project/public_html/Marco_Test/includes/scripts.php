
<script src="components/jquery/dist/jquery.min.js"></script>

<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Drag & Drop -->
<script>
document.addEventListener('DOMContentLoaded', (event) => {
  var dragSrcEl = null;
      
  function handleDragStart(e) {
    this.style.opacity = '0.4';
    
    dragSrcEl = this;
  }
      
  function handleDragEnd(e) {
    this.style.opacity = '1';

    dragSrcEl = null
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }
    
    return false;
  }
  
  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation();
    }

    if (dragSrcEl) {
      id = dragSrcEl.id.split('_')[1]
      price = dragSrcEl.id.split('_')[2]

      $.ajax({
        type: 'POST',
        url: 'cart_add.php',
        data: `quantity=1&id=${id}&price=${price}`,
        dataType: 'json',
        success: function(response){
          $('#callout').show();
          $('.message').html(response.message);
          if(response.error){
            $('#callout').removeClass('callout-success').addClass('callout-danger');
          }
          else{
          $('#callout').removeClass('callout-danger').addClass('callout-success');
          getCart();
          }
        }
      });
    }

    return false;
  }

  let items = document.querySelectorAll('.container .box');
  items.forEach(function(item) {
    item.addEventListener('dragstart', handleDragStart, false);
    item.addEventListener('dragend', handleDragEnd, false);
  });
    

  let shoppingCart = document.getElementById('shopping_cart')

  shoppingCart.addEventListener('dragover', handleDragOver, false)
  shoppingCart.addEventListener('drop', handleDrop, false)

});
</script>

<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

  $(".branch").on('click', function() {
    var newBranch = this.innerHTML
    $.ajax({
  		type: 'POST',
  		url: 'select_branch.php',
  		data: `branch=${newBranch}`,
  		dataType: 'json',
  		success: function(response){
        $("#selected-branch").html(newBranch)
  		}
  	});
  })

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>
