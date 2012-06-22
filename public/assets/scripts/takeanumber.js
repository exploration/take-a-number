(function() {
  var incrementNumber, readNumber, resetNumber, resource_id;

  resource_id = $('#resource-id').data('resource-id');

  readNumber = function() {
    return $.get("http://www.explo.org/takeanumber/number.php?resourceid=" + resource_id, function(result) {
      var new_number, old_number;
      new_number = result.trim();
      old_number = $('#number').html().trim();
      $('#number').html(new_number);
      if (old_number !== new_number) {
        return $('#number').effect("highlight", {
          color: "#F68825"
        }, 1000);
      }
    });
  };

  window.readNumber = readNumber;

  readNumber();

  setInterval(readNumber, 5000);

  incrementNumber = function() {
    return $.get("http://www.explo.org/takeanumber/number.php?resourceid=" + resource_id + "&increment=1", function(result) {
      $('#number').html(result);
      return $('#number').effect("highlight", {
        color: "#F68825"
      }, 1000);
    });
  };

  window.incrementNumber = incrementNumber;

  resetNumber = function() {
    $.get("http://www.explo.org/takeanumber/number.php?resourceid=" + resource_id + "&reset=1");
    return $('#number').html("1");
  };

  window.resetNumber = resetNumber;

  $('#advance').on("click", incrementNumber);

  $('#reset').on("click", resetNumber);

}).call(this);
