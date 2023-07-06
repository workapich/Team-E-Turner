
window.onload = function() {
  updateCart();
};

function updateCart()
{
  var cartItemContainer = document.getElementsByClassName('row')[0];
  var cartRows = cartItemContainer.getElementsByClassName('col');
  var total = 0;
  for(var i=0; i <cartRows.length; i++)
  {
      var cartRow = cartRows[i];
      var priceElement = cartRow.getElementsByClassName('cart-price')[0];
      var price =parseFloat(priceElement.innerHTML.replace('$',''));
      // console.log(price)
      var quantityElement = cartRow.getElementsByClassName('cart-quantity1')[0];
      
      // var quantityElement = document.getElementById('quantity-' + productId);
      var quantity = parseInt(quantityElement.innerHTML);
        // console.log(quantity);
  total=total+(price*quantity);

  }
  document.getElementsByClassName('total-number')[0].innerText = total
}




function changeQuantity(productId, change) {
  var quantityElement = document.getElementById('quantity-' + productId);
  var quantity = parseInt(quantityElement.innerHTML);

  // Update the quantity
  quantity += change;
  if (quantity < 1) {
      
      $.ajax({
          url: 'delete.php',
          method: 'POST',
          data: { productId: productId },
          success: function(response) {
    
    
    
            // Display the result
          //   $('.row').text(response);
          //   updateCart();
            
          }
     
        });


        $.ajax({
          url: 'refresh.php',
          method: 'GET',
          success: function() {
            // Reload the page
            location.reload();
          }
        });

      
      quantity = 1;
  }
  if (quantity >10) {
      quantity = 10;
  }
  quantityElement.innerHTML = quantity;
   
}


function deleteFunction () {
  // Attach a click event handler to the delete buttons
  $('.delete-button').click(function() {
   
    var productId = $(this).data('product-id');
    
    // Send an AJAX request to delete the item
    $.ajax({
      url: 'delete.php',
      method: 'POST',
      data: { productId: productId },
      success: function(response) {



        // Display the result
      //   $('.row').text(response);
      //   updateCart();
        
      }
 
    });

 
  });
  
}

$(document).ready(deleteFunction());

$(document).ready(function() {
  // Attach a click event handler to the refresh button
  $('.delete-button').click(function() {
    // Send an AJAX request to refresh the page
    $.ajax({
      url: 'refresh.php',
      method: 'GET',
      success: function() {
        // Reload the page
        location.reload();
      }
    });
  });
});
