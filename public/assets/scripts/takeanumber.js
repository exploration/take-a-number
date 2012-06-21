(function() {
  var incrementNumber, readNumber, resetNumber;

  readNumber = function() {
    return $.get('http://www.explo.org/takeanumber/number.php', function(result) {
      var old_number;
      old_number = $('#number').html().trim();
      $('#number').html(result);
      if (old_number !== result) {
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
    return $.get('http://www.explo.org/takeanumber/number.php?increment=1', function(result) {
      $('#number').html(result);
      return $('#number').effect("highlight", {
        color: "#F68825"
      }, 1000);
    });
  };

  window.incrementNumber = incrementNumber;

  resetNumber = function() {
    $.get('http://www.explo.org/takeanumber/number.php?reset=1');
    return $('#number').html("1");
  };

  window.resetNumber = resetNumber;

  $('#advance').on("click", incrementNumber);

  $('#reset').on("click", resetNumber);

}).call(this);
