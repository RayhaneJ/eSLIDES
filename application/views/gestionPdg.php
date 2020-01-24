<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="<?php echo base_url();?>css/gestionPdg.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/fontawesome/css/all.css" rel="stylesheet">
<title>gestionPageDeGarde</title>

</head>

<body>
  

<header>
<nav class="navbar  navbar-expand-lg navbar-light bg-dark shadow-sm ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="nav-link"><img src="<?php echo base_url();?>css/RGB-LogoGK.gif" width="145" height="70" alt=""></i></a>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav">
      <li class="active"> <a class="nav-item nav-link" href="<?php echo base_url()?>"><div class="textwhite">Intégration</div></a></li>
      <li> <a class="nav-item nav-link" href="<?php echo base_url('Upload/GestionPdg')?>"><div class="textwhite">Gestion</div></a></li>
      <li> <a class="nav-item nav-link" href="#"><div class="textwhite">Visualisation</div></a></li>
    </ul>
  </div>
</nav>
</header>

<div class="add">
<i class="fas fa-plus-circle fa-4x"></i>
</div>

<div class="container-fluid vertical-align">



<script>

function addPdfLogo(libelle) {
  var container = document.getElementsByClassName('container-fluid vertical-align')[0];

  var div1 = document.createElement("div");
  div1.className = 'pdf';
  var div2 = document.createElement("div");
  div2.className="logo";

  var i1 = document.createElement("i");
  i1.className = 'fas fa-file-pdf fa-9x';
  div2.appendChild(i1);

  div3 = document.createElement('div');
  div3.className="libelle";
  div2.appendChild(div3);

  var i2 = document.createElement("i");
  i2.className='fas fa-cog';

  div1.appendChild(div2);
  div1.appendChild(i2);

  container.appendChild(div1);

  div3.innerHTML += libelle;
}

var libellePdfTab = <?php echo json_encode($libelle); ?>;

libellePdfTab.forEach(element => addPdfLogo(element));

</script>
</body>
</html>