<div class="header">
  <div class="header1">
    <img src="../images/logor.png" width=90 />
  </div>
  <div class="header2">
      <div id="container">
        <div id="mainmenu">
          <ul>
            <li><a class="a" href="index.php">Home</a></li>
            <li><a  href="Property.php" class="a">Property</a></li>
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