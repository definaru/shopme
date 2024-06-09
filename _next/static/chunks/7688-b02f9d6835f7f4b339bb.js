(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[7688],{81204:function(t,e,n){"use strict";var r=n(67294);const i=r.forwardRef((function(t,e){return r.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true",ref:e},t),r.createElement("path",{fillRule:"evenodd",d:"M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z",clipRule:"evenodd"}))}));e.Z=i},8273:function(t,e,n){"use strict";n.r(e),n.d(e,{CountUp:function(){return i}});var r=function(){return(r=Object.assign||function(t){for(var e,n=1,r=arguments.length;n<r;n++)for(var i in e=arguments[n])Object.prototype.hasOwnProperty.call(e,i)&&(t[i]=e[i]);return t}).apply(this,arguments)},i=function(){function t(t,e,n){var i=this;this.endVal=e,this.options=n,this.version="2.8.0",this.defaults={startVal:0,decimalPlaces:0,duration:2,useEasing:!0,useGrouping:!0,useIndianSeparators:!1,smartEasingThreshold:999,smartEasingAmount:333,separator:",",decimal:".",prefix:"",suffix:"",enableScrollSpy:!1,scrollSpyDelay:200,scrollSpyOnce:!1},this.finalEndVal=null,this.useEasing=!0,this.countDown=!1,this.error="",this.startVal=0,this.paused=!0,this.once=!1,this.count=function(t){i.startTime||(i.startTime=t);var e=t-i.startTime;i.remaining=i.duration-e,i.useEasing?i.countDown?i.frameVal=i.startVal-i.easingFn(e,0,i.startVal-i.endVal,i.duration):i.frameVal=i.easingFn(e,i.startVal,i.endVal-i.startVal,i.duration):i.frameVal=i.startVal+(i.endVal-i.startVal)*(e/i.duration);var n=i.countDown?i.frameVal<i.endVal:i.frameVal>i.endVal;i.frameVal=n?i.endVal:i.frameVal,i.frameVal=Number(i.frameVal.toFixed(i.options.decimalPlaces)),i.printValue(i.frameVal),e<i.duration?i.rAF=requestAnimationFrame(i.count):null!==i.finalEndVal?i.update(i.finalEndVal):i.options.onCompleteCallback&&i.options.onCompleteCallback()},this.formatNumber=function(t){var e,n,r,o,a=t<0?"-":"";e=Math.abs(t).toFixed(i.options.decimalPlaces);var s=(e+="").split(".");if(n=s[0],r=s.length>1?i.options.decimal+s[1]:"",i.options.useGrouping){o="";for(var u=3,l=0,c=0,f=n.length;c<f;++c)i.options.useIndianSeparators&&4===c&&(u=2,l=1),0!==c&&l%u==0&&(o=i.options.separator+o),l++,o=n[f-c-1]+o;n=o}return i.options.numerals&&i.options.numerals.length&&(n=n.replace(/[0-9]/g,(function(t){return i.options.numerals[+t]})),r=r.replace(/[0-9]/g,(function(t){return i.options.numerals[+t]}))),a+i.options.prefix+n+r+i.options.suffix},this.easeOutExpo=function(t,e,n,r){return n*(1-Math.pow(2,-10*t/r))*1024/1023+e},this.options=r(r({},this.defaults),n),this.formattingFn=this.options.formattingFn?this.options.formattingFn:this.formatNumber,this.easingFn=this.options.easingFn?this.options.easingFn:this.easeOutExpo,this.startVal=this.validateValue(this.options.startVal),this.frameVal=this.startVal,this.endVal=this.validateValue(e),this.options.decimalPlaces=Math.max(this.options.decimalPlaces),this.resetDuration(),this.options.separator=String(this.options.separator),this.useEasing=this.options.useEasing,""===this.options.separator&&(this.options.useGrouping=!1),this.el="string"==typeof t?document.getElementById(t):t,this.el?this.printValue(this.startVal):this.error="[CountUp] target is null or undefined","undefined"!=typeof window&&this.options.enableScrollSpy&&(this.error?console.error(this.error,t):(window.onScrollFns=window.onScrollFns||[],window.onScrollFns.push((function(){return i.handleScroll(i)})),window.onscroll=function(){window.onScrollFns.forEach((function(t){return t()}))},this.handleScroll(this)))}return t.prototype.handleScroll=function(t){if(t&&window&&!t.once){var e=window.innerHeight+window.scrollY,n=t.el.getBoundingClientRect(),r=n.top+window.pageYOffset,i=n.top+n.height+window.pageYOffset;i<e&&i>window.scrollY&&t.paused?(t.paused=!1,setTimeout((function(){return t.start()}),t.options.scrollSpyDelay),t.options.scrollSpyOnce&&(t.once=!0)):(window.scrollY>i||r>e)&&!t.paused&&t.reset()}},t.prototype.determineDirectionAndSmartEasing=function(){var t=this.finalEndVal?this.finalEndVal:this.endVal;this.countDown=this.startVal>t;var e=t-this.startVal;if(Math.abs(e)>this.options.smartEasingThreshold&&this.options.useEasing){this.finalEndVal=t;var n=this.countDown?1:-1;this.endVal=t+n*this.options.smartEasingAmount,this.duration=this.duration/2}else this.endVal=t,this.finalEndVal=null;null!==this.finalEndVal?this.useEasing=!1:this.useEasing=this.options.useEasing},t.prototype.start=function(t){this.error||(this.options.onStartCallback&&this.options.onStartCallback(),t&&(this.options.onCompleteCallback=t),this.duration>0?(this.determineDirectionAndSmartEasing(),this.paused=!1,this.rAF=requestAnimationFrame(this.count)):this.printValue(this.endVal))},t.prototype.pauseResume=function(){this.paused?(this.startTime=null,this.duration=this.remaining,this.startVal=this.frameVal,this.determineDirectionAndSmartEasing(),this.rAF=requestAnimationFrame(this.count)):cancelAnimationFrame(this.rAF),this.paused=!this.paused},t.prototype.reset=function(){cancelAnimationFrame(this.rAF),this.paused=!0,this.resetDuration(),this.startVal=this.validateValue(this.options.startVal),this.frameVal=this.startVal,this.printValue(this.startVal)},t.prototype.update=function(t){cancelAnimationFrame(this.rAF),this.startTime=null,this.endVal=this.validateValue(t),this.endVal!==this.frameVal&&(this.startVal=this.frameVal,null==this.finalEndVal&&this.resetDuration(),this.finalEndVal=null,this.determineDirectionAndSmartEasing(),this.rAF=requestAnimationFrame(this.count))},t.prototype.printValue=function(t){var e;if(this.el){var n=this.formattingFn(t);(null===(e=this.options.plugin)||void 0===e?void 0:e.render)?this.options.plugin.render(this.el,n):"INPUT"===this.el.tagName?this.el.value=n:"text"===this.el.tagName||"tspan"===this.el.tagName?this.el.textContent=n:this.el.innerHTML=n}},t.prototype.ensureNumber=function(t){return"number"==typeof t&&!isNaN(t)},t.prototype.validateValue=function(t){var e=Number(t);return this.ensureNumber(e)?e:(this.error="[CountUp] invalid start or end value: ".concat(t),null)},t.prototype.resetDuration=function(){this.startTime=null,this.duration=1e3*Number(this.options.duration),this.remaining=this.duration},t}()},41647:function(t,e,n){"use strict";var r=n(61682);function i(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function o(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?i(Object(n),!0).forEach((function(e){r(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):i(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}e.default=function(t,e){var n=a.default,r={loading:function(t){t.error,t.isLoading;return t.pastDelay,null}};t instanceof Promise?r.loader=function(){return t}:"function"===typeof t?r.loader=t:"object"===typeof t&&(r=o(o({},r),t));if(r=o(o({},r),e),"object"===typeof t&&!(t instanceof Promise)&&(t.render&&(r.render=function(e,n){return t.render(n,e)}),t.modules)){n=a.default.Map;var i={},s=t.modules();Object.keys(s).forEach((function(t){var e=s[t];"function"!==typeof e.then?i[t]=e:i[t]=function(){return e.then((function(t){return t.default||t}))}})),r.loader=i}r.loadableGenerated&&delete(r=o(o({},r),r.loadableGenerated)).loadableGenerated;if("boolean"===typeof r.ssr){if(!r.ssr)return delete r.ssr,u(n,r);delete r.ssr}return n(r)};s(n(67294));var a=s(n(95547));function s(t){return t&&t.__esModule?t:{default:t}}function u(t,e){return delete e.webpack,delete e.modules,t(e)}},28903:function(t,e,n){"use strict";var r;e.__esModule=!0,e.LoadableContext=void 0;var i=((r=n(67294))&&r.__esModule?r:{default:r}).default.createContext(null);e.LoadableContext=i},95547:function(t,e,n){"use strict";var r=n(61682),i=n(2553),o=n(62012);function a(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function s(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?a(Object(n),!0).forEach((function(e){r(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function u(t,e){var n;if("undefined"===typeof Symbol||null==t[Symbol.iterator]){if(Array.isArray(t)||(n=function(t,e){if(!t)return;if("string"===typeof t)return l(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return l(t,e)}(t))||e&&t&&"number"===typeof t.length){n&&(t=n);var r=0,i=function(){};return{s:i,n:function(){return r>=t.length?{done:!0}:{done:!1,value:t[r++]}},e:function(t){throw t},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var o,a=!0,s=!1;return{s:function(){n=t[Symbol.iterator]()},n:function(){var t=n.next();return a=t.done,t},e:function(t){s=!0,o=t},f:function(){try{a||null==n.return||n.return()}finally{if(s)throw o}}}}function l(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}e.__esModule=!0,e.default=void 0;var c,f=(c=n(67294))&&c.__esModule?c:{default:c},d=n(67161),p=n(28903);var h=[],m=[],y=!1;function b(t){var e=t(),n={loading:!0,loaded:null,error:null};return n.promise=e.then((function(t){return n.loading=!1,n.loaded=t,t})).catch((function(t){throw n.loading=!1,n.error=t,t})),n}function g(t){var e={loading:!1,loaded:{},error:null},n=[];try{Object.keys(t).forEach((function(r){var i=b(t[r]);i.loading?e.loading=!0:(e.loaded[r]=i.loaded,e.error=i.error),n.push(i.promise),i.promise.then((function(t){e.loaded[r]=t})).catch((function(t){e.error=t}))}))}catch(r){e.error=r}return e.promise=Promise.all(n).then((function(t){return e.loading=!1,t})).catch((function(t){throw e.loading=!1,t})),e}function v(t,e){return f.default.createElement(function(t){return t&&t.__esModule?t.default:t}(t),e)}function w(t,e){var n=Object.assign({loader:null,loading:null,delay:200,timeout:null,render:v,webpack:null,modules:null},e),r=null;function i(){if(!r){var e=new O(t,n);r={getCurrentValue:e.getCurrentValue.bind(e),subscribe:e.subscribe.bind(e),retry:e.retry.bind(e),promise:e.promise.bind(e)}}return r.promise()}if(!y&&"function"===typeof n.webpack){var o=n.webpack();m.push((function(t){var e,n=u(o);try{for(n.s();!(e=n.n()).done;){var r=e.value;if(-1!==t.indexOf(r))return i()}}catch(a){n.e(a)}finally{n.f()}}))}var a=function(t,e){i();var o=f.default.useContext(p.LoadableContext),a=(0,d.useSubscription)(r);return f.default.useImperativeHandle(e,(function(){return{retry:r.retry}}),[]),o&&Array.isArray(n.modules)&&n.modules.forEach((function(t){o(t)})),f.default.useMemo((function(){return a.loading||a.error?f.default.createElement(n.loading,{isLoading:a.loading,pastDelay:a.pastDelay,timedOut:a.timedOut,error:a.error,retry:r.retry}):a.loaded?n.render(a.loaded,t):null}),[t,a])};return a.preload=function(){return i()},a.displayName="LoadableComponent",f.default.forwardRef(a)}var O=function(){function t(e,n){i(this,t),this._loadFn=e,this._opts=n,this._callbacks=new Set,this._delay=null,this._timeout=null,this.retry()}return o(t,[{key:"promise",value:function(){return this._res.promise}},{key:"retry",value:function(){var t=this;this._clearTimeouts(),this._res=this._loadFn(this._opts.loader),this._state={pastDelay:!1,timedOut:!1};var e=this._res,n=this._opts;e.loading&&("number"===typeof n.delay&&(0===n.delay?this._state.pastDelay=!0:this._delay=setTimeout((function(){t._update({pastDelay:!0})}),n.delay)),"number"===typeof n.timeout&&(this._timeout=setTimeout((function(){t._update({timedOut:!0})}),n.timeout))),this._res.promise.then((function(){t._update({}),t._clearTimeouts()})).catch((function(e){t._update({}),t._clearTimeouts()})),this._update({})}},{key:"_update",value:function(t){this._state=s(s({},this._state),{},{error:this._res.error,loaded:this._res.loaded,loading:this._res.loading},t),this._callbacks.forEach((function(t){return t()}))}},{key:"_clearTimeouts",value:function(){clearTimeout(this._delay),clearTimeout(this._timeout)}},{key:"getCurrentValue",value:function(){return this._state}},{key:"subscribe",value:function(t){var e=this;return this._callbacks.add(t),function(){e._callbacks.delete(t)}}}]),t}();function E(t){return w(b,t)}function V(t,e){for(var n=[];t.length;){var r=t.pop();n.push(r(e))}return Promise.all(n).then((function(){if(t.length)return V(t,e)}))}E.Map=function(t){if("function"!==typeof t.render)throw new Error("LoadableMap requires a `render(loaded, props)` function");return w(g,t)},E.preloadAll=function(){return new Promise((function(t,e){V(h).then(t,e)}))},E.preloadReady=function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[];return new Promise((function(e){var n=function(){return y=!0,e()};V(m,t).then(n,n)}))},window.__NEXT_PRELOADREADY=E.preloadReady;var j=E;e.default=j},5152:function(t,e,n){t.exports=n(41647)},17857:function(t,e,n){"use strict";var r=n(67294),i=n(8273);function o(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(t);e&&(r=r.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,r)}return n}function a(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?o(Object(n),!0).forEach((function(e){u(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):o(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function s(t){var e=function(t,e){if("object"!=typeof t||!t)return t;var n=t[Symbol.toPrimitive];if(void 0!==n){var r=n.call(t,e||"default");if("object"!=typeof r)return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"==typeof e?e:String(e)}function u(t,e,n){return(e=s(e))in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}function l(){return(l=Object.assign?Object.assign.bind():function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t}).apply(this,arguments)}function c(t,e){if(null==t)return{};var n,r,i=function(t,e){if(null==t)return{};var n,r,i={},o=Object.keys(t);for(r=0;r<o.length;r++)n=o[r],e.indexOf(n)>=0||(i[n]=t[n]);return i}(t,e);if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(t);for(r=0;r<o.length;r++)n=o[r],e.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(t,n)&&(i[n]=t[n])}return i}function f(t,e){return function(t){if(Array.isArray(t))return t}(t)||function(t,e){var n=null==t?null:"undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"];if(null!=n){var r,i,o,a,s=[],u=!0,l=!1;try{if(o=(n=n.call(t)).next,0===e){if(Object(n)!==n)return;u=!1}else for(;!(u=(r=o.call(n)).done)&&(s.push(r.value),s.length!==e);u=!0);}catch(t){l=!0,i=t}finally{try{if(!u&&null!=n.return&&(a=n.return(),Object(a)!==a))return}finally{if(l)throw i}}return s}}(t,e)||function(t,e){if(!t)return;if("string"===typeof t)return d(t,e);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return d(t,e)}(t,e)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function d(t,e){(null==e||e>t.length)&&(e=t.length);for(var n=0,r=new Array(e);n<e;n++)r[n]=t[n];return r}var p="undefined"!==typeof window&&"undefined"!==typeof window.document&&"undefined"!==typeof window.document.createElement?r.useLayoutEffect:r.useEffect;function h(t){var e=r.useRef(t);return p((function(){e.current=t})),r.useCallback((function(){for(var t=arguments.length,n=new Array(t),r=0;r<t;r++)n[r]=arguments[r];return e.current.apply(void 0,n)}),[])}var m=["ref","startOnMount","enableReinitialize","delay","onEnd","onStart","onPauseResume","onReset","onUpdate"],y={decimal:".",separator:",",delay:null,prefix:"",suffix:"",duration:2,start:0,decimals:0,startOnMount:!0,enableReinitialize:!0,useEasing:!0,useGrouping:!0,useIndianSeparators:!1},b=function(t){var e=Object.fromEntries(Object.entries(t).filter((function(t){return void 0!==f(t,2)[1]}))),n=r.useMemo((function(){return a(a({},y),e)}),[t]),o=n.ref,s=n.startOnMount,u=n.enableReinitialize,l=n.delay,d=n.onEnd,p=n.onStart,b=n.onPauseResume,g=n.onReset,v=n.onUpdate,w=c(n,m),O=r.useRef(),E=r.useRef(),V=r.useRef(!1),j=h((function(){return function(t,e){var n=e.decimal,r=e.decimals,o=e.duration,a=e.easingFn,s=e.end,u=e.formattingFn,l=e.numerals,c=e.prefix,f=e.separator,d=e.start,p=e.suffix,h=e.useEasing,m=e.useGrouping,y=e.useIndianSeparators,b=e.enableScrollSpy,g=e.scrollSpyDelay,v=e.scrollSpyOnce,w=e.plugin;return new i.CountUp(t,s,{startVal:d,duration:o,decimal:n,decimalPlaces:r,easingFn:a,formattingFn:u,numerals:l,separator:f,prefix:c,suffix:p,plugin:w,useEasing:h,useIndianSeparators:y,useGrouping:m,enableScrollSpy:b,scrollSpyDelay:g,scrollSpyOnce:v})}("string"===typeof o?o:o.current,w)})),S=h((function(t){var e=O.current;if(e&&!t)return e;var n=j();return O.current=n,n})),_=h((function(){var t=function(){return S(!0).start((function(){null===d||void 0===d||d({pauseResume:P,reset:A,start:D,update:F})}))};l&&l>0?E.current=setTimeout(t,1e3*l):t(),null===p||void 0===p||p({pauseResume:P,reset:A,update:F})})),P=h((function(){S().pauseResume(),null===b||void 0===b||b({reset:A,start:D,update:F})})),A=h((function(){S().el&&(E.current&&clearTimeout(E.current),S().reset(),null===g||void 0===g||g({pauseResume:P,start:D,update:F}))})),F=h((function(t){S().update(t),null===v||void 0===v||v({pauseResume:P,reset:A,start:D})})),D=h((function(){A(),_()})),R=h((function(t){s&&(t&&A(),_())}));return r.useEffect((function(){V.current?u&&R(!0):(V.current=!0,R())}),[u,V,R,l,t.start,t.suffix,t.prefix,t.duration,t.separator,t.decimals,t.decimal,t.formattingFn]),r.useEffect((function(){return function(){A()}}),[A]),{start:D,pauseResume:P,reset:A,update:F,getCountUp:S}},g=["className","redraw","containerProps","children","style"];e.ZP=function(t){var e=t.className,n=t.redraw,i=t.containerProps,o=t.children,s=t.style,u=c(t,g),f=r.useRef(null),d=r.useRef(!1),p=b(a(a({},u),{},{ref:f,startOnMount:"function"!==typeof o||0===t.delay,enableReinitialize:!1})),m=p.start,y=p.reset,v=p.update,w=p.pauseResume,O=p.getCountUp,E=h((function(){m()})),V=h((function(e){t.preserveValue||y(),v(e)})),j=h((function(){"function"!==typeof t.children||f.current instanceof Element?O():console.error('Couldn\'t find attached element to hook the CountUp instance into! Try to attach "containerRef" from the render prop to a an Element, eg. <span ref={containerRef} />.')}));r.useEffect((function(){j()}),[j]),r.useEffect((function(){d.current&&V(t.end)}),[t.end,V]);var S=n&&t;return r.useEffect((function(){n&&d.current&&E()}),[E,n,S]),r.useEffect((function(){!n&&d.current&&E()}),[E,n,t.start,t.suffix,t.prefix,t.duration,t.separator,t.decimals,t.decimal,t.className,t.formattingFn]),r.useEffect((function(){d.current=!0}),[]),"function"===typeof o?o({countUpRef:f,start:m,reset:y,update:v,pauseResume:w,getCountUp:O}):r.createElement("span",l({className:e,ref:f,style:s},i),"undefined"!==typeof t.start?O().formattingFn(t.start):"")}}}]);