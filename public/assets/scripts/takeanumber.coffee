# Page parameters
resource_id = $('#resource-id').data('resource-id')
number_url = "#{location.protocol}//#{location.host}#{location.pathname.split(resource_id)[0]}number.php"

# Effects parameters
hl_color = "#F68825"
hl_speed = 500

# Functions to get the number
# read a number from a text file
readNumber = () ->
  $.get "#{number_url}?resourceid=#{resource_id}", (result) ->
    new_number = result.trim()
    old_number = $('#number').html().trim()
    $('#number').html new_number
    $('#number').effect("highlight", {color:hl_color}, hl_speed) if old_number != new_number

window.readNumber = readNumber #make it global
do readNumber #run it once
setInterval(readNumber, 5000) #set it on a loop



# Functions to set the number
incrementNumber = () ->
  $.get "#{number_url}?resourceid=#{resource_id}&increment=1", (result) ->
    $('#number').html result
    $('#number').effect "highlight", {color:hl_color}, hl_speed
window.incrementNumber = incrementNumber #make it global

resetNumber = () ->
  $.get "#{number_url}?resourceid=#{resource_id}&reset=1"
  $('#number').html "1"
window.resetNumber = resetNumber #make it global



# Interface elements
$('#advance').on "click", incrementNumber
$('#reset').on "click", resetNumber
