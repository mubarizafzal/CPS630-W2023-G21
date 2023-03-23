
<script src="components/jquery/dist/jquery.min.js"></script>

<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Drag & Drop -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var dragSrcEl = null;
        
        function handleDragStart(e) {
            this.style.opacity = '0.4';
            
            dragSrcEl = this;
            
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
        }
        
        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault();
            }
            
            e.dataTransfer.dropEffect = 'move';    
            return false;
        }
        
        function handleDragEnter(e) {
            this.classList.add('over');
        }
        
        function handleDragLeave(e) {
            this.classList.remove('over');
        }
        
        function handleDrop(e) {
            if (e.stopPropagation) {
                e.stopPropagation();
            }
            
            if (dragSrcEl != this) {
                dragSrcEl.innerHTML = this.innerHTML;
                this.innerHTML = e.dataTransfer.getData('text/html');
            }
            
            return false;
        }
        
        function handleDragEnd(e) {
            this.style.opacity = '1';
            items.forEach(function (item) {
                item.classList.remove('over');
            });
        }
        
        let items = document.querySelectorAll('.container .box');
        items.forEach(function(item) {
            item.addEventListener('dragstart', handleDragStart, false);
            item.addEventListener('dragenter', handleDragEnter, false);
            item.addEventListener('dragover', handleDragOver, false);
            item.addEventListener('dragleave', handleDragLeave, false);
            item.addEventListener('drop', handleDrop, false);
            item.addEventListener('dragend', handleDragEnd, false);
        });
        let items2 = document.querySelectorAll('.container2 .box');
        items2.forEach(function(item) {
            item2.addEventListener('dragstart', handleDragStart, false);
            item2.addEventListener('dragenter', handleDragEnter, false);
            item2.addEventListener('dragover', handleDragOver, false);
            item2.addEventListener('dragleave', handleDragLeave, false);
            item2.addEventListener('drop', handleDrop, false);
            item2.addEventListener('dragend', handleDragEnd, false);
        });
        
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
