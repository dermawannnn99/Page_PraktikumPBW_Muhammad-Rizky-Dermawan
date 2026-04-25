/* home.js — MAN4RAY v3 */
(function(){
  'use strict';

  var nav   = document.getElementById('main-nav');
  var wrap  = document.querySelector('.nav-wrap');
  var lastY = 0;

  /* 1 — Navbar scroll behavior: always visible, becomes more solid on scroll */
  function onScroll(){
    var y = window.scrollY;
    nav.classList.toggle('solid', y > 50);
    lastY = y;
  }
  window.addEventListener('scroll', onScroll, {passive:true});

  /* 2 — Smooth anchor scroll */
  document.querySelectorAll('a[href^="#"]').forEach(function(a){
    a.addEventListener('click', function(e){
      var id = this.getAttribute('href').slice(1);
      if(!id) return;
      var el = document.getElementById(id);
      if(!el) return;
      e.preventDefault();
      var top = el.getBoundingClientRect().top + window.scrollY - 78;
      window.scrollTo({top:top, behavior:'smooth'});
    });
  });

  /* 3 — Reveal on scroll */
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(!entry.isIntersecting) return;
      var el    = entry.target;
      var delay = parseInt(el.getAttribute('data-delay')||'0',10);
      setTimeout(function(){ el.classList.add('visible'); }, delay);
      io.unobserve(el);
    });
  },{threshold:0.1, rootMargin:'0px 0px -28px 0px'});

  document.querySelectorAll('[data-reveal]').forEach(function(el){ io.observe(el); });

  /* 4 — Hero elements animate on load */
  document.querySelectorAll('.hero-inner [data-reveal]').forEach(function(el){
    var d = parseInt(el.getAttribute('data-delay')||'0',10);
    setTimeout(function(){ el.classList.add('visible'); }, 180 + d);
  });

  /* 5 — Project rows stagger */
  var rows = document.querySelectorAll('.proj-row[data-reveal]');
  var projIO = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(!entry.isIntersecting) return;
      var idx = parseInt(entry.target.dataset.idx||'0',10);
      setTimeout(function(){ entry.target.classList.add('visible'); }, idx * 60);
      projIO.unobserve(entry.target);
    });
  },{threshold:0.07});
  rows.forEach(function(r,i){ r.dataset.idx = i; projIO.observe(r); });

  /* 6 — Active nav link */
  var sections = document.querySelectorAll('section[id]');
  var links    = document.querySelectorAll('.nav-link[href^="#"]');
  var secIO = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if(!entry.isIntersecting) return;
      links.forEach(function(l){
        l.style.color = (l.getAttribute('href')==='#'+entry.target.id)
          ? (nav.classList.contains('solid') ? 'var(--blue)' : '#fff')
          : '';
      });
    });
  },{threshold:0.4});
  sections.forEach(function(s){ secIO.observe(s); });

  /* 7 — Tech chip floating animation */
  var chipStyle = document.createElement('style');
  chipStyle.textContent = '@keyframes chipFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}';
  document.head.appendChild(chipStyle);
  document.querySelectorAll('.tech-chip').forEach(function(c,i){
    c.style.animation = 'chipFloat '+(3.2+i*.4)+'s ease-in-out infinite';
    c.style.animationDelay = (i*.18)+'s';
  });

  /* 8 — Ripple on pill buttons */
  var ripStyle = document.createElement('style');
  ripStyle.textContent = '@keyframes rip{to{transform:scale(26);opacity:0}}';
  document.head.appendChild(ripStyle);

  document.querySelectorAll('.pill-primary,.pill-outline,.btn-cta,.wa-btn').forEach(function(btn){
    btn.addEventListener('click', function(e){
      var r = document.createElement('span');
      var rect = btn.getBoundingClientRect();
      r.style.cssText='position:absolute;border-radius:50%;background:rgba(255,255,255,.3);width:6px;height:6px;transform:scale(0);animation:rip .5s linear;pointer-events:none;left:'+(e.clientX-rect.left-3)+'px;top:'+(e.clientY-rect.top-3)+'px';
      btn.style.position='relative';
      btn.style.overflow='hidden';
      btn.appendChild(r);
      setTimeout(function(){r.remove();},520);
    });
  });

  /* 9 — Blob parallax on mousemove */
  var blob1 = document.querySelector('.hero-blob-1');
  var blob2 = document.querySelector('.hero-blob-2');
  if(blob1 && blob2){
    document.querySelector('.hero').addEventListener('mousemove', function(e){
      var rx = (e.clientX/window.innerWidth-.5)*18;
      var ry = (e.clientY/window.innerHeight-.5)*14;
      blob1.style.transform = 'translate('+rx+'px,'+ry+'px)';
      blob2.style.transform = 'translate('+(-rx*.6)+'px,'+(-ry*.6)+'px)';
    },{passive:true});
  }

})();