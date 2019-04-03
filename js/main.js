$(document).ready(function(){
  fetch_data();

  function fetch_data() {
    $.ajax({
      url:"api/fetch.php",
      success: function(data){
        $('tbody').html(data)
      }
    })
  }
  $('#api_add_form').on('submit', function(e) {
    e.preventDefault();
    if($('#tytul').val() == '')
    {
      alert("wpisz tytuł")
    } else if($('#kategoria').val() == '') {
      alert("wpisz kategorie")
    } else if($('#kwota').val() == '') {
      alert("wpisz kwote")
    } else {
      var form_data = $(this).serialize();
      console.log('aaa')
      $.ajax({
        url:"api/action.php",
        method: "POST",
        data: form_data,
        success: function(data) {
          fetch_data();
          $('#api_add_form')[0].reset();
          console.log('bbb')
          if(data == 'insert') {
            alert('dodano')
          }
          if(data == 'update') {
            alert('dodano')
          }
        }
      })
    }
  })
})