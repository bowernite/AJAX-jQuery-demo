$(function() {
  /* Displays all data on page load */
  showAllChildren();

  /* Allows for imported sortable table javascript */
  // $('children').tablesorter();

  /* Custom features */
  $('.query').click(queryChildren);
  $('#new-child').submit(addNewChild);
  $(document.body).on('click', '.allow-in', modifyChild);
  $(document.body).on('click', '.kick-out', modifyChild);
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
    first_name: $('#first_name').val(),
    last_name: $('#last_name').val(),
    height_inches: $('#height_inches').val(),
    weight_pounds: $('#weight_pounds').val(),
    digging_skill: $('#digging_skill').val(),
    packing_skill: $('#packing_skill').val(),
    has_temper_issues: $('#has_temper_issues').val(),
    favorite_color: $('#favorite_color').val(),
    allowed: $('#allowed').val()
  }

  console.log(childData);

  $.post("insert.php", childData, function(data) { $('#children tbody').append(data) });
}

function modifyChild(event) {
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
