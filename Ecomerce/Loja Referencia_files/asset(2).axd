/*File:~/Custom/Content/Widgets/system.page.analytics/Scripts/wd.system.page.analytics.js*/
try{;(function($, window, document, undefined) {

	$.widget('wd.PageAnalytics', $.wd.widget, {

		_create: function() {
			var widget = this,
				$w = this.getContext();

			var serializedData = $("#SerializedPageAnalytics").val(),
				baseUrl = $w('input[name="widget-base-url"]').val();
			if(baseUrl != undefined){ 
				window.onpageready(function(){
					$.ajax({
						url: baseUrl + 'Analytics/AnalyticsPage/SaveAjaxPageData',
						data: {
							analyticsData: serializedData
						},
						async: true,
						type: 'POST',
						success: function(data) {}
					});
				});
			}
		}
	});

	// Defaults
	$.extend($.wd.PageAnalytics.prototype.options, {});


})(jQuery, window, document);
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
/*File:~/Custom/Content/Widgets/collect.tracking.code.exacttarget/Scripts/wd.collect.tracking.code.exacttarget.js*/
try{
}catch(e){var se=window.SE || [];se.push(e);window.SE=se; };
