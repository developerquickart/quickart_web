<html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <div id="searchLoader" style="display:block; text-align: center; padding: 20px;">
    <img src="https://www.quickart.ae/assets/images/loader.gif" alt="Loading..." width="150">
  </div>  

<style>
    div#searchLoader {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    position: fixed;
    inset: 0px;
    z-index: 1000;
    height: 100vh;
    overflow: hidden;
    outline: 0px;
    margin: auto;
    top:50%;
}
</style> 

<script>
  $(document).ready(function () {
    setTimeout(function () {
      window.location.href = "{{ rtrim(env('NODE_APP_URL'), '/') }}/success"; // your target URL
    }, 5000); 
  });
</script>
</html>
