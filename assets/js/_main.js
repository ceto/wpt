// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);


var showSidebar = function() {
  $('body').removeClass("active-nav").toggleClass("active-sidebar");
  $('.menu-toggle').removeClass("active-button");
};
var showMenu = function() {
  $('body').removeClass("active-sidebar").toggleClass("active-nav");
  $('.menu-toggle').toggleClass("active-button");
};

// add/remove classes everytime the window resize event fires
jQuery(window).resize(function(){
  var off_canvas_nav_display = $('.off-canvas-navigation').css('display');
  var menu_button_display = $('.menu-toggle').css('display');
  if (off_canvas_nav_display === 'block') {
    $("body").removeClass("three-column").addClass("small-screen");
  }
  if (off_canvas_nav_display === 'none') {
    $("body").removeClass("active-sidebar active-nav small-screen")
      .addClass("three-column");
    }
});

jQuery(document).ready(function($) {
  // Toggle for nav menu
  $('.menu-toggle').click(function(e) {
    e.preventDefault();
    showMenu();
  });

  // Target your .container, .wrapper, .post, etc.
  $(".main").fitVids();


  $('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
      titleSrc: function(item) {
        return item.el.attr('title');
      }
    },
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
    
  });

  $('.popup-zoom').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });
});

/********* Apartment Part ********/

if ( $('#apartment-chooser').length > 0 ) {
    var szelesseg = $('#apartment-chooser').width();
    var origwidth=1280;
    var origheight=449;
    var paper = new Raphael(document.getElementById('apartment-chooser'), origwidth, origheight);
    var origratio=origheight/origwidth;
}


function aredraw_canvas() {

  paper.clear();
  szelesseg = $('.apartment-chooser').width();
  magassag = $('.apartment-chooser').height();

  paper.setSize(szelesseg, szelesseg*origratio);
  paper.setViewBox(0, 0, origwidth, origheight, true);

  var items = [];
  var text ='';

  $('.data-row').each(function(index) {
    var menuitem = $(this);

    items[index] = paper.path(menuitem.attr('data-svg'));

            
    items[index].node.id = 'e'+menuitem.attr('id');

    text=menuitem.attr('data-name')+"\nWnf: "+menuitem.attr('data-wnf')+"m2,\nPreis: "+menuitem.attr('data-price');
    
    items[index].attr(
      {
        fill: (menuitem.attr('data-status')==='frei')?'#a5da64':(menuitem.attr('data-status')==='verkauft')?'#9c1a79':'#c1c1c1',
        opacity: 0,
        stroke: 'transparent',
        "stroke-width": 1,
        //title: text

      }
    );
    


    items[index].data("url", $(this).attr('data-url'));

    
    items[index].click(function () {
      window.location=(items[index].data('url'));
    });


    items[index].node.onmousemove = function(event){
      var tooltipX = event.pageX - 8;
      var tooltipY = event.pageY + 8;
      $('div.tooltip').css({top: tooltipY, left: tooltipX});
    };

    items[index].node.onmouseenter = function(event){
      this.style.cursor = 'pointer';
      $('div.tooltip').remove();
      $('<div class="tooltip">'+
            '<h3>'+menuitem.attr('data-name')+
            ((menuitem.attr('data-status')==='verkauft')?' - Verkauft':'')+
            '</h3>'+
            '<p>'+
            '<span class="size">Wohnfläche: '+menuitem.attr('data-wnf')+' m<sup>2</sup></span><br/>'+
            '<span class="price">Preis: '+menuitem.attr('data-price')+'</span>'+
            '</p>'+
            '</div>').appendTo('body');
      var tooltipX = event.pageX - 8;
      var tooltipY = event.pageY + 8;
      $('div.tooltip').css({top: tooltipY, left: tooltipX});

    };

    items[index].node.onmouseleave = function(event){
      $('div.tooltip').remove();

    };


    items[index].hover(
      function(event){
        items[index].attr(
        {
          opacity: 0.5,
        });
        menuitem.toggleClass('active');
      },
      function(){
        items[index].attr(
        {
          opacity: 0,
        });
        menuitem.toggleClass('active');
      }
    );

    menuitem.hover(
      function(){
        items[index].attr(
        {
          opacity: 0.5,
        });
      },
      function(){
          items[index].attr(
          {
            opacity: 0,
          });
      }
    );


  });
}






/********* Bauparzellen Part ********/

if ( $('#bau-chooser').length > 0 ) {
    var szelesseg = $('#bau-chooser').width();
    var origwidth=842;
    var origheight=1474;
    var paper = new Raphael(document.getElementById('bau-chooser'), origwidth, origheight);
    var origratio=origheight/origwidth;
}

