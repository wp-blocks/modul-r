/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/scripts/user/index.js":
/*!******************************************!*\
  !*** ./assets/src/scripts/user/index.js ***!
  \******************************************/
/***/ (function() {



/***/ }),

/***/ "./assets/src/scripts/user/menu.js":
/*!*****************************************!*\
  !*** ./assets/src/scripts/user/menu.js ***!
  \*****************************************/
/***/ (function() {



/***/ }),

/***/ "./assets/src/scripts/user/scrollControl.js":
/*!**************************************************!*\
  !*** ./assets/src/scripts/user/scrollControl.js ***!
  \**************************************************/
/***/ (function() {

var vScrollTop = 0;
var lastScroll = 0;
var headerHeight = document.getElementById('masthead').clientHeight;
var scrollOffset = headerHeight; // the screen height where the header resize was triggered

function throttle(fn, wait) {
  var time = Date.now();
  return function () {
    if (time + wait - Date.now() < 0) {
      fn();
      time = Date.now();
    }
  };
}
function scrollCallback() {
  vScrollTop = window.scrollY;
  headerHeight = document.getElementById('masthead').clientHeight;
  if (lastScroll > vScrollTop) {
    document.body.classList.remove('scrolled');
  } else if (vScrollTop > scrollOffset) {
    document.body.classList.add('scrolled');
  } else {
    document.body.classList.remove('scrolled');
  }
  if (vScrollTop < 5) {
    document.body.classList.add('top');
  } else {
    document.body.classList.remove('top');
  }
  lastScroll = vScrollTop;
}
document.addEventListener('DOMContentLoaded', function () {
  scrollCallback();
  window.addEventListener('scroll', throttle(scrollCallback, 50), true);
  window.addEventListener('resize', scrollCallback, true);
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
/*!***************************************!*\
  !*** ./assets/src/scripts/scripts.js ***!
  \***************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _user_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./user/index */ "./assets/src/scripts/user/index.js");
/* harmony import */ var _user_index__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_user_index__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _user_menu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./user/menu */ "./assets/src/scripts/user/menu.js");
/* harmony import */ var _user_menu__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_user_menu__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _user_scrollControl__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./user/scrollControl */ "./assets/src/scripts/user/scrollControl.js");
/* harmony import */ var _user_scrollControl__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_user_scrollControl__WEBPACK_IMPORTED_MODULE_2__);



}();
/******/ })()
;
//# sourceMappingURL=scripts.js.map