var current_date = new Date();
console.log(current_date);

//get day
var current_day = current_date.toLocaleString('en-us', {
   weekday: 'long'
});
console.log(current_day);

$(document).ready(function() {
  $(".btn").on('click', function(e) {
    
    e.preventDefault();

  let date = document.getElementById("covidDate").value;
  console.log(typeof(date));
  if(confirm('Agree to declare your covid Case '));

  const post = $.ajax({
    url: 'includes/covidCase.inc.php',
    method: 'POST',
    // dataType: Text,
    data: {date: date},
    success: function(response) {
      console.log(response);
    }
  });

  post.done(boundDate);
  });
});

// function boundDate{
//   // if 
// }
// function covidCase(){

  