function bredraw_canvas() {

  paper.clear();
  szelesseg = $('.bau-chooser').width();
  magassag = $('.bau-chooser').height();

  paper.setSize(szelesseg, szelesseg*origratio);
  paper.setViewBox(0, 0, origwidth, origheight, true);

  var items = [];
  var text ='';

  $('.datacont').each(function(index) {
    var menuitem = $(this);

    items[index] = paper.path(menuitem.attr('data-svg'));

            
    items[index].node.id = 'e'+menuitem.attr('id');

    if ( menuitem.attr('data-status')==='available' ) {
      text='Nr.: '+menuitem.attr('data-name')+" \nGröße: "+menuitem.attr('data-size')+"m2, \nPreis: "+menuitem.attr('data-price');
    } else {
      if ( menuitem.attr('data-status')==='sold' ) {
        text="Verkauft";
      } else {
        text=menuitem.attr('data-name');

      }
    }

    items[index].attr(
      {
        //fill: (menuitem.attr('data-status')==='available')?'#a5da64':(menuitem.attr('data-status')==='sold')?'#c1c1c1':'#9c1a79',
        
        fill: (menuitem.attr('data-status')==='available')?'#a5da64':(menuitem.attr('data-status')==='sold')?'transparent':'transparent',
        opacity: 1,
        stroke: 'transparent',
        "stroke-width": 1,
        //title: text

      }
    );
    


    items[index].data("url", $(this).attr('data-url'));

    
    if (menuitem.attr('data-status')!=='sold') {

      items[index].click(function () {
      
        if ( menuitem.attr('data-status')==='available' ) {
          // $.magnificPopup.open({
          //   items: {
          //     src: '<div class="white-popup">'+
          //       '<h3>'+menuitem.attr('data-name')+'</h3>'+
          //       '<p>'+
          //       '<span class="size">Größe: '+menuitem.attr('data-size')+' m<sup>2</sup></span><br/>'+
          //       '<span class="price">Kaufpreis: '+menuitem.attr('data-price')+'</span>'+
          //       '<a href="?page_id=487&ap_id='+menuitem.attr('data-name')+'" class="btn"><span class="icon-envelope"></span>Anfrage</a>'+
          //       '</p>'+
          //       '</div>'
            
          //   },
          //   type: 'inline'
          // }, 0);

            
            $('#message_betreff').val('Nr.: '+menuitem.attr('data-name')+" \nGröße: "+menuitem.attr('data-size')+"m2, \nPreis: "+menuitem.attr('data-price'));
            $('#infopan').replaceWith('<div id="infopan"><h3>'+menuitem.attr('data-name')+'</h3><p>Größe: '+menuitem.attr('data-size')+"m2,<br>Preis: "+menuitem.attr('data-price')+'</p></div>');

            $.magnificPopup.open({
              items:{
                type: 'inline',
                preloader: false,
                focus: '#message_name',
                src:'#respond',
                callbacks: {
                  beforeOpen: function() {
                    if($(window).width() < 700) {
                      this.st.focus = false;
                    } else {
                      this.st.focus = '#message_name';
                    }
                  }
                }
              }
            },0);


        } else {
          window.location=(menuitem.attr('data-link'));
        }


      });

    
      items[index].node.onmousemove = function(event){
        var tooltipX = event.pageX - 8;
        var tooltipY = event.pageY + 8;
        $('div.tooltip').css({top: tooltipY, left: tooltipX});
      };

      items[index].node.onmouseenter = function(event){
        this.style.cursor = 'pointer';
        $('div.tooltip').remove();
        $('<div class="tooltip">'+
              '<h3>'+menuitem.attr('data-name')+'</h3>'+
              '<p>'+
              '<span class="size">Größe: '+menuitem.attr('data-size')+' m<sup>2</sup></span><br/>'+
              '<span class="price">Kaufpreis: '+menuitem.attr('data-price')+'</span>'+
              '</p>'+
              '</div>').appendTo('body');
        var tooltipX = event.pageX - 8;
        var tooltipY = event.pageY + 8;
        $('div.tooltip').css({top: tooltipY, left: tooltipX});

      };

      items[index].node.onmouseleave = function(event){
        $('div.tooltip').remove();

      };

    }

    items[index].hover(
      function(event){
        items[index].attr(
        {
          opacity: 1,
          fill: '#9c1a79'
        });
        menuitem.toggleClass('active');
      },
      function(){
        items[index].attr(
        {
          opacity: 1,
          fill: '#a5da64'
        });
        menuitem.toggleClass('active');
      }
    );

    menuitem.hover(
      function(){
        items[index].attr(
        {
          opacity: 1,
          fill: '#9c1a79'
        });
      },
      function(){
          items[index].attr(
          {
            opacity: 1,
            fill: '#a5da64'
          });
      }
    );


  });
}

$(document).ready(function() {
  if ( $('#bau-chooser').length > 0 ) {
    bredraw_canvas();
    $(window).resize(bredraw_canvas);
  }
  
  if ( $('#apartment-chooser').length > 0 ) {
    aredraw_canvas();
    $(window).resize(aredraw_canvas);
  }


});

$(document).ready(function(){
  // Target your .container, .wrapper, .post, etc.
  $(".wp-video-shortcode").fitVids();
  $(".ferde-row .title").fitText(1.4, { minFontSize: '20px'});
});


$(document).ready(function() {
  $('[data-subject]').click(function(){
    $('#message_betreff').val( $('[data-subject]').attr('data-subject') );
  });
  $('.popup-with-form').magnificPopup({
    type: 'inline',
    preloader: false,
    focus: '#message_name',

    // When elemened is focused, some mobile browsers in some cases zoom in
    // It looks not nice, so we disable it:
    callbacks: {
      beforeOpen: function() {
        if($(window).width() < 700) {
          this.st.focus = false;
        } else {
          this.st.focus = '#message_name';
        }
      }
    }
  });
});

$(document).ready(function(){

});



