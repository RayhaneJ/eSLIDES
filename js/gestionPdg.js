function addPdfLogo(libelle) {
    var container = document.getElementsByClassName('container-fluid vertical-align')[0];
  
    var div1 = document.createElement("div");
    div1.className = 'pdf';
    var div2 = document.createElement("div");
    div2.className="logo";


    var a = document.createElement("a");
    a.setAttribute("href", base_url + "upload/LoadPdfPage/"+libelle['couleur']+"/"+libelle['libellePdg']+"/"+libelle['version']);
    var i1 = document.createElement("i");
    i1.className = 'fas fa-file-pdf fa-9x';
    a.appendChild(i1);
    div2.appendChild(a);
  
    div3 = document.createElement('div');
    div3.className="libelle";
    div2.appendChild(div3);
  
    var i2 = document.createElement("i");
    i2.className='fas fa-cog';
    
    div1.appendChild(div2);
    div1.appendChild(i2);
  
    container.appendChild(div1);
  
    div3.innerHTML += new String(libelle['libellePdg'] +' - V'+ libelle['version'] + ' ' +'['+libelle['couleur'])+']';
  }