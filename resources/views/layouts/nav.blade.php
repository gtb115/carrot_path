<script src="/js/home.js"></script>
<style>
/*ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 24px 26px;
  text-decoration: none;
  color: #5F0292;
  font-weight: bold;
}

.logo {
  height: auto;
  width: 68px;
  color: #5F0292;
  float: left;
  text-align: center;

}*/

.logo {
  height: auto;
  width: 68px;
  color: #5F0292;
  float: left;
  text-align: center;
}

nav {
  background-color: blue;
}

/*#dropbtn {
    height: 66px;
    width: 68px;
    color: white;
    margin-top: 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    
}*/

/*#dropbtn div {
    width: 35px;
    height: 5px;
    background-color: #5F0292;
    margin: 6px 0;

}*/

.dropdown {
    position: relative;
    
    float: left;
    margin-bottom: 1em;
    background-color: ;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: auto;
    padding: .5em;
    z-index: 1;
    color: #5F0292;
}

.dropdown-content a {
    color: #5F0292;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    margin: auto 0;
}

.dropdown-content a:hover {background-color: #f1f1f1}


#dropbtn {
  width: 60px;
  height: 20px;
  position: relative;
  margin: 20px auto;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .5s ease-in-out;
  -moz-transition: .5s ease-in-out;
  -o-transition: .5s ease-in-out;
  transition: .5s ease-in-out;
  cursor: pointer;
}

#dropbtn div{
  display: block;
  position: absolute;
  height: 10px;
  width: 70%;
  background: #5F0292;
  border-radius: 4px;
  opacity: 1;
  left: 0;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .25s ease-in-out;
  -moz-transition: .25s ease-in-out;
  -o-transition: .25s ease-in-out;
  transition: .25s ease-in-out;
}

#dropbtn div:nth-child(1) {
  top: 0px;
}

#dropbtn div:nth-child(2) {
  top: 12px;
}

#dropbtn div:nth-child(3) {
  top: 24px;
}

#dropbtn.open div:nth-child(1) {
  top: 12px;
/*   -webkit-transform: rotate(160deg);
  -moz-transform: rotate(160deg);
  -o-transform: rotate(160deg); */
  transform: rotate(115deg);
  margin-left: 20px;
}

#dropbtn.open div:nth-child(2) {
  top: 12px;
  transform: rotate(90deg);
  
}

#dropbtn.open div:nth-child(3) {
  top: 12px;
/*   -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -o-transform: rotate(-135deg); */
  transform: rotate(-115deg);
  margin-left: -20px;
}

</style>



  <nav>
    <div class="logo"><h1>CP</h1></div>
  <div class="dropdown">
  <!-- <div class="dropbtn" style="color: #5F0292";>☰</button> -->
  <div id="dropbtn">
  <div></div>
<div></div>
<div></div>
</div>
  <div class="dropdown-content">
    <a href="#">Log-In</a>
    <a href="#">Sign-Up</a>
    <a href="#">Browse</a>
    <a href="#">Contact</a>
  </div>
</div>
  </nav>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="/js/home.js"></script>
