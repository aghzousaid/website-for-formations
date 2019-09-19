<?php
    include('header/header.php');
?>

<script>

var debounce = function(func, wait, immediate) {

"use strict";

var timeout;
return function() {
  var context = this;
  var args = arguments;
  var later = function() {
    timeout = null;
    if ( !immediate ) {
      func.apply(context, args);
    }
  };
  var callNow = immediate && !timeout;
  clearTimeout(timeout);
  timeout = setTimeout(later, wait || 200);
  if ( callNow ) {
    func.apply(context, args);
  }
};
};



// peek-a-boo.7.3.js - Mike Foskett - https://websemantics.uk/articles/peek-a-boo-v7/

// Show - hide a block - adapted for FAQ
// Requires:
//    setAttribute / getAttribute (IE9+)
//    classList (IE10+)  - disabled
//    addEventListener (IE9+)
//    requestAnimationFrame (IE10+) - replace with requestAF() for IE9
//    querySelectorAll
//    preventDefault
//    debounce()

  

// FAQ version:
// v7.4 Added: open an question from an internal anchor
// v7.3 Expanded when URI fragment matches the target ID
// v7.2 HTML button reinstated, js adjusted.
//			Initial open/close state reworked


var Pab = (function (window, document, debounce) {
  
  // Terminology used:
  // toggle - The dynamically added button used to toggle the hidden content
  // target - The object which contains the hidden content
  // toggleParent - The object which will, or does, contain the toggle button

"use strict";

var dataAttr = "data-pab";
var attrName = dataAttr.replace("data-", "") + "_";
var btnClass = dataAttr.replace("data-", "") + "-btn";
var dataExpandAttr = dataAttr + "-expand";
var internalId = 1;


function $ (selector) {
  return Array.prototype.slice.call(document.querySelectorAll(selector));
}


function _isExpanded (obj) { // or not aria-hidden
  return obj && (obj.getAttribute("aria-expanded") === "true" || obj.getAttribute("aria-hidden") === "false");
}


// This function is globally reusable. Perhaps externalise for reuse?  
// Get height of an element object
// Assumes it is hidden by max-height: 0 in the CSS
  var _getHiddenObjectHeight = function (obj) {
  obj.setAttribute("style", "max-height: none");
      var height = obj.scrollHeight;
  obj.removeAttribute("style");
      return height;
  };

var _openCloseToggleTarget = function (toggle, target, isExpanded) {
  toggle.setAttribute("aria-expanded", !isExpanded);
  _setToggleMaxHeight(target);
  window.requestAnimationFrame(function(){
    target.setAttribute("aria-hidden", isExpanded);
  });
  // _setToggleSvgTitle(toggle); - not enough support to be useful
};


var _setToggleMaxHeight = function (target) {
  if (_isExpanded(target)) {
    // max-height overidden by CSS !important
    // target.style.maxHeight = 0;
  } else {
    target.style.maxHeight = _getHiddenObjectHeight(target) + "px";
  }
};

var _toggleClicked = function (event) {

  var toggle = event.target;
  var target;
  var isExpanded;

  if (toggle) {

          // To prevent children bubbling up to parent causing more than one click event
          event.stopPropagation();

    target = document.getElementById(toggle.getAttribute("aria-controls"));
    if (target) {
      isExpanded = _isExpanded(toggle);
      _openCloseToggleTarget(toggle, target, isExpanded);
    }
  }
};


var _addToggleListeners = function (toggle) {
  // Simpler to mangage here rather than in a global handler (consider hover and blur)
  toggle.addEventListener("click", _toggleClicked, false);

};


var _setUpToggle = function (toggle) {

      // Create a html button, add content from parent, replace original parent content.
      var btn = document.createElement("button");
      
      btn.className = btnClass;
      btn.innerHTML = toggle.innerHTML;
      btn.setAttribute("aria-expanded", false);
      btn.setAttribute("id", attrName + internalId++);
      btn.setAttribute("aria-controls", toggle.getAttribute(dataAttr));

      toggle.innerHTML = "";
      toggle.appendChild(btn);
      
      return btn;
  };


  // Prestating the container class in the HTML allows the CSS to render before JS kicks in.
  // Add container class to parent if not prestated
var _setUpToggleParent = function (toggle) {
  var parent = toggle.parentElement;
  if (parent && !parent.className.match(attrName + "container")) {
    //parent.classList.add(attrName + "container");
    parent.className += " " + attrName + "container";
  }
};


var _addToggleSVG = function (toggle) {
  var clone = toggle.cloneNode(true);
  if (!clone.innerHTML.match("svg")) {

    // HTML SVG definition allows more control
    clone.innerHTML += "<svg role=presentational focusable=false class=" + dataAttr.replace("data-", "") + "-svg-plus><use class=\"use-plus\" xlink:href=\"#icon-vert\" /><use xlink:href=\"#icon-hori\"/></svg>";
    //requestAnimationFrame(function () {
      toggle.parentElement.replaceChild(clone, toggle);
    //});
  }
  return clone;
};


var _setUpTargetAria = function (toggle, target) {
  target.setAttribute("aria-hidden", !_isExpanded(toggle));
  target.setAttribute("aria-labelledby", toggle.id);
};


var _resetAllTargetsMaxHeight = function () {
  var toggles = document.querySelectorAll("[" + dataAttr + "]");
  var i = toggles.length;
  var target;
  while (i--) {
    target = document.getElementById(toggles[i].getAttribute(dataAttr));
    if (target) {
      target.style.maxHeight = _getHiddenObjectHeight(target) + "px";
    }
  }
};


  var isMustardCut = function () {
      return (document.querySelectorAll && document.addEventListener);
  };


  var _openIfRequired = function (toggle, target) {
      
      var fragmentId = window.location.hash.replace("#", "");
      
      // Expand by default "data-pab-expand" small delay applied
      if (toggle.parentElement.hasAttribute(dataExpandAttr)) {
          // setTimeout(function () {
          //     _openCloseToggleTarget(toggle, target, _isExpanded(toggle));
          // }, 500);
      }
  

      // Check url fragment and if target ID matches, open it
      if (target.id === fragmentId) {
          setTimeout(function () {
              _openCloseToggleTarget(toggle, target, false);
              toggle.focus();
          }, 500);
      }

  };


  var addSingleToggleTarget = function (toggleParent) {

      var targetId = toggleParent.getAttribute(dataAttr);
      var target = document.getElementById(targetId);
      var toggle;

      if (target && isMustardCut) {
          toggle = _setUpToggle(toggleParent);
          _setUpToggleParent(toggleParent);
          toggle = _addToggleSVG(toggle);
          _setUpTargetAria(toggle, target);
          _addToggleListeners(toggle);
          _openIfRequired(toggle, target);
      }
  };

var hashChanged = function (e) {
  var fragmentId = window.location.hash.replace("#", "");
  var toggle = document.querySelector("#" + fragmentId + " > ." + btnClass);
  var target = document.getElementById(toggle.getAttribute("aria-controls"));
  if (!toggle || !target) {return false;}

  toggle.focus();
  toggle.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});

  _openCloseToggleTarget(toggle, target, false);
};

