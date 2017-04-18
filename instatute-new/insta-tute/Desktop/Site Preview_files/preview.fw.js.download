;
(function($, global) {

  var IframesLoaded = 0,
    previewfw = {

      onLoadAction: function(opts) {
        var options, iFrame, iFrameLength;
        options = opts || {};
        iFrame = options.iFrame || null;
        iFrameLength = options.length || 0;

        if(iFrame) {
          $(iFrame.contentWindow).off("load.general").on("load.general", function() {
            showIframe(iFrame);
          });
          setTimeout(function() {
            showIframe(iFrame);
          }, 12000);

          var showIframe = (function() {
            var shown = false;
            return function showIframeInner(iFrame) {

              if(shown)
                return;

              iFrame.style.opacity = 1;
              $(iFrame).parent(".PreviewPaneInnerWrapper").css("background-image", "none");
              IframesLoaded++;
              if(IframesLoaded === iFrameLength) {
                // Show body after all iFrames are loaded
                document.body.style.opacity = 1;
              }
              shown = true;
            };
          }());
        }
      },

      calcDevicesPositionAndScale: function(deviceMode, width, height) {
        var deviceIFrame,
          $body = $("body"),
          previewPaneWrapper = $("#PreviewPaneWrapper"),
          allDevicesIFrames = previewPaneWrapper.find('iframe.NEEPreviewInside');

        if(!deviceMode) {
          deviceMode = $.dmfw.isMultiView() ? "all" : "desktop";
        }

        if(deviceMode == "all") {
          // calculate screen size and position
          var marginWidth = !(this.inPreviewMode || $.smartSiteManager.inSmartSiteRulePreviewMode) ? parseInt($(".dudaoneInnerShellWrapper").css(
            "width"), 10) : 0;
          width = width || parseInt($body.css("width")) - marginWidth;
          height = height || parseInt($body.css("height")) - 100;

          if($body.is(".firstTimeMode")) {
            height = parseInt($body.css("height")) - parseInt($("#editorSettingsTopBar").css("height"), 10) - parseInt($("#bottomThemesWrapper").css(
              "height"), 10);

          }
          var widthFactor = width < 1200 ? width / 1200 : width / 940;
          var desktopScale = Math.min(0.50 * widthFactor, 0.50 * (height / 650));
          var tabletScale = Math.min(0.30 * widthFactor, 0.30 * (height / 650));
          var mobileScale = Math.min(0.40 * widthFactor, 0.40 * (height / 650));

          var desktopWidth = desktopScale * 1200;
          var desktopHeight = desktopScale * 800;
          var tabletWidth = tabletScale * 960;
          var tabletHeight = tabletScale * 1280;
          var mobileWidth = mobileScale * 332;
          var mobileHeight = mobileScale * 568;

          var allDevicesWidth = desktopWidth + tabletWidth + mobileWidth + 70;

          var desktopLeft = (width - allDevicesWidth) / 2;

          desktopTop = (height - desktopHeight + 100) / 2;
          if($body.is(".firstTimeMode")) {
            desktopTop = 280;
          }

          var tabletLeft = desktopLeft + desktopWidth + 30;
          var tabletTop = desktopTop + desktopHeight - tabletHeight + 30;

          var mobileLeft = tabletLeft + tabletWidth + 50;
          var mobileTop = desktopTop + desktopHeight - mobileHeight - 5;

          $(".PreviewPaneInnerWrapper.desktop").css({
            "-webkit-transform": "scale(" + desktopScale + ", " + desktopScale + ")",
            "-webkit-backface-visibility": "hidden",
            transform: "scale(" + desktopScale + ", " + desktopScale + ")",
            left: desktopLeft,
            top: desktopTop
          }).show();
          $(".PreviewPaneInnerWrapper.tablet").css({
            "-webkit-transform": "scale(" + tabletScale + ", " + tabletScale + ")",
            "-webkit-backface-visibility": "hidden",
            transform: "scale(" + tabletScale + ", " + tabletScale + ")",
            left: tabletLeft,
            top: tabletTop
          }).show();
          $(".PreviewPaneInnerWrapper.mobile").css({
            "-webkit-transform": "scale(" + mobileScale + ", " + mobileScale + ")",
            "-webkit-backface-visibility": "hidden",
            "transform": "scale(" + mobileScale + ", " + mobileScale + ")",
            "left": mobileLeft,
            "top": mobileTop
          }).show();

          // improve text legibility for very light fonts
          setTimeout(function() {
            $('.PreviewPaneInnerWrapper.mobile iframe').contents().find('head').append('<style>body * {-webkit-text-stroke: 0.8px;}</style>');
            $('.PreviewPaneInnerWrapper.tablet iframe').contents().find('head').append('<style>body * {-webkit-text-stroke: 1px;}</style>');
          }, 2000);
        } else {
          $(".PreviewPaneInnerWrapper").css({
            "-webkit-transform": "",
            "transform": ""
          });
          $(".PreviewPaneInnerWrapper.desktop").css({
            top: 0,
            left: 0
          });
          $(".PreviewPaneInnerWrapper.tablet, .PreviewPaneInnerWrapper.mobile").hide();
          allDevicesIFrames.removeClass('active');
          deviceIFrame = previewPaneWrapper.find('.PreviewPaneInnerWrapper[data-device="' + deviceMode + '"] iframe.NEEPreviewInside');
          deviceIFrame.addClass('active');
        }
        for(var i = 0; i < allDevicesIFrames.length; i++) {
          allDevicesIFrames[i].contentWindow && allDevicesIFrames[i].contentWindow.$ &&
            allDevicesIFrames[i].contentWindow.$.layoutManager &&
            allDevicesIFrames[i].contentWindow.$.layoutManager.updateContainerMinimumHeight();
        }
      }
    };

  $.extend({
    previewfw: previewfw
  });

})(jQuery, this);