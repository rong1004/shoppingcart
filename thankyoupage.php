<!DOCTYPE html>
<html>
<head>
	<title>thank you</title>
    <link rel="stylesheet" href="style.css">
<style>
@mixin vertical-align($position: relative) {
  position: $position;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
body, html {
  background: rgb(193, 250, 212);
}
#wrapper {
  width: 600px;
  margin: 0 auto;
  margin-top: 15%;
}
h1 {
  color: #E#919191;
  text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
  text-align: center;
  font-family: "Monsterrat", sans-serif;
  font-weight: 900;
  text-transform: uppercase;
  font-size: 80px;
  margin-bottom: -5px;
}
h1 underline {
  border-top: 5px solid #16A085;
  border-bottom: 5px solid #16A085;
}
h3 {
  width: 570px;
  margin-left: 16px;
  font-family: "Lato", sans-serif;
  font-weight: 600;
  color: #EEE;
}
</style>

</head>
<body>



<div id="wrapper" class="animated zoomIn">
  <!-- We make a wrap around all of the content so that we can simply animate all of the content at the same time. I wanted a zoomIn effect and instead of placing the same class on all tags, I wrapped them into one div! -->
<h1>
  <!-- The <h1> tag is the reason why the text is big! -->
  <underline>Thank you!</underline>
  <!-- The underline makes a border on the top and on the bottom of the text -->
</h1>

</div>


</body>
</html>

<script>
$( document ).ready(function() {
  // perform some jQuery when page is loaded
  
$("h1").hover(function() { 
  // when user is hovering the h1
  $( this ).addClass("animated infinite pulse"); 
  // we add pulse animation and to infinite
}, function() {
  // when user no longer hover on the h1
  $( this ).removeClass("animated infinite pulse");
  // we remove the pulse
});
});
</script>