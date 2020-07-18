const displacementSlider = function(opts) {

    let vertex = `
        varying vec2 vUv;
        void main() {
          vUv = uv;
          gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
        }
    `;

    let fragment = `

        varying vec2 vUv;

        uniform sampler2D currentImage;
        uniform sampler2D nextImage;

        uniform float dispFactor;

        void main() {

            vec2 uv = vUv;
            vec4 _currentImage;
            vec4 _nextImage;
            float intensity = 0.3;

            vec4 orig1 = texture2D(currentImage, uv);
            vec4 orig2 = texture2D(nextImage, uv);

            _currentImage = texture2D(currentImage, vec2(uv.x, uv.y + dispFactor * (orig2 * intensity)));

            _nextImage = texture2D(nextImage, vec2(uv.x, uv.y + (1.0 - dispFactor) * (orig1 * intensity)));

            vec4 finalTexture = mix(_currentImage, _nextImage, dispFactor);

            gl_FragColor = finalTexture;

        }
    `;

    let images = opts.images, image, sliderImages = [];
    let canvasWidth = images[0].clientWidth;
    let canvasHeight = images[0].clientHeight;
    let parent = opts.parent;
    let renderWidth = document.getElementById('slider').offsetWidth;
    let renderHeight = document.getElementById('slider').offsetHeight;
    console.log(canvasWidth, canvasHeight, renderWidth, renderHeight)
    let renderW, renderH;

    if( renderWidth >= canvasWidth ) {
        renderW = renderWidth * (renderHeight / canvasHeight);
        renderH = renderHeight * (renderWidth / canvasWidth);
    } else {
        renderW = canvasWidth;
        renderH = canvasHeight;
    }
    console.log(renderW, renderH)

    let renderer = new THREE.WebGLRenderer({
        antialias: false,
    });

    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setClearColor( 0x23272A, 1.0 );
    renderer.setSize( renderW, renderH );
    parent.appendChild( renderer.domElement );

    let loader = new THREE.TextureLoader();
    loader.crossOrigin = "anonymous";

    images.forEach( ( img ) => {

        image = loader.load( img.getAttribute( 'src' ) + '?v=' + Date.now() );
        image.magFilter = image.minFilter = THREE.LinearFilter;
        image.anisotropy = renderer.capabilities.getMaxAnisotropy();
        sliderImages.push( image );

    });

    let scene = new THREE.Scene();
    scene.background = new THREE.Color( 0x23272A );
    let camera = new THREE.OrthographicCamera(
        renderWidth / -2,
        renderWidth / 2,
        renderHeight / 2,
        renderHeight / -2,
        1,
        1000
    );

    camera.position.z = 1;

    let mat = new THREE.ShaderMaterial({
        uniforms: {
            dispFactor: { type: "f", value: 0.0 },
            currentImage: { type: "t", value: sliderImages[0] },
            nextImage: { type: "t", value: sliderImages[1] },
        },
        vertexShader: vertex,
        fragmentShader: fragment,
        transparent: true,
        opacity: 1.0
    });

    let geometry = new THREE.PlaneBufferGeometry(
        parent.offsetWidth,
        parent.offsetHeight,
        1
    );
    let object = new THREE.Mesh(geometry, mat);
    object.position.set(0, 0, 0);
    scene.add(object);

    let addEvents = function(){

        let pagButtons = Array.from(document.getElementById('pagination').querySelectorAll('button'));
        let isAnimating = false;

        pagButtons.forEach( (el) => {

            el.addEventListener('click', function() {

                if( !isAnimating ) {

                    isAnimating = true;

                    document.getElementById('pagination').querySelectorAll('.active')[0].className = '';
                    this.className = 'active';

                    let slideId = parseInt( this.dataset.slide, 10 );

                    mat.uniforms.nextImage.value = sliderImages[slideId];
                    mat.uniforms.nextImage.needsUpdate = true;

                    TweenLite.to( mat.uniforms.dispFactor, 1, {
                        value: 1,
                        ease: 'Expo.easeInOut',
                        onComplete: function () {
                            mat.uniforms.currentImage.value = sliderImages[slideId];
                            mat.uniforms.currentImage.needsUpdate = true;
                            mat.uniforms.dispFactor.value = 0.0;
                            isAnimating = false;
                        }
                    });

                    let slideTitleEl = document.getElementById('slide');
                    let nextSlideTitle = document.querySelectorAll(`[data-slide-content="${slideId}"]`)[0].innerHTML;

                    TweenLite.fromTo( slideTitleEl, 0.5,
                        {
                            autoAlpha: 1,
                            filter: 'blur(0px)',
                            y: 0
                        },
                        {
                            autoAlpha: 0,
                            filter: 'blur(10px)',
                            y: 20,
                            ease: 'Expo.easeIn',
                            onComplete: function () {
                                slideTitleEl.innerHTML = nextSlideTitle;

                                TweenLite.to( slideTitleEl, 0.5, {
                                    autoAlpha: 1,
                                    filter: 'blur(0px)',
                                    y: 0,
                                })
                            }
                        });

                }

            });

        });


    };

    addEvents();





    window.addEventListener( 'resize' , function(e) {
        renderer.setSize(renderW, renderH);
    });

    let animate = function() {
        requestAnimationFrame(animate);

        renderer.render(scene, camera);
    };
    animate();
};

