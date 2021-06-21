<div class="header">
    <div class="header1"><img src="images/logor.png" width=90  /></div>
    <div class="header2">
      <div id="container">
        <div id="mainmenu">
          <ul>
            <li><a class="a" href="index.php">&nbsp;Home&nbsp;</a></li>
            <li><a href="register.php" class="a">Register</a></li>
            <li><a href="Buy.php" class="a">Buy</a></li>
            <li><a href="Sale.php" class="a">Sale</a></li>
            <li><a href="Contact.php" class="a">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="headerimage">
  <img src="images/house.png" width='400'>
    <!-- <div class="headeriamge1">
      <div class="house">
      </div>
    </div>
    <div class="headerimage2">
      <div class="buying"><a href="buy.php"> <img src="images/buying.jpg" width=150 height=90 border="0" /></a> </div>
      <div class="selling"><a href="sale.php"> <img src="images/sellings.jpg" width=150 height=90 border="0" /></a> </div>
    </div> -->
    <div>
    
    </div>
  </div>
  <script>
  function setActive() {
  aObj = document.getElementById('mainmenu').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) { 
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='current';
    }
  }
}

window.onload = setActive;
</script>