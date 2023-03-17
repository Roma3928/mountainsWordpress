document.addEventListener('DOMContentLoaded', function(){

  let nav =  document.getElementById('nav');
  let hamburger = document.getElementById('hamburger');
  let hamburgerOnClick = document.getElementById('nav__onclick');
  let main = document.getElementById('main');
  let footer = document.getElementById('footer');
  let onclickLink = document.getElementsByClassName('nav__onclick__link');

  window.addEventListener('scroll', function() {
    if (this.scrollY > 1){
      nav.style.backgroundColor = 'rgba(40, 73, 102, 0.7)';
    }
    else{
      nav.style.backgroundColor = 'rgba(40, 73, 102, 0)';
    }
  });


  hamburger.addEventListener("click" , function(){
    if (hamburgerOnClick.style.display == 'block'){
      hamburgerOnClick.style.display = 'none';
      main.style.display = 'block';
      footer.style.display = 'block';
    }
    else{
      hamburgerOnClick.style.display = 'block';
      main.style.display = 'none';
      footer.style.display = 'none';
    }
  });

  
    for (val of onclickLink) {
      val.addEventListener("click" , function(){
        hamburgerOnClick.style.display = 'none';
        main.style.display = 'block';
        footer.style.display = 'block';
      });
    }
});