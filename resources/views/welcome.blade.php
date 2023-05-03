<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Gestoin Des emplois Du Temps</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="sara mazal lessons">
<meta name="keywords" content="HTML, CSS, JavaScript, mazal, icons">
<meta name="author" content="Sara Mazal">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;300;400;500&family=Raleway:wght@100;200;300;400;500&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
  <script>
window.onload = function () {
  Particles.init({
    selector: ".background"
  });
};
const particles = Particles.init({
  selector: ".background",
  color: ["#03dac6", "#ff0266", "#000000"],
  connectParticles: true,
  responsive: [
    {
      breakpoint: 768,
      options: {
        color: ["#faebd7", "#03dac6", "#ff0266"],
        maxParticles: 43,
        connectParticles: false
      }
    }
  ]
});

class NavigationPage {
  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    this.lastScroll = 0;
    let self = this;
    $(".nav-tab").click(function () {
      self.onTabClick(event, $(this));
    });
    $(window).scroll(() => {
      this.onScroll();
    });
    $(window).resize(() => {
      this.onResize();
    });
  }

  onTabClick(event, element) {
    event.preventDefault();
    let scrollTop =
      $(element.attr("href")).offset().top - this.tabContainerHeight + 1;
    $("html, body").animate({ scrollTop: scrollTop }, 600);
  }

  onScroll() {
    this.checkHeaderPosition();
    this.findCurrentTabSelector();
    this.lastScroll = $(window).scrollTop();
  }

  onResize() {
    if (this.currentId) {
      this.setSliderCss();
    }
  }

  checkHeaderPosition() {
    const headerHeight = 75;
    if ($(window).scrollTop() > headerHeight) {
      $(".nav-container").addClass("nav-container--scrolled");
    } else {
      $(".nav-container").removeClass("nav-container--scrolled");
    }
    let offset =
      $(".nav").offset().top +
      $(".nav").height() -
      this.tabContainerHeight -
      headerHeight;
    if (
      $(window).scrollTop() > this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".nav-container").addClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").addClass("nav-container--top-second");
    } else if (
      $(window).scrollTop() < this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".nav-container").removeClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-second");
      $(".nav-container-container").addClass("nav-container--top-first");
    } else {
      $(".nav-container").removeClass("nav-container--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").removeClass("nav-container--top-second");
    }
  }

  findCurrentTabSelector(element) {
    let newCurrentId;
    let newCurrentTab;
    let self = this;
    $(".nav-tab").each(function () {
      let id = $(this).attr("href");
      let offsetTop = $(id).offset().top - self.tabContainerHeight;
      let offsetBottom =
        $(id).offset().top + $(id).height() - self.tabContainerHeight;
      if (
        $(window).scrollTop() > offsetTop &&
        $(window).scrollTop() < offsetBottom
      ) {
        newCurrentId = id;
        newCurrentTab = $(this);
      }
    });
    if (this.currentId != newCurrentId || this.currentId === null) {
      this.currentId = newCurrentId;
      this.currentTab = newCurrentTab;
      this.setSliderCss();
    }
  }

  setSliderCss() {
    let width = 0;
    let left = 0;
    if (this.currentTab) {
      width = this.currentTab.css("width");
      left = this.currentTab.offset().left;
    }
    $(".nav-tab-slider").css("width", width);
    $(".nav-tab-slider").css("left", left);
  }
}

new NavigationPage();
  </script>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "ROBOTO", sans-serif;
}

.nav,
.slider {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
  position: relative;
  background-color: #1e1f26;
  text-align: center;
  padding: 0 2em;
}

.nav h1,
.slider h1 {
  font-family: "Josefin Sans", sans-serif;
  font-size: 5vw;
  margin: 0;
  padding-bottom: 0.5rem;
  letter-spacing: 0.5rem;
  color: #03dac6;
  transition: all 0.3s ease;
  z-index: 3;
}
h1:hover {
  transform: translate3d(0, -10px, 22px);
  color: #ff0266;
}

