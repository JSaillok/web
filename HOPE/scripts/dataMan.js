function readFile(input){
   const file = new FileReader();
   file.readAsText(input.files[0]);

   file.onload = function(e){
      //convert to js object
      const data = JSON.parse(e.currentTarget.result);//object
      console.log(e.currentTarget.result);
      console.log(typeof data);
      console.log(typeof file);//object
      const p = JSON.stringify(e.currentTarget.result); //string
      console.log(typeof p);

   $("#upload").click(function() {
      console.log(data);
      const result = $.ajax({
         url: 'includes/json.php',
         dataType: 'json',
         method: 'POST',
         data: p,
         contentType:'application/json',
         processData: false,
         success: function(res){
            console.log("Clicked");
            console.log(res);
         }
      });
      console.log(result);
      });
   }
}