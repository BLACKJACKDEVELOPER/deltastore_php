<div class="ui modal">
  <div class="header">
    Folders
  </div>
  <div class="content" >

<div id="fo_box">
</div>

  </div>
  <div class="actions">
    <div class="ui black deny button red">
      <i class="icon close"></i>
      Close
    </div>
  </div>
</div>
<!--  -->
<div class="ui left visible demo vertical inverted sidebar labeled icon menu">
  <div class="container_menu">
  <div>
    <a class="item" href="index.php">
    <i class="home icon"></i>
    Home
  </a>
    <a class="item" href="profile.php">
    <i class="address book outline icon"></i>
    Profile
  </a>
  <a class="item" onclick="public.uploadFile()">
    <i class="file icon"></i>
    Upload file
  </a>
  <a class="item" onclick="public.createFolder()">
    <i class="folder icon"></i>
    Create folder
  </a>
  <a class="item" onclick="$('.ui.modal').modal('show');">
    <i class="folder open icon"></i>
    View folder
  </a>
  </div>
  <button class="ui button red logout" onclick="public.logout()">
     <i class="icon power off"></i>
     Logout
   </button>
   </div>
</div>



<script type="text/javascript" src="assets/js/index.js"></script>