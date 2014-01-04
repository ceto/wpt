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


/********* Bauparzellen Part ********/

if ( $('#bau-chooser').length > 0 ) {
    var szelesseg = $('#bau-chooser').width();
    if ($('#bau-chooser.canvas-overview').length > 0) {
      var origwidth=842;
      var origheight=1474;
    } else {
      var origwidth=842;
      var origheight=1474;
    }
    var paper = new Raphael(document.getElementById('bau-chooser'), origwidth, origheight);
    var origratio=origheight/origwidth;
}

function redraw_canvas() {

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
      text='Nr.: '+menuitem.attr('data-name')+"\nGröße: "+menuitem.attr('data-size')+"m2,\nPrize: "+menuitem.attr('data-price');
    } else {
      if ( menuitem.attr('data-status')==='sold' ) {
        text="Verkauft";
      } else {
        text=menuitem.attr('data-name');
      }
    }

    items[index].attr(
      {
        fill: (menuitem.attr('data-status')==='available')?'#a5da64':(menuitem.attr('data-status')==='sold')?'#c1c1c1':'#9c1a79',
        opacity: 1,
        stroke: '#ffffff',
        "stroke-width": 1,
        title: text

      }
    );
    


    items[index].data("url", $(this).attr('data-url'));

    items[index].click(function () {
    //  window.location=(items[index].data('url'));
      $.magnificPopup.open({
        items: {
          src: '<div class="white-popup">'+
            '<h3>'+menuitem.attr('data-name')+'</h3>'+
            '<p>'+
            '<span class="size">Größe: '+menuitem.attr('data-size')+' m<sup>2</sup></span><br/>'+
            '<span class="price">Prize: '+menuitem.attr('data-price')+'</span>'+
            '</p>'+
            '</div>'
        
        },
        type: 'inline'

        // You may add options here, they're exactly the same as for $.fn.magnificPopup call
        // Note that some settings that rely on click event (like disableOn or midClick) will not work here
      }, 0);

      //$.magnificPopup.close();

    });
    items[index].node.onmouseover = function(){
      this.style.cursor = 'pointer';
    };

    items[index].hover(
      function(){
        items[index].attr(
        {
          opacity: 0.75,
        });
        menuitem.toggleClass('active');
      },
      function(){
          items[index].attr(
          {
            opacity: 1,
          });
          menuitem.toggleClass('active');
      }
    );

    menuitem.hover(
      function(){
        items[index].attr(
        {
          opacity: 0.75,
        });
      },
      function(){
          items[index].attr(
          {
            opacity: 1,
          });
      }
    );


  });
}

$(document).ready(function() {
  if ( $('.bau-chooser').length > 0 ) {
    redraw_canvas();
    $(window).resize(redraw_canvas);
  }
});

$(document).ready(function()
{
    $('path, text').qtip(
        {
            content: {
                text: 'example of SVG support'
            },
            position: {
                target: 'mouse',
            adjust: {
                mouse: true,
                y: +20
        }
        }
    });
});