var addToggles = function () {

      // Iterate over all toggles (elements with the "data-pab" attribute)
      var togglesMap = $("[" + dataAttr + "]").reduce(function (temp, toggleParent) {
          addSingleToggleTarget(toggleParent);
          return true;
      }, {});

  return true;
};

if (isMustardCut) {
    window.addEventListener("load", addToggles, false);

    // Recalculate all target max-heights after (debounced) window is resized.
    window.addEventListener("resize", debounce(_resetAllTargetsMaxHeight, 500), false);

    // On fragment change
    window.addEventListener("hashchange", hashChanged, false);
}

return {
  // Exposes an addition function to the global scope allowing toggle & target to be added dynamically.
      add: addSingleToggleTarget
};

}(window, document, debounce));

</script>

<div class="info_page_elearning">
  <div class="ref_el">
  </div>

  <div class="titre_elearning">
      <div class="shadow-lg p-3 mb-5 "><center><h1 class="titre_body">ON RÉPOND À VOS QUESTIONS</h1>
      <p>Avec Kamedis Institut : </p> 
      </center></div>
  </div>
</div>


<center><h1>FORMATION DPC </h1>
<hr id="lign_form_dpc"align="center" width="300" height:"20"  border-top: "5px bold"></center>
<dl class="dl-faq pab_container">

  <dt data-pab=faq_1><span><b>Une formation DPC, c’est quoi ?</b></span></dt>

  <dd id=faq_1>
    <div>
      <p>Initié par la loi Hôpital, Patients, Santé et Territoires (HPST), en 2009, et adapté par la
      loi de Modernisation du système de Santé en 2016, ce dispositif de formation est
      dédié aux professionnels de santé de France (au sens du Code de Santé Publique,
      chapitre IV).</p>
      <p>Ce dispositif réglementé permet à chaque professionnel de santé de suivre un
      parcours de DPC et ainsi remplir leur obligation triennale. Le DPC permet
      l’amélioration de la qualité et de la sécurité des soins à travers :</p>
      <p>
       - l’évaluation et l'amélioration des pratiques professionnelles et de gestion des risques,<br>
       - le maintien et l’actualisation des connaissances et des compétences,<br>
       - la prise en compte des priorités de santé publique.
      </p>

    </div>
  </dd>


  <!-- adding data-pab-expand will force section open by default -->

  <dt data-pab=faq_2  data-pab-expand><span><b>Quel est le déroulé d’une formation ? </b></span></dt>

  <dd id=faq_2>
    <div>
      <p>Suite à l’inscription du professionnel de santé à une formation, KAMEDIS Institut lui
      fait parvenir, par mail ou par courrier (sur demande), la fiche détaillée du programme,
      le règlement intérieur, les documents de références, l’évaluation des pratiques
      professionnelles et les énoncés des cas cliniques afin de valider l’étape non
      présentielle avant la conférence (étape présentielle). Le jour de la conférence, le
      participant est accueilli à 20h par notre chargé de formation ou référent territorial qui
      le fait émarger et lui remet également le pré-test, constituant la seconde étape de
      validation DPC.</p>
      <p>
      Ce temps administratif et pédagogique est accompagné d’un cocktail dinatoire afin
      d’animer cette séquence studieuse et de permettre aux participants d’échanger avec
      leurs confrères. Le séminaire commence à 21h : le concepteur intervenant développe
      sa présentation face à notre public et ceci jusqu’à environ 23h.
      </p>

      <p>
      La conférence se conclut par le post-test interactif, reprenant les questions du pré-
      test.<br>
      Cela permet de mettre en lumière l’évolution des connaissances avant et après la
      formation.
      </p>

      <p>
      Les réponses à ce post-test se font à l’aide de boitiers remis au préalable par le
      chargé de formation ou référent territorial. Cette phase permet à notre concepteur
      intervenant de corriger le questionnaire en présence des participants et ainsi
      commenter et étayer les réponses.
      </p>

      <p>
      Le lendemain de la formation, les professionnels de santé reçoivent, par mail ou par
      courrier (sur demande), la présentation ainsi que les corrections des différents
      exercices (évaluation, tests, cas cliniques) et la déclaration de liens d’intérêt du
      concepteur intervenant.
      </p>
    </div>
  </dd>


  <dt data-pab=faq_3><span><b>J’ai déjà suivi le programme DPC cette année, puis-je en faire un autre ? </b></span></dt>

  <dd id=faq_3>
    <div>
      <p>Vous pouvez effectuer plusieurs programmes DPC chaque année.<br>
      Cependant, votre enveloppe DPC consacrée à vos formations, et notamment à vos indemnisations, s’amenuise au fur et à mesure des formations effectuées.</p>
      <p>Vous pourrez suivre la consommation de cette dernière directement sur votre compte www.mondpc.fr, rubrique « Mon Forfait DPC ».</p>
    </div>
  </dd>
