// $("#addrow").click(function(){
//     $(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="#" title="Remove row">X</a></div></td><td class="description"><textarea>Description</textarea></td><td><textarea class="cost">$0</textarea></td><td><textarea class="qty">0</textarea></td><td><span class="price">$0</span></td></tr>');
//     if ($(".delete").length > 0) $(".delete").show();
//     bind();
//   });
  
//   bind();
  
//   $(".delete").click(function(){
//     $(this).parents('.item-row').remove();
//     update_total();
//     if ($(".delete").length < 2) $(".delete").hide();
//   });

$('#addrow').click(function(){
  $('.name:last').after('<div class="details"><input type="text" name="item[]" placeholder="Enter Item Name"><input type="text" name="desc[]" placeholder="Enter Description"><input type="float" name="cost[]" placeholder="Enter Cost"><input type="number" name="qty[]" placeholder="Enter Quantity"><input type="float" name="price[]" id="price" placeholder="Price (PKR)" readonly><button class="delete1"><i class="fa fa-times"></i></button></div>');
});