imagesLoaded( document.querySelectorAll('img'), () => {

    document.body.classList.remove('loading');

    const el = document.getElementById('slider');
    const imgs = Array.from(el.querySelectorAll('img'));
    new displacementSlider({
        parent: el,
        images: imgs
    });

});


//slideset
var slideset = function slideset() {
    var slideDelay = 4;
    var slideDuration = 0.3;

    var slides = document.querySelectorAll(".slide");
    //var prevButton = document.querySelector("#prevButton");
    //var nextButton = document.querySelector("#nextButton");

    var numSlides = slides.length;

    if (slides.length > 0) {
        for (var i = 0; i < numSlides; i++) {
          TweenLite.set(slides[i], {
            xPercent: i * 100
          });
        }

        var wrap = wrapPartial(-100, (numSlides - 1) * 100);
        var timer = TweenLite.delayedCall(slideDelay, autoPlay);

        var animation = TweenMax.to(slides, 1, {
          xPercent: "+=" + (numSlides * 100),
          ease: Linear.easeNone,
          paused: true,
          repeat: -1,
          modifiers: {
            xPercent: wrap
          }
        });

        var proxy = document.createElement("div");
        TweenLite.set(proxy, { x: "+=0" });
        var transform = proxy._gsTransform;
        var slideAnimation = TweenLite.to({}, 0.1, {});
        var slideWidth = 0;
        var wrapWidth = 0;
        resize();

        var draggable = new Draggable(proxy, {
          trigger: ".slides-container",
          throwProps: true,
          onPress: updateDraggable,
          onDrag: updateProgress,
          onThrowUpdate: updateProgress,
          snap: {
            x: snapX
          }
        });

        window.addEventListener("resize", resize);

        /*prevButton.addEventListener("click", function() {
          animateSlides(1);
        });

        nextButton.addEventListener("click", function() {
          animateSlides(-1);
        });
    */
        function updateDraggable() {

          timer.restart(true);
          slideAnimation.kill();
          this.update();
        }

        function animateSlides(direction) {

          timer.restart(true);
          slideAnimation.kill();

          var x = snapX(transform.x + direction * slideWidth);

          slideAnimation = TweenLite.to(proxy, slideDuration, {
            x: x,
            onUpdate: updateProgress
          });
        }

        function autoPlay() {

          if (draggable.isPressed || draggable.isDragging || draggable.isThrowing) {
            timer.restart(true);
          } else {
            animateSlides(-1);
          }
        }

        function updateProgress() {
          animation.progress(transform.x / wrapWidth);
        }

        function snapX(x) {
          return Math.round(x / slideWidth) * slideWidth;
        }

        function resize() {

          var norm = (transform.x / wrapWidth) || 0;

          slideWidth = slides[0].offsetWidth;
          wrapWidth = slideWidth * numSlides;

          TweenLite.set(proxy, {
            x: norm * wrapWidth
          });

          animateSlides(0);
          slideAnimation.progress(1);
        }

        function wrapPartial(min, max) {
          var r = max - min;
          return function(value) {
            var v = value - min;
            return ((r + v % r) % r) + min;
          }
        }
    }
}
slideset();