</dl>


<center><h1>E-LEARNING </h1>
<hr id="lign_form_dpc"align="center" width="300" height:"20"  border-top: "5px bold"></center>
<dl class="dl-faqf pab_containerf">

  <dt data-pab=faq_4><span><b>Peut-on valider son DPC avec un programme de formation en e-learning ?</b></span></dt>

  <dd id=faq_4>
    <div>
      <p>Vous pouvez effectivement valider votre obligation DPC en suivant un programme de formation en e-learning 
      si ce dernier est bien référencé auprès de l’Agence Nationale du DPC.</p>
      <p>Notre organisme de formation, KAMEDIS INSTITUT, propose plusieurs formations e-learning validantes DPC.</p>
      <p>Vous trouverez la liste de nos programmes en e-learning dans la rubrique « E-learning ».</p>
    </div>
  </dd>

  <dt data-pab="faq_5"  data-pab-expand><span><b>Qu’est-ce que le e-learning ? </b></span></dt>

  <dd id="faq_5">
    <div>
      <p>Le e-learning, ou formation en ligne, désigne une formation suivie à distance.</p>
      <p>Il recouvre toutes les méthodes de formation s’appuyant sur l’outil informatique.</p>
      <p>Vous pourrez donc valider votre DPC sur n’importe quel poste informatique, de chez vous comme de votre cabinet.</p>
    </div>
  </dd>

