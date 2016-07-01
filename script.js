$(function() {
  /* Displays all data on page load */
  showAllChildren();

  /* Allows for imported sortable table javascript */
  // $('children').tablesorter();

  /* Custom features */
  $('.query').click(queryChildren);
  $('#new-child').submit(addNewChild);
  $(document.body).on('click', '.allow-in', toggleChildAllowed);
  $(document.body).on('click', '.kick-out', toggleChildAllowed);
});

function showAllChildren() {
  $.ajax({
    type:'GET',
    url: 'query.php?',
    dataType: 'html',
    success: function(result){
      $('#children tbody').html(result);
    } // End of success function of ajax form
  }); // End of ajax call
}

function queryChildren(event) {
  var qString = "";
  if (event.target.id == "show-temper") {
    qString = 'has_temper_issues=true';
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

  console.log($('#first_name').val());

  var childData = {
    first: $('#first_name').val(),
    last: $('#last_name').val(),
    age: $('#age').val(),
    height: $('#height_inches').val(),
    weight: $('#weight_pounds').val(),
    dig: $('#digging_skill').val(),
    pack: $('#packing_skill').val(),
    temper: $('#has_temper_issues').is(':checked').toString(),
    color: $('#favorite_color').val(),
    allowed: $('#allowed').is(':checked').toString()
  }

  console.log(childData);

  $.post("insert.php", childData, function(data) { $('#children tbody').append(data) });
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
