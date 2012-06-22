(function() {
  var hl_color, hl_speed, incrementNumber, number_url, readNumber, resetNumber, resource_id;

  resource_id = $('#resource-id').data('resource-id');

  number_url = "" + location.protocol + "//" + location.host + (location.pathname.split(resource_id)[0]) + "number.php";

  hl_color = "#F68825";

  hl_speed = 250;

  readNumber = function() {
    return $.get("" + number_url + "?resourceid=" + resource_id, function(result) {
      var new_number, old_number;
      new_number = result.trim();
      old_number = $('#number').html().trim();
      $('#number').html(new_number);
      if (old_number !== new_number) {
        return $('#number').effect("highlight", {
          color: hl_color
        }, hl_speed);
      }
    });
  };

  window.readNumber = readNumber;

  readNumber();

  setInterval(readNumber, 5000);

  incrementNumber = function() {
    console.log("" + number_url + "?resourceid=" + resource_id + "&increment=1");
    return $.get("" + number_url + "?resourceid=" + resource_id + "&increment=1", function(result) {
      $('#number').html(result);
      return $('#number').effect("highlight", {
        color: hl_color
      }, hl_speed);
    });
  };

  window.incrementNumber = incrementNumber;

  resetNumber = function() {
    $.get("" + number_url + "?resourceid=" + resource_id + "&reset=1");
    return $('#number').html("1");
  };

  window.resetNumber = resetNumber;

  $('#advance').on("click", incrementNumber);

  $('#reset').on("click", resetNumber);

}).call(this);
