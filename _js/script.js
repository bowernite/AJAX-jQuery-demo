$(function() {
  /* Displays all data on page load */
  showAllChildren();

  /* Allows for imported sortable table javascript */
  // $('children').tablesorter();

  /* Custom features */
  $('.query').click(queryChildren);
  $('.toggle-view').click(function() {
    $('.table-view, .adder-view').toggleClass('hidden');
  });

  // Including child
  $(document.body).on('click', '.adder-btn', function() {
    var data = {
      id: $(this).attr('id'),
      action: $(this).attr('class').includes('true') ? "kick-out" : "allow-in"
    }
    var parent = $(this).parent();
    $.post("change-allowed.php", data, function(data) {

      $('.message').fadeOut(400);

      if (data == false) { // Failure
        $('.error').fadeIn(400).delay(1500).fadeOut(400);
        return;
      } else if (data == "remove") {
        parent.remove();
      } else { // Success
        $('.new-adds').append(data);
      }

      // $('.success:visible').clearQueue().fadeOut(400);
      $('.success').fadeIn(400).delay(1500).fadeOut(400);
      // $('.error').fadeOut(400);
    });

  });

    // Excluding child
    // $(document.body).on('click', '.adder-btn true', function() {
    //   var data = {
    //     id: $(this).attr('id'),
    //     cls: $(this).attr('class'),
    //     action: "kick-out"
    //   }
    //   $.post("change-allowed.php", data, function(result) {
    //     if (result == false) { // Success
    //       $('.error').show();
    //       $('.success').hide();
    //     } else { // Success
    //       $('.success').show();
    //       $('.error').hide();
    //       $()
    //     }
    //   });
  // });



  $('form#new-child').submit(addNewChild);
  $(document.body).on('click', '.allow-in', toggleChildAllowed);
  $(document.body).on('click', '.kick-out', toggleChildAllowed);
});

function showAllChildren() { // Possibly get rid of, replace document load function call to queryChildren -- have to see what $(this) looks like for that :)
  $.get("query.php", function(result) { $('#children tbody').html(result) });

  $.get("query-adder.php?all", function(result) { $('.all-children ul').html(result) });
  $.get("query-adder.php?true", function(result) { $('.included .initial').html(result) });
}

function queryChildren() {
  var qString = "";
  if ($(this).attr('id') == "show-temper") {
    qString += 'has_temper_issues=true';
  }
  $.ajax({
    type:'GET',
    url: 'query.php?' + qString,
    dataType: 'html',
    success: function(result){
      $('#children tbody').html(result);
    } // End of success function of ajax form
  }); // End of ajax call
}

function addNewChild(event) {
  event.preventDefault();
  $.post("insert.php", $(this).serializeArray(), function(data) { $('#children tbody').append(data) });
}

function toggleChildAllowed(event) {
  var id = event.target.id;
  var type = event.target.className;

  $.ajax({
    type:'GET',
    url: 'modify.php?' + id,
    dataType: 'html',
    success: function(result){
      if (type === 'allow-in') {
        $('#' + id + '.' + type).toggleClass('allow-in kick-out').html('Kick Out');
      } else {
        $('#' + id + '.' + type).toggleClass('allow-in kick-out').html('Allow In');
      }
    }
  });
}

function toggleTfoot(event) {

}

function getQueries() {
  var ageSort = $('#age');
  $('#children').append('<td>ageSort</td>');
}

// $('document').load(query(''));
// $('#show-temper').change(query('has_temper_issues=true'));
// $('select').change(getQueries());
