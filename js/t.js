(function($) {
  $('.carousel').carousel({
    interval: 90000
  });
})(jQuery);


(function() {
    var canvas1 = document.getElementById('canvas1'),
            context1 = canvas1.getContext('2d');
            var carrousel = document.getElementsByClassName('carousel-inner');
    // resize the canvas to fill browser window dynamically
    window.addEventListener('resize', resizeCanvas, false);

    function resizeCanvas() {
      console.log(carrousel.height);
            canvas1.width = window.innerWidth;
            canvas1.height = window.innerHeight;

            
            /**
             * Your drawings need to be inside this function otherwise they will be reset when 
             * you resize the browser window and the canvas goes will be cleared.
             */
            drawStuff(); 
    }
    resizeCanvas();

    function drawStuff() {
        var imgPath = base_url + 'uploads/images/24-18.jpg';
        console.log(base_url);
 
//Create a new Image object.
    var imgObj = new Image();
 
//Set the src of this Image object.
    imgObj.src = imgPath;


    imgObj.onload = function(){
    //Draw the image onto the canvas.
    console.log(window.innerWidth/imgObj.width);
      context1.drawImage(imgObj,0, 0, window.innerWidth, window.innerHeight);
    
}
            // do your drawing stuff here
    }
})();

(function() {
  var canvas2 = document.getElementById('canvas2'),
          context = canvas2.getContext('2d');

  // resize the canvas to fill browser window dynamically
  window.addEventListener('resize', resizeCanvas, false);

  function resizeCanvas() {
          canvas2.width = window.innerWidth;
          canvas2.height = window.innerHeight;

          
          /**
           * Your drawings need to be inside this function otherwise they will be reset when 
           * you resize the browser window and the canvas goes will be cleared.
           */
          drawStuff(); 
  }
  resizeCanvas();

  function drawStuff() {
      var imgPath = '<?php echo base_url() . "uploads/images/out.png"; ?>';

//Create a new Image object.
  var imgObj = new Image();

//Set the src of this Image object.
  imgObj.src = imgPath;

  imgObj.onload = function(){
  //Draw the image onto the canvas.
  context.drawImage(imgObj, 0, 0, window.innerWidth*0.9, window.innerHeight);
}
          // do your drawing stuff here
  }
})();

(function() {
  var canvas3 = document.getElementById('canvas3'),
          context = canvas3.getContext('2d');

  // resize the canvas to fill browser window dynamically
  window.addEventListener('resize', resizeCanvas, false);

  function resizeCanvas() {
          canvas3.width = window.innerWidth;
          canvas3.height = window.innerHeight;

          
          /**
           * Your drawings need to be inside this function otherwise they will be reset when 
           * you resize the browser window and the canvas goes will be cleared.
           */
          drawStuff(); 
  }
  resizeCanvas();

  function drawStuff() {
      var imgPath = 'http://localhost/IntegrSupCours/uploads/images/Diapositive2.JPG';

//Create a new Image object.
  var imgObj = new Image();

//Set the src of this Image object.
  imgObj.src = imgPath;

  imgObj.onload = function(){
  //Draw the image onto the canvas.
  context.drawImage(imgObj, 0, 0);
}
          // do your drawing stuff here
  }
})();

/* © 2009 ROBO Design
 * http://www.robodesign.ro
 */

// Keep everything in anonymous function, called on window load.
if(window.addEventListener) {
    window.addEventListener('load', function () {
      var canvas1, context, tool;
    
      function init () {
        // Find the canvas element.
        canvas1 = document.getElementById('canvas1');
        if (!canvas1) {
          alert('Error: I cannot find the canvas element!');
          return;
        }
    
        if (!canvas1.getContext) {
          alert('Error: no canvas.getContext!');
          return;
        }
    
        // Get the 2D canvas context.
        context = canvas1.getContext('2d');
        if (!context) {
          alert('Error: failed to getContext!');
          return;
        }
    
        // Pencil tool instance.
        tool = new tool_pencil();
    
        // Attach the mousedown, mousemove and mouseup event listeners.
        canvas1.addEventListener('mousedown', ev_canvas, false);
        canvas1.addEventListener('mousemove', ev_canvas, false);
        canvas1.addEventListener('mouseup',   ev_canvas, false);
      }
    
      // This painting tool works like a drawing pencil which tracks the mouse 
      // movements.
      function tool_pencil () {
        var tool = this;
        this.started = false;
    
        // This is called when you start holding down the mouse button.
        // This starts the pencil drawing.
        this.mousedown = function (ev) {
            context.beginPath();
            context.moveTo(ev._x, ev._y);
            tool.started = true;
        };
    
        // This function is called every time you move the mouse. Obviously, it only 
        // draws if the tool.started state is set to true (when you are holding down 
        // the mouse button).
        this.mousemove = function (ev) {
          if (tool.started) {
            context.lineTo(ev._x, ev._y);
            context.stroke();
          }
        };
    
        // This is called when you release the mouse button.
        this.mouseup = function (ev) {
          if (tool.started) {
            tool.mousemove(ev);
            tool.started = false;
          }
        };
      }
    
      // The general-purpose event handler. This function just determines the mouse 
      // position relative to the canvas element.
      function ev_canvas (ev) {
        if (ev.layerX || ev.layerX == 0) { // Firefox
          ev._x = ev.layerX;
          ev._y = ev.layerY;
        } else if (ev.offsetX || ev.offsetX == 0) { // Opera
          ev._x = ev.offsetX;
          ev._y = ev.offsetY;
        }
    
        // Call the event handler of the tool.
        var func = tool[ev.type];
        if (func) {
          func(ev);
        }
      }
    
      init();
    
    }, false); }
    
    // vim:set spell spl=en fo=wan1croql tw=80 ts=2 sw=2 sts=2 sta et ai cin fenc=utf-8 ff=unix:



    var element = document.documentElement;
var button = document.getElementsByTagName('button')[0];


button.addEventListener('click', function(){
  element.requestFullscreen()
  .then(function() {
    // element has entered fullscreen mode successfully
  })
  .catch(function(error) {
    // element could not enter fullscreen mode
    // error message
    console.log(error.message);
  });
});
