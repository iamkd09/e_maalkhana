<?php include('header.php') ?>
<?php include('conn.php') ?>
<head>
<title>
  E-Malkhana otp verification
</title>
</head>

<body class="user-profile">
<div class="desk-view">

<div class="desk-login">
 <div class="pp-logo-icon">
  <img src="./assets/img/police_Logo.png" />
 </div> 
<div> 
<div class="card-new w-395">
  <img src="./assets/img/logo.png" class="card-img-top" alt="Card image">
  <div class="card-body">
  <div class="card-header card-align">
    <h4 class="text-center"><b><span><?php echo $lang['e'] ?></span>-<span><?php echo $lang['malkhana'] ?></span></b></h4>
  </div>
      <div class="card-header custom-padding">
          <?php
          $number = $_SESSION['contact'];
          $last_four_digits = substr($number, -4); 
          $first_six_digits = str_pad('', 6, '*', STR_PAD_LEFT); 
          $dynamic_code = '<div class="green"> <span>'.$lang['otp_sent'].'</span> <small>' . $first_six_digits . $last_four_digits . '</small> </div>'; 
          echo $dynamic_code; 
        ?>
      <br />
      <h6 style="text-transform:none;"><?php echo $lang['enter_otp'] ?></h6>
      <form action="otp_auth.php" method="POST" autocomplete="off" >
      <div class="card-body">
          <div id="otp" class="inputs d-flex flex-row justify-content-center otp_new otp-alignment" name="otp"> 
  <input class="m-2 text-center form-control rounded ap-otp-input" id="partitioned" type="tel" pattern="[0-9]*" inputmode="numeric" name="otp1" id="first" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); validateInput(this);" required /> 
  <input class="m-2 text-center form-control rounded ap-otp-input" id="partitioned" type="tel" pattern="[0-9]*" inputmode="numeric" name="otp2" id="second" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); validateInput(this);" required /> 
  <input class="m-2 text-center form-control rounded ap-otp-input" id="partitioned" type="tel" pattern="[0-9]*" inputmode="numeric" name="otp3" id="third" maxlength="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); validateInput(this);" required /> 
  <input class="m-2 text-center form-control rounded ap-otp-input" id="partitioned" type="tel" pattern="[0-9]*" inputmode="numeric" name="otp4" id="fourth" maxlength="1"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); validateInput(this);" required />

  <input type="hidden" name="contact" value="<?php echo $_SESSION["contact"]?>" /> 
</div>

          <?php 
            if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
              echo $_SESSION['msg'];
            }
          ?>
          <div class="mt-4 form-group"> 
          <button class="btn btn-danger px-4 validate" name="validate"><?php echo $lang['validate'] ?></button> 
          </div>
      </div>
      </form>
    </div>
    <div class="card-2">
      <div class="content d-flex justify-content-center align-items-center"> <span><?php echo $lang['not_got_otp'] ?> </span> <a href="#" class="text-decoration-none  ms-3"><?php echo $lang['resend_otp'] ?></a> </div>
    </div>
</div>
</div>
</div>
<div>
</div>  
</body>

<script>

function validateInput(input) {
  input.value = input.value.replace(/[^0-9]/g, ''); // Remove any non-numeric characters
}

   const $inp = $(".ap-otp-input");

$inp.on({
  paste(ev) { 
  
    const clip = ev.originalEvent.clipboardData.getData('text').trim();
    if (!/\d{6}/.test(clip)) return ev.preventDefault(); 
    const s = [...clip];
    $inp.val(i => s[i]).eq(5).focus(); 
  },
  input(ev) { 
    
    const i = $inp.index(this);
    if (this.value) $inp.eq(i + 1).focus();
  },
  keydown(ev) { 
    
    const i = $inp.index(this);
    if (!this.value && ev.key === "Backspace" && i) $inp.eq(i - 1).focus();
  }
  
});
</script>
