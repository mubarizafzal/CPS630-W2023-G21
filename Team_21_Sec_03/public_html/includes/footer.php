
<footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <br>
        <br>
        <b>All Rights Reserved</b>
<p id="browser"></p>
<body onload="fnBrowserDetect()"><h1></h1></body>
<script>
function fnBrowserDetect(){
         //as stated in the lab description, utilizing navigator.userAgent to access browser information, declaring empty variable to store string of browser being used       
         let userAgent = navigator.userAgent;
         let browser = "hello world";
         if(userAgent.match(/firefox|fxios/i))
         {
            browser = "Mozilla Firefox";
         }
         else if(userAgent.match(/chrome|chromium|crios/i))
         {
            browser = "Google Chrome";
         }  
         else if(userAgent.match(/safari/i))
         {
            browser = "Apple Safari";
         }
         else
         {
            browser = "Unique";
         }
         //Displaying to the user what browser is being used by outputting the browser variable within html which will execute as soon as the page loads
         document.getElementById("browser").innerHTML="Browser being used: "+ browser;
}

</script> 
      </div>
      
      <br>
        <br>
      <strong>Copyright &copy; 2023 Brought to You By Group 21 for CPS 630 W23</strong>
      
</footer>