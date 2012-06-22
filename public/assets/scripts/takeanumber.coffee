resource_id = $('#resource-id').data('resource-id')

# Functions to get the number
# read a number from a text file
readNumber = () ->
  $.get "http://www.explo.org/takeanumber/number.php?resourceid=#{resource_id}", (result) ->
    new_number = result.trim()
    old_number = $('#number').html().trim()
    $('#number').html new_number
    $('#number').effect("highlight", {color:"#F68825"}, 1000) if old_number != new_number

window.readNumber = readNumber #make it global
do readNumber #run it once
setInterval(readNumber, 5000) #set it on a loop



# Functions to set the number
incrementNumber = () ->
  $.get "http://www.explo.org/takeanumber/number.php?resourceid=#{resource_id}&increment=1", (result) ->
    $('#number').html result
    $('#number').effect "highlight", {color:"#F68825"}, 1000
window.incrementNumber = incrementNumber #make it global

resetNumber = () ->
  $.get "http://www.explo.org/takeanumber/number.php?resourceid=#{resource_id}&reset=1"
  $('#number').html "1"
window.resetNumber = resetNumber #make it global



# Interface elements
$('#advance').on "click", incrementNumber
$('#reset').on "click", resetNumber