</dl>

<center><h1>FINANCEMENT</h1>
<hr id="lign_form_dpc"align="center" width="300" height:"20"  border-top: "5px bold"></center>
<dl class="dl-faq2 pab_container2">

  <dt data-pab=faq_6><span><b>Comment financer ma formation ?</b></span></dt>

  <dd id=faq_6>
    <div>
      <p>Les formations suivies dans le cadre du DPC font l’objet d’une prise en charge. 
        Si vous êtes libéral ou salarié d’un centre de santé conventionné, c’est l’OGDPC qui assure le paiement de la formation. 
        Si vous êtes salarié ou hospitalier, c’est aux organismes paritaires collecteurs agréés ou aux établissements d’en assurer la prise en charge.</p>
    </div>
  </dd>

  <dt data-pab=faq_7  data-pab-expand><span><b>Qui peut prendre en charge ma formation ?</b></span></dt>

  <dd id=faq_7>
    <div>
      <p>La formation continue des professionnels de santé peut être prise en charge selon plusieurs
        modalités, selon la profession, le mode d’exercice (libéral, salarié…) et selon que la formation est
        suivie dans le cadre du DPC ou en dehors. Dans notre onglet Financement vous trouverez la marche à
        suivre adaptée à votre cas.</p>
    </div>
  </dd>


  <dt data-pab=faq_8><span><b>J’ai épuisé mon budget DPC, comment financer d’autres formations ? </b></span></dt>

  <dd id=faq_8>
    <div>
      <p>La formation professionnelle ne se limite pas au DPC. Quel que soit votre mode d’exercice, il existe
        des organismes chargés de financer votre formation continue en dehors du DPC. Notre onglet
        Financement vous présente profession par profession les options qui vous sont offertes.</p>
    </div>
  </dd>
</dl>


<br>

<svg style="display:none">
		<defs>
			<symbol viewBox="0 0 38 38" id="icon-plus">
				<path class="icon-plus-v" d="M10.5 19l17 0"></path>
				<path class="icon-plus-h" d="M19 10.5l0 17"></path>
			</symbol>

			<symbol viewBox="0 0 38 38" id="icon-minus">
				<path class="icon-plus-v" d="M10.5 19l17 0"></path>
			</symbol>
			
			<!-- vert and hori combined make up the plus icon and allow for animation -->
			<symbol viewBox="0 0 38 38" id="icon-vert">
				<path d="M19 10.5l0 17"></path>
			</symbol>
			<symbol viewBox="0 0 38 38" id="icon-hori">
				<path d="M10.5 19l17 0"></path>
			</symbol>
		</defs>
</svg>

<div class="row" id="desc_faq">
  <div class="shadow-lg p-3 mb-5 ">
    <center>
      <p>Vous n’avez pas trouvé de réponses à vos questions ?<br> <b>CONTACTEZ-NOUS</b></p>
    </center>
  </div> 
</div>

<div class="row" id="last_desc_faq">
  <div class="last_desc_faq_col1">
      <p><i class="fas fa-phone-square"></i></p>
      <p>
      Par téléphone<br> <b>01 47 29 76 21</b>
      </p>
  </div>

  <div class="last_desc_faq_col">
      <p><i class="fas fa-envelope-square"></i></p>
      <p>
      Par mail <br> <b>formation@kamedis.fr </b>
      </p>
  </div>
</div>


<?php 
include('footer/footer.php');

?>