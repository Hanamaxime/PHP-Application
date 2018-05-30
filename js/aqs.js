function getCursorPosition(canvas, event) {
    var rect = canvas.getBoundingClientRect();
    var x = event.clientX - rect.left;
    var y = event.clientY - rect.top;
    console.log("x: " + x + " y: " + y);
}


$(function () {

    $("body").on("click", ".accordion a", function () {
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('active');
    });


    /* GIFT CARD CODE */
    $('#add-to-cart-btn').css("display","none");
    $('.gcard-inform').css("display","none");
    //get chosen template by clicking on it
    var temp_url = "";
    var check_temp = "";
    var dataURL; //save URL customer image
    $('body').on('click','.gc-div', function() {
      alert('You have selected '+ $(this).attr('data'));
      temp_url = $(this).attr('data-img');
      check_temp = $(this).attr('data');
      $('#product_name').val($(this).attr('data'));
      scrollToDiv('#gcard-form');
      $('#sender_name').focus();
    });

    $('body').on('click', '#generate-gcard-temp', function() {
      event.preventDefault();
      //grab value from the form
      var sender_name = $('#sender_name').val().toUpperCase();
      var receipt_name = $("#receipt_name").val().toUpperCase();
      var product_price = $("#product_price").val();

      //validation form value
      if(check_temp === ""){
        alert('Please select a Gift Card Template');
        $('#sender_name').focus();
      }else if(sender_name === ""){
        alert('Please enter your name!');
        $('#sender_name').focus();
      }else if(receipt_name === "") {
        alert('Please enter receipt name!');
        $("#receipt_name").focus();
      }else if(product_price == null || product_price < 50) {
        alert('Gift Card price must be more than $50');
        $("#product_price").focus();
      }else{
          //load images to canvas and add
          var canvas = document.getElementById("giftcard-temp");
          var context = canvas.getContext("2d");
          var imageObj = new Image();


          imageObj.onload = function(){

              //define set of value in canvas
              var temp_color = "#000";
              var price_font_style = "";
              var sender_pos = [0,0];
              var receipt_pos = [0,0];
              var price_pos = [0,0];

              switch (check_temp) { //check template and set corresponding coord
                case 'Giftcard Template 1':
                  price_font_style = "40pt Josefin Sans";
                  temp_color = "#a98d6d";
                  sender_pos = [316, 221];
                  receipt_pos = [313, 170];
                  price_pos = [105, 196];
                  break;
                case 'Giftcard Template 2':
                  price_font_style = "40pt Josefin Sans";
                  temp_color = "#000";
                  sender_pos = [139,232];
                  receipt_pos = [104,197];
                  price_pos = [247,100];
                  break;
                case 'Giftcard Template 3':
                  price_font_style = "40pt Josefin Sans";
                  temp_color = "#5c3c34";
                  sender_pos = [220,224];
                  receipt_pos = [222,247];
                  price_pos = [252,154];
                  break;
                default:
                break;
              }
              //check temp and set position
              context.drawImage(imageObj, 0,0,500,300);
              context.font = price_font_style;
              context.fillStyle = temp_color;
              context.fillText(product_price, price_pos[0], price_pos[1]); //add price text
              context.font = "16pt Josefin Sans";
              context.fillText(receipt_name, receipt_pos[0], receipt_pos[1]); //add receipt name text
              context.fillText(sender_name, sender_pos[0], sender_pos[1]); //add sender name text
              //save image to toDataURL
              dataURL = canvas.toDataURL();
              $('#customised_gcard').val(dataURL);
          };
          canvas.style = "display:block";
          //scroll to final product
          scrollToDiv('#giftcard-temp');
          //show the final product to screen
          imageObj.src = temp_url;
          $('.gcard-inform').css("display","block");
          $('#add-to-cart-btn').css("display","inline-block");
      }

    });




});
