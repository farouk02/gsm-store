/******/ (() => {
    // webpackBootstrap
    /******/ "use strict";
    /******/ var __webpack_modules__ = {
        /***/ "./resources/sass/app.scss":
            /*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
            /***/ (
                __unused_webpack_module,
                __webpack_exports__,
                __webpack_require__
            ) => {
                eval(
                    "__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcy5qcyIsIm1hcHBpbmdzIjoiO0FBQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz9hODBiIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6W10sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n"
                );

                /***/
            },

        /******/
    };
    /************************************************************************/
    /******/ // The module cache
    /******/ var __webpack_module_cache__ = {};
    /******/
    /******/ // The require function
    /******/ function __webpack_require__(moduleId) {
        /******/ // Check if module is in cache
        /******/ var cachedModule = __webpack_module_cache__[moduleId];
        /******/ if (cachedModule !== undefined) {
            /******/ return cachedModule.exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/ var module = (__webpack_module_cache__[moduleId] = {
            /******/ // no module.id needed
            /******/ // no module.loaded needed
            /******/ exports: {},
            /******/
        });
        /******/
        /******/ // Execute the module function
        /******/ __webpack_modules__[moduleId](
            module,
            module.exports,
            __webpack_require__
        );
        /******/
        /******/ // Return the exports of the module
        /******/ return module.exports;
        /******/
    }
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/ __webpack_require__.m = __webpack_modules__;
    /******/
    /************************************************************************/
    /******/ /* webpack/runtime/chunk loaded */
    /******/ (() => {
        /******/ var deferred = [];
        /******/ __webpack_require__.O = (result, chunkIds, fn, priority) => {
            /******/ if (chunkIds) {
                /******/ priority = priority || 0;
                /******/ for (
                    var i = deferred.length;
                    i > 0 && deferred[i - 1][2] > priority;
                    i--
                )
                    deferred[i] = deferred[i - 1];
                /******/ deferred[i] = [chunkIds, fn, priority];
                /******/ return;
                /******/
            }
            /******/ var notFulfilled = Infinity;
            /******/ for (var i = 0; i < deferred.length; i++) {
                /******/ var [chunkIds, fn, priority] = deferred[i];
                /******/ var fulfilled = true;
                /******/ for (var j = 0; j < chunkIds.length; j++) {
                    /******/ if (
                        (priority & (1 === 0) || notFulfilled >= priority) &&
                        Object.keys(__webpack_require__.O).every((key) =>
                            __webpack_require__.O[key](chunkIds[j])
                        )
                    ) {
                        /******/ chunkIds.splice(j--, 1);
                        /******/
                    } else {
                        /******/ fulfilled = false;
                        /******/ if (priority < notFulfilled)
                            notFulfilled = priority;
                        /******/
                    }
                    /******/
                }
                /******/ if (fulfilled) {
                    /******/ deferred.splice(i--, 1);
                    /******/ var r = fn();
                    /******/ if (r !== undefined) result = r;
                    /******/
                }
                /******/
            }
            /******/ return result;
            /******/
        };
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/hasOwnProperty shorthand */
    /******/ (() => {
        /******/ __webpack_require__.o = (obj, prop) =>
            Object.prototype.hasOwnProperty.call(obj, prop);
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/make namespace object */
    /******/ (() => {
        /******/ // define __esModule on exports
        /******/ __webpack_require__.r = (exports) => {
            /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
                /******/ Object.defineProperty(exports, Symbol.toStringTag, {
                    value: "Module",
                });
                /******/
            }
            /******/ Object.defineProperty(exports, "__esModule", {
                value: true,
            });
            /******/
        };
        /******/
    })();
    /******/
    /******/ /* webpack/runtime/jsonp chunk loading */
    /******/ (() => {
        /******/ // no baseURI
        /******/
        /******/ // object to store loaded and loading chunks
        /******/ // undefined = chunk not loaded, null = chunk preloaded/prefetched
        /******/ // [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
        /******/ var installedChunks = {
            /******/ "/js/app": 0,
            /******/ "css/app": 0,
            /******/
        };
        /******/
        /******/ // no chunk on demand loading
        /******/
        /******/ // no prefetching
        /******/
        /******/ // no preloaded
        /******/
        /******/ // no HMR
        /******/
        /******/ // no HMR manifest
        /******/
        /******/ __webpack_require__.O.j = (chunkId) =>
            installedChunks[chunkId] === 0;
        /******/
        /******/ // install a JSONP callback for chunk loading
        /******/ var webpackJsonpCallback = (
            parentChunkLoadingFunction,
            data
        ) => {
            /******/ var [chunkIds, moreModules, runtime] = data;
            /******/ // add "moreModules" to the modules object,
            /******/ // then flag all "chunkIds" as loaded and fire callback
            /******/ var moduleId,
                chunkId,
                i = 0;
            /******/ if (chunkIds.some((id) => installedChunks[id] !== 0)) {
                /******/ for (moduleId in moreModules) {
                    /******/ if (__webpack_require__.o(moreModules, moduleId)) {
                        /******/ __webpack_require__.m[moduleId] =
                            moreModules[moduleId];
                        /******/
                    }
                    /******/
                }
                /******/ if (runtime) var result = runtime(__webpack_require__);
                /******/
            }
            /******/ if (parentChunkLoadingFunction)
                parentChunkLoadingFunction(data);
            /******/ for (; i < chunkIds.length; i++) {
                /******/ chunkId = chunkIds[i];
                /******/ if (
                    __webpack_require__.o(installedChunks, chunkId) &&
                    installedChunks[chunkId]
                ) {
                    /******/ installedChunks[chunkId][0]();
                    /******/
                }
                /******/ installedChunks[chunkId] = 0;
                /******/
            }
            /******/ return __webpack_require__.O(result);
            /******/
        };
        /******/
        /******/ var chunkLoadingGlobal = (self["webpackChunk"] =
            self["webpackChunk"] || []);
        /******/ chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
        /******/ chunkLoadingGlobal.push = webpackJsonpCallback.bind(
            null,
            chunkLoadingGlobal.push.bind(chunkLoadingGlobal)
        );
        /******/
    })();
    /******/
    /************************************************************************/
    /******/
    /******/ // startup
    /******/ // Load entry module and return exports
    /******/ // This entry module depends on other loaded chunks and execution need to be delayed
    /******/ var __webpack_exports__ = __webpack_require__.O(
        undefined,
        ["css/app"],
        () => __webpack_require__("./resources/sass/app.scss")
    );
    /******/ __webpack_exports__ = __webpack_require__.O(__webpack_exports__);
    /******/
    /******/
})();

("use strict");

var progressTrackerDemo = (function () {
    var animPathLinks = document.querySelectorAll(".anim--path .progress-step");
    var animPathLinksLength = animPathLinks.length;

    function init() {
        if (animPathLinksLength > 0) {
            for (var i = 0; i < animPathLinksLength; i++) {
                _handleClick(animPathLinks[i], i);
            }
        }
    }

    function _handleClick(link, index) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            _deactivateOtherLinks(index);
            _toggleClass(this, "is-complete");

            if (this.nextElementSibling !== null) {
                _toggleClass(this.nextElementSibling, "is-active");
            }
        });
    }

    function _deactivateOtherLinks(activeIndex) {
        for (var i = 0; i < animPathLinksLength; i++) {
            if (i >= activeIndex) {
                _removeClass(animPathLinks[i], "is-complete");
                _removeClass(animPathLinks[i], "is-active");
            }
        }
    }

    function _toggleClass(el, className) {
        if (el.classList) {
            el.classList.toggle(className);
        } else {
            var classes = el.className.split(" ");
            var existingIndex = classes.indexOf(className);

            if (existingIndex >= 0) classes.splice(existingIndex, 1);
            else classes.push(className);

            el.className = classes.join(" ");
        }
    }

    function _removeClass(el, className) {
        if (el.classList) el.classList.remove(className);
        else
            el.className = el.className.replace(
                new RegExp(
                    "(^|\\b)" + className.split(" ").join("|") + "(\\b|$)",
                    "gi"
                ),
                " "
            );
    }

    return {
        init: init,
    };
})();

progressTrackerDemo.init();

$(function () {
    $("#activity-order").sortable({
        axis: "y",
        update: function (event, ui) {
            var data = $(this)
                .sortable("toArray")
                .map(function (x) {
                    return x.replace("act-", "");
                });
            $.ajax({
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').val(),
                },
                data: {
                    "order[]": data,
                },
                type: "POST",
                dataType: "json",
                url: "/activities/order",
                success: function (data) {
                    refreshPage();
                },
            });
        },
    });

    $(".modal").on("shown.bs.modal", function () {
        $(this).find("[autofocus]").focus();
    });

    $(".edit-btn").on("click", function (e) {
        $(this).parents("tr").find(".show-activity").toggle();
        $(this).parents("tr").find(".edit-activity").toggle();
    });

    $("#search").on("input", function () {
        var search_value = $(this).val();
        if (search_value != "") {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('autocomplete') }}",
                method: "POST",
                data: {
                    search_value: search_value,
                    _token: _token,
                },
                success: function (data) {
                    $("#countryList").fadeIn();
                    $("#countryList").html(data);
                },
            });
        } else {
            $("#countryList").fadeOut();
        }
    });
});

import { createApp } from "vue";

createApp({
    data() {
        return {
            count: 0,
        };
    },
}).mount("#app");