.slider h2 {
  font-size: 2vw;
  letter-spacing: 0.3rem;
  font-family: "ROBOTO", sans-serif;
  font-weight: 300;
  color: #faebd7;
  z-index: 4;
}
h3.span {
  font-size: 2vw;
  letter-spacing: 0.6em;
  font-family: "ROBOTO", sans-serif;
  font-weight: 300;
  color: #faebd7;
  z-index: 4;
}
span:hover {
  color: #ff0266;
  font-weight: 500;
  font-size: 2.2vw;
}

a {
  text-decoration: none;
}

.nav-container {
  display: flex;
  flex-direction: row;
  position: absolute;
  top: 1%;
  width: 100%;
  height: 75px;
  box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
  background: #1e1f26;
  z-index: 10;
  transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.nav-container--top-first {
  position: fixed;
  top:0px;
  transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.nav-container--top-second {
  position: fixed;
  top: 0%;
}
.nav-tab {
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
  color: #03dac6;
  letter-spacing: 0.1rem;
  transition: all 0.5s ease;
  font-size: 2vw;
}

.nav-tab:hover {
  color: #1e1f26;
  background: #03dac6;
  transition: all 0.5s ease;
}

.nav-tab-slider {
  position: absolute;
  bottom: 0;
  width: 0;
  height: 2px;
  background: #03dac6;
  transition: left 0.3s ease;
}
.background {
  position: absolute;
  height: 90vh;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: auto;
}
@media (min-width: 800px) {
  .nav h1,
  .slider h1 {
    font-size: 5vw;
  }

  .nav h2,
  .slider h2 {
    font-size: 3vw;
  }

  .nav-tab {
    font-size: 3vw;
  }
}

@media screen only (min-width: 360px) {
  .nav h1,
  .slider h1 {
    font-size: 8vw;
  }

  .nav h2,
  .slider h2 {
    font-size: 2vw;
    letter-spacing: 0.2vw;
  }

  .nav-tab {
    font-size: 1.2vw;
  }
}
.background {
  position: absolute;
  height: 100vh;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 0;
}


@-webkit-keyframes loading {
  to {
    text-shadow: 20px 0 70px #ff0266;
    color: #ff0266;
  }
}

pre{
  font-family: font-family: serif;
  color: #faebd7;
  font-family: MV Boli;
  line-height: 30px;
}
pre::first-letter {
    font-size: 1.5rem;
    font-weight: bold;
    color: rgb(0, 153, 255);

}
h4{
  margin-top: 8%;
  margin-right: 0%
}
  </style>
  <div class="nav-container"><a href="{{ route("acceil") }}" class="nav-tab">Accueil</a><a class="nav-tab" href="http://127.0.0.1:8000/register">Inscription</a><a class="nav-tab" href="http://127.0.0.1:8000/login">Connexion</a><span class="nav-tab-slider"></span></div>
<sectio class="nav">
  <h1 style style="margin-top: 0%;">Gestoin Des emplois Du Temps</h1>
<pre> Bienvenue sur notre application web de gestion des emplois du temps d'une faculte.
                                application permet aux etudiants et aux enseignants de consulter les emplois du temps de chaque classe.
            La gestion de l’emploi est un sous-ensemble important de la gestion des ressources
             humaines de l’entreprise. Sur les plans individuel et collectif, à l’occasion notamment
      de reconversions professionnelles induites par des mutations dans l’organisation
                                    ou les technologies. Son objet est donc de rapprocher au mieux les besoins et les ressources en professionnelles
</pre>
<h4>Informations sur l'application</h4>
<ul id="NV">
  <li>Nom de l'application : Gestion des emplois du temps d'une faculte</li>
  <li>Version : 1.0</li>
  <li>Developpeur : [Nom du developpeur]</li>
  <li>Date de creation : [Date de creatoin]</li>
</ul>
</sectio>
<canvas class="background"></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>
