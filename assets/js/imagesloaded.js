( function( global, factory ) {

    if ( typeof define == 'function' && define.amd ) {
 
      define( 'ev-emitter/ev-emitter',factory );
    } else if ( typeof module == 'object' && module.exports ) {
   
      module.exports = factory();
    } else {

      global.EvEmitter = factory();
    }
  
  }( typeof window != 'undefined' ? window : this, function() {
  
  
  
  function EvEmitter() {}
  
  var proto = EvEmitter.prototype;
  
  proto.on = function( eventName, listener ) {
    if ( !eventName || !listener ) {
      return;
    }

    var events = this._events = this._events || {};
    // set listeners array
    var listeners = events[ eventName ] = events[ eventName ] || [];

    if ( listeners.indexOf( listener ) == -1 ) {
      listeners.push( listener );
    }
  
    return this;
  };
  
  proto.once = function( eventName, listener ) {
    if ( !eventName || !listener ) {
      return;
    }
 
    this.on( eventName, listener );

    var onceEvents = this._onceEvents = this._onceEvents || {};

    var onceListeners = onceEvents[ eventName ] = onceEvents[ eventName ] || {};

    onceListeners[ listener ] = true;
  
    return this;
  };
  
  proto.off = function( eventName, listener ) {
    var listeners = this._events && this._events[ eventName ];
    if ( !listeners || !listeners.length ) {
      return;
    }
    var index = listeners.indexOf( listener );
    if ( index != -1 ) {
      listeners.splice( index, 1 );
    }
  
    return this;
  };
  
  proto.emitEvent = function( eventName, args ) {
    var listeners = this._events && this._events[ eventName ];
    if ( !listeners || !listeners.length ) {
      return;
    }

    listeners = listeners.slice(0);
    args = args || [];

    var onceListeners = this._onceEvents && this._onceEvents[ eventName ];
  
    for ( var i=0; i < listeners.length; i++ ) {
      var listener = listeners[i]
      var isOnce = onceListeners && onceListeners[ listener ];
      if ( isOnce ) {

        this.off( eventName, listener );

        delete onceListeners[ listener ];
      }

      listener.apply( this, args );
    }
  
    return this;
  };
  
  proto.allOff = function() {
    delete this._events;
    delete this._onceEvents;
  };
  
  return EvEmitter;
  
  }));
  

  
  ( function( window, factory ) { 'use strict';

    if ( typeof define == 'function' && define.amd ) {
     
      define( [
        'ev-emitter/ev-emitter'
      ], function( EvEmitter ) {
        return factory( window, EvEmitter );
      });
    } else if ( typeof module == 'object' && module.exports ) {
    
      module.exports = factory(
        window,
        require('ev-emitter')
      );
    } else {
  
      window.imagesLoaded = factory(
        window,
        window.EvEmitter
      );
    }
  
  })( typeof window !== 'undefined' ? window : this,
  

  function factory( window, EvEmitter ) {
  
  
  
  var $ = window.jQuery;
  var console = window.console;
  

  function extend( a, b ) {
    for ( var prop in b ) {
      a[ prop ] = b[ prop ];
    }
    return a;
  }
  
  var arraySlice = Array.prototype.slice;
  
  
  function makeArray( obj ) {
    if ( Array.isArray( obj ) ) {
 
      return obj;
    }
  
    var isArrayLike = typeof obj == 'object' && typeof obj.length == 'number';
    if ( isArrayLike ) {

      return arraySlice.call( obj );
    }
  

    return [ obj ];
  }

 
    @param {Array, Element, NodeList, String}
    @param {Object or Function}
    @param {Function} 
   
  function ImagesLoaded( elem, options, onAlways ) {
 
    if ( !( this instanceof ImagesLoaded ) ) {
      return new ImagesLoaded( elem, options, onAlways );
    }
 
    var queryElem = elem;
    if ( typeof elem == 'string' ) {
      queryElem = document.querySelectorAll( elem );
    }

    if ( !queryElem ) {
      console.error( 'Bad element for imagesLoaded ' + ( queryElem || elem ) );
      return;
    }
  
    this.elements = makeArray( queryElem );
    this.options = extend( {}, this.options );
 
    if ( typeof options == 'function' ) {
      onAlways = options;
    } else {
      extend( this.options, options );
    }
  
    if ( onAlways ) {
      this.on( 'always', onAlways );
    }
  
    this.getImages();
  
    if ( $ ) {

      this.jqDeferred = new $.Deferred();
    }
  
 
    setTimeout( this.check.bind( this ) );
  }
  
  ImagesLoaded.prototype = Object.create( EvEmitter.prototype );
  
  ImagesLoaded.prototype.options = {};
  
  ImagesLoaded.prototype.getImages = function() {
    this.images = [];
  

    this.elements.forEach( this.addElementImages, this );
  };
  
 @param {Node} 
   
  ImagesLoaded.prototype.addElementImages = function( elem ) {
    // filter siblings
    if ( elem.nodeName == 'IMG' ) {
      this.addImage( elem );
    }

    if ( this.options.background === true ) {
      this.addElementBackgroundImages( elem );
    }
  

    var nodeType = elem.nodeType;
    if ( !nodeType || !elementNodeTypes[ nodeType ] ) {
      return;
    }
    var childImgs = elem.querySelectorAll('img');
  
    for ( var i=0; i < childImgs.length; i++ ) {
      var img = childImgs[i];
      this.addImage( img );
    }
  

    if ( typeof this.options.background == 'string' ) {
      var children = elem.querySelectorAll( this.options.background );
      for ( i=0; i < children.length; i++ ) {
        var child = children[i];
        this.addElementBackgroundImages( child );
      }
    }
  };
  
  var elementNodeTypes = {
    1: true,
    9: true,
    11: true
  };
  
  ImagesLoaded.prototype.addElementBackgroundImages = function( elem ) {
    var style = getComputedStyle( elem );
    if ( !style ) {
      // Firefox returns null if in a hidden iframe https://bugzil.la/548397
      return;
    }
    // get url inside url("...")
    var reURL = /url\((['"])?(.*?)\1\)/gi;
    var matches = reURL.exec( style.backgroundImage );
    while ( matches !== null ) {
      var url = matches && matches[2];
      if ( url ) {
        this.addBackground( url, elem );
      }
      matches = reURL.exec( style.backgroundImage );
    }
  };
  
  @param {Image} 
  
  ImagesLoaded.prototype.addImage = function( img ) {
    var loadingImage = new LoadingImage( img );
    this.images.push( loadingImage );
  };
  
  ImagesLoaded.prototype.addBackground = function( url, elem ) {
    var background = new Background( url, elem );
    this.images.push( background );
  };
  
  ImagesLoaded.prototype.check = function() {
    var _this = this;
    this.progressedCount = 0;
    this.hasAnyBroken = false;

    if ( !this.images.length ) {
      this.complete();
      return;
    }
  
    function onProgress( image, elem, message ) {
    
      setTimeout( function() {
        _this.progress( image, elem, message );
      });
    }
  
    this.images.forEach( function( loadingImage ) {
      loadingImage.once( 'progress', onProgress );
      loadingImage.check();
    });
  };
  
  ImagesLoaded.prototype.progress = function( image, elem, message ) {
    this.progressedCount++;
    this.hasAnyBroken = this.hasAnyBroken || !image.isLoaded;

    this.emitEvent( 'progress', [ this, image, elem ] );
    if ( this.jqDeferred && this.jqDeferred.notify ) {
      this.jqDeferred.notify( this, image );
    }

    if ( this.progressedCount == this.images.length ) {
      this.complete();
    }
  
    if ( this.options.debug && console ) {
      console.log( 'progress: ' + message, image, elem );
    }
  };
  
  ImagesLoaded.prototype.complete = function() {
    var eventName = this.hasAnyBroken ? 'fail' : 'done';
    this.isComplete = true;
    this.emitEvent( eventName, [ this ] );
    this.emitEvent( 'always', [ this ] );
    if ( this.jqDeferred ) {
      var jqMethod = this.hasAnyBroken ? 'reject' : 'resolve';
      this.jqDeferred[ jqMethod ]( this );
    }
  };
  

  function LoadingImage( img ) {
    this.img = img;
  }
  
  LoadingImage.prototype = Object.create( EvEmitter.prototype );
  
  LoadingImage.prototype.check = function() {

    var isComplete = this.getIsImageComplete();
    if ( isComplete ) {

      this.confirm( this.img.naturalWidth !== 0, 'naturalWidth' );
      return;
    }
  
    this.proxyImage = new Image();
    this.proxyImage.addEventListener( 'load', this );
    this.proxyImage.addEventListener( 'error', this );

    this.img.addEventListener( 'load', this );
    this.img.addEventListener( 'error', this );
    this.proxyImage.src = this.img.src;
  };
  
  LoadingImage.prototype.getIsImageComplete = function() {

    return this.img.complete && this.img.naturalWidth;
  };
  
  LoadingImage.prototype.confirm = function( isLoaded, message ) {
    this.isLoaded = isLoaded;
    this.emitEvent( 'progress', [ this, this.img, message ] );
  };
  
  LoadingImage.prototype.handleEvent = function( event ) {
    var method = 'on' + event.type;
    if ( this[ method ] ) {
      this[ method ]( event );
    }
  };
  
  LoadingImage.prototype.onload = function() {
    this.confirm( true, 'onload' );
    this.unbindEvents();
  };
  
  LoadingImage.prototype.onerror = function() {
    this.confirm( false, 'onerror' );
    this.unbindEvents();
  };
  
  LoadingImage.prototype.unbindEvents = function() {
    this.proxyImage.removeEventListener( 'load', this );
    this.proxyImage.removeEventListener( 'error', this );
    this.img.removeEventListener( 'load', this );
    this.img.removeEventListener( 'error', this );
  };
  
  
  function Background( url, element ) {
    this.url = url;
    this.element = element;
    this.img = new Image();
  }
  

  Background.prototype = Object.create( LoadingImage.prototype );
  
  Background.prototype.check = function() {
    this.img.addEventListener( 'load', this );
    this.img.addEventListener( 'error', this );
    this.img.src = this.url;

    var isComplete = this.getIsImageComplete();
    if ( isComplete ) {
      this.confirm( this.img.naturalWidth !== 0, 'naturalWidth' );
      this.unbindEvents();
    }
  };
  
  Background.prototype.unbindEvents = function() {
    this.img.removeEventListener( 'load', this );
    this.img.removeEventListener( 'error', this );
  };
  
  Background.prototype.confirm = function( isLoaded, message ) {
    this.isLoaded = isLoaded;
    this.emitEvent( 'progress', [ this, this.element, message ] );
  };
  

  
  ImagesLoaded.makeJQueryPlugin = function( jQuery ) {
    jQuery = jQuery || window.jQuery;
    if ( !jQuery ) {
      return;
    }
  
    $ = jQuery;
 
    $.fn.imagesLoaded = function( options, callback ) {
      var instance = new ImagesLoaded( this, options, callback );
      return instance.jqDeferred.promise( $(this) );
    };
  };

  ImagesLoaded.makeJQueryPlugin();
  

  
  return ImagesLoaded;
  
  });
  