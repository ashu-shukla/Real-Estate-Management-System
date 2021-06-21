<div class="header">
  <div class="header1"><img src="../images/logor.png" width=90 /></div>
  <div class="header2">
      <div id="container">
        <div id="mainmenu">
          <ul>
            <li><a href="index.php" class="a">Home</a></li>
            <li><a href="Profile.php" class="a">Profile</a></li>
            <li><a href="Buy.php" class="a">Buy</a></li>
            <li><a href="Sale.php" class="a">Sell</a></li>
           
            <li><a href="Logout.php" class="a">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="headerimage">
    <img src="../images/house2.png" style="text-align:center;padding:10px" width='300'>
